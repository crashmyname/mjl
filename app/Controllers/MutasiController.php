<?php

namespace App\Controllers;

use App\Models\RekeningKoran;
use Support\BaseController;
use Support\Request;
use Support\Validator;
use Support\View;
use Support\CSRFToken;
use Support\DataTables;
use Support\Response;

class MutasiController extends BaseController
{
    // Controller logic here
    public function getRekening(Request $request)
    {
        if(Request::isAjax()){
            $rekkoran = RekeningKoran::query()
                                ->select('rek_koran_id',
                                        'rekening_koran.uuid',
                                        'reference_data',
                                        'reference_id',
                                        'payments.nama_bank',
                                        'payments.no_rek',
                                        'payments.nama_rek',
                                        'tanggal',
                                        'jenis_transaksi',
                                        'jumlah',
                                        'no_document',
                                        'deskripsi')
                                ->leftJoin('payments','payments.payment_id','=','rekening_koran.payment_id')
                                ->where('rekening_koran.deleted_at','=',null)
                                ->get();
            return DataTables::of($rekkoran)->make(true);
            // Baru code sampe sini belum crud nya
        }
    }

    public function index()
    {
        return view('claims/claim',[],'layout/app');
    }

    public function create(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'vehicle_id' => 'required',
            'driver_id' => 'required',
            'vendor_id' => 'required',
            'jenis_claim' => 'required',
            'biaya' => 'required',
            'remark' => 'required',
        ]);
        $errors = $validate;
        $validateType = $request->getClientMimeType('surat_jalan');
        $allowedTypes = ['image/png', 'image/jpg', 'image/jpeg'];
        if($request->file('surat_jalan') && !in_array($validateType,$allowedTypes)){
            $errors = array_merge($errors, ['surat_jalan' => ['File must be a valid image']]);
        }
        if(!empty($errors)){
            return Response::json(['status'=>500,'message'=>$errors]);
        }
        if($request->getClientOriginalName('surat_jalan')){
            $path = storage_path('document/data/claim');
            if(!file_exists($path)){
                mkdir($path,0777,true);
            }

            $fileName = time() . '-' . preg_replace('/[^A-Za-z0-9.\-]/', '-', $request->getClientOriginalName('surat_jalan'));
            $tempPath = $request->getPath('surat_jalan');
            $destination = $path.'/'.$fileName;

            if(move_uploaded_file($tempPath,$destination)){
                Claim::create([
                    'uuid' => UUID::generateUuid(),
                    'vehicle_id' => $request->vehicle_id,
                    'driver_id' => $request->driver_id,
                    'vendor_id' => $request->vendor_id,
                    'jenis_claim' => $request->jenis_claim,
                    'biaya' => $request->biaya,
                    'remark' => $request->remark,
                    'sj' => $fileName,
                    'status' => $request->status,
                    'created_at' => Date::Now(),
                    'updated_at' => Date::Now(),
                ]);
            }
        }
        return Response::json(['status'=>201,'message'=>'Claim berhasil dibuat']);
    }

    public function update(Request $request, $id)
    {
        $claim = Claim::query()->where('uuid','=',$id)->first();
        $claim->jenis_claim = $request->jenis_claim;
        $claim->biaya = $request->biaya;
        $claim->remark = $request->remark;
        $claim->status = $request->status;
        if($request->getClientOriginalName('surat_jalan')){
            $path = storage_path('document/data/claim');
            if(!file_exists($path)){
                mkdir($path,0777,true);
            }
            $oldFile = $path.'/'.$claim->sj;
            if(file_exists($oldFile)){
                unlink($oldFile);
            }
            $claim->sj = $request->getClientOriginalName('surat_jalan');
            $tempPath = $request->getPath('surat_jalan');
            $destination = $path.'/'.$claim->sj;
            move_uploaded_file($tempPath,$destination);
        }
        $claim->updated_at = Date::Now();
        $claim->save();
        return Response::json(['status'=>201,'message'=>'Claim berhasil diupdate']);
    }

    public function delete($id)
    {
        $claim = Claim::query()->where('uuid','=',$id)->first();
        $claim->deleted_at = Date::Now();
        $claim->save();
        return Response::json(['status'=>200,'message'=>'Claim berhasil dihapus']);
    }
}
