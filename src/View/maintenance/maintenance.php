<style>
    .select2-container--bootstrap-5 .select2-selection--single.form-control {
        height: calc(2.25rem + 2px);
        /* tinggi standar form-control */
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
    }

    .select2-container--bootstrap-5 .select2-selection__rendered {
        line-height: 1.5;
        /* pastikan teks center */
    }
</style>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Maintenance</h3>
                <p class="text-subtitle text-muted">This is page Maintenance</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Maintenance</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <button class="btn btn-primary block" data-bs-toggle="modal" data-bs-target="#border-less" id="">Add Maintenance <i
                        class="bi bi-person-add"></i></button>
                <div class="modal fade text-left modal-borderless modal-lg" id="border-less" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                        <form action="" id="formaddmtc" class="form form-horizontal" method="POST"
                            enctype="multipart/form-data">
                            <?= csrf()?>
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Add Maintenance</h5>
                                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                                        <i data-feather="x"></i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Kendaraan</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <select name="vehicle_id" id="vehicle_id" class="form-control">
                                                <?php foreach($vehicle as $vhc): ?>
                                                    <option value="<?= $vhc->vehicle_id?>"><?= $vhc->plat_number.' '.$vhc->truck_type?></option>
                                                <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Date</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="date" name="tanggal" id="tanggal" class="form form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Description</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <textarea name="description" id="description" class="form form-control"></textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Jenis Maintenance</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <select name="sparepart" id="sparepart" class="form-control">
                                                    <option value="" hidden selected disabled> -- Pilih --</option>
                                                    <option value="Service Bulanan">Service Bulanan</option>
                                                    <option value="Ganti Oli">Ganti Oli</option>
                                                    <option value="Body Repair">Body Repair</option>
                                                    <option value="Lainnya">Lainnya</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Harga</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" name="harga" id="rpharga" inputmode="numeric" pattern="[0-9],.*" oninput="validateNumberInput(this)" class="form form-control">
                                                <input type="hidden" name="harga" id="harga" class="form form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Jasa</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                            <input type="text" name="jasa" id="rpjasa" inputmode="numeric" pattern="[0-9],.*" oninput="validateNumberInput(this)" class="form form-control">
                                            <input type="hidden" name="jasa" id="jasa" class="form form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Upload Bon</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="file" class="form-control" name="bon" id="bon">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Upload Bukti TF</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="file" name="bukti" id="bukti" class="form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Upload Bukti Potong</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="file" name="buktipotong" id="buktipotong" class="form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>PPH</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <select name="pph" id="pph" class="form-control">
                                                    <option value="0.02">2%</option>
                                                    <option value="0">0%</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label>PPN</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <select name="ppn" id="ppn" class="form-control">
                                                    <option value="0.11">11%</option>
                                                    <option value="0">0%</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Total</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" name="totals" id="total" class="form-control" readonly>
                                                <input type="hidden" name="total" id="hiddentotal" class="form-control" readonly>
                                            </div>
                                            <div class="col-sm-12 d-flex justify-content-end">
                                                <button type="reset"
                                                    class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light-primary" data-bs-dismiss="modal">
                                        <i class="bx bx-x d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Close</span>
                                    </button>
                                    <button type="submit" class="btn btn-primary ml-1" id="addmtc" data-bs-dismiss="modal">
                                        <i class="bx bx-check d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Submit</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <button class="btn btn-warning" data-bs-toggle="modal" id="modalupdatemtc">Update Maintenance <i class="bi bi-person-fill-gear"></i></button>
                <div class="modal fade text-left modal-borderless modal-lg" id="modalEdit" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                        <form action="" id="formupdatemtc" class="form form-horizontal" method="POST"
                            enctype="multipart/form-data">
                            <?= csrf()?>
                            <?= method('PUT')?>
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Update Maintenance</h5>
                                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                                        <i data-feather="x"></i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Kendaraan</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" name="vehicle_id" id="uvehicle_id" class="form form-control" readonly>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Date</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="date" name="tanggal" id="utanggal" class="form form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Description</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <textarea name="description" id="udescription" class="form form-control"></textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Jenis Maintenance</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <select name="sparepart" id="usparepart" class="form-control">
                                                    <option value="" hidden selected disabled> -- Pilih --</option>
                                                    <option value="Service Bulanan">Service Bulanan</option>
                                                    <option value="Ganti Oli">Ganti Oli</option>
                                                    <option value="Body Repair">Body Repair</option>
                                                    <option value="Lainnya">Lainnya</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Harga</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="number" name="harga" id="uharga" class="form form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Jasa</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                            <input type="number" name="jasa" id="ujasa" class="form form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Upload Bon</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="file" class="form-control" name="bon" id="ubon">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Upload Bukti TF</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="file" name="bukti" id="ubukti" class="form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Upload Bukti Potong</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="file" name="buktipotong" id="ubuktipotong" class="form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>PPN</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="number" name="ppn" id="uppn" class="form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>PPH</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="number" name="pph" id="upph" class="form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Total</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="number" name="total" id="utotal" class="form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Status</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <select name="status" id="ustatus" class="form-control">
                                                    <option value="Unpaid">Unpaid</option>
                                                    <option value="Paid">Paid</option>
                                                    <option value="Partial">Partial</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-12 d-flex justify-content-end">
                                                <button type="reset"
                                                    class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light-primary" data-bs-dismiss="modal">
                                        <i class="bx bx-x d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Close</span>
                                    </button>
                                    <button type="submit" class="btn btn-primary ml-1" id="updatemtc" data-bs-dismiss="modal">
                                        <i class="bx bx-check d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Submit</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <button class="btn btn-danger" id="deletemtc">Delete Maintenance <i class="bi bi-person-x"></i></button>
                <button class="btn btn-success" data-bs-toggle="modal" id="payment">Payment <i class="bi bi-person-x"></i></button>
                <div class="modal fade text-left modal-borderless modal-lg" id="modalPayment" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                        <form action="" id="formpayment" class="form form-horizontal" method="POST"
                            enctype="multipart/form-data">
                            <?= csrf()?>
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Payment Maintenance</h5>
                                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                                        <i data-feather="x"></i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Kendaraan</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" name="vehicle_id" id="pvehicle_id" class="form form-control" readonly>
                                                <input type="hidden" name="maintenance" id="pmaintenance" class="form form-control" readonly>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Date</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="date" name="tanggal" id="ptanggal" class="form form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Total</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="number" name="total" id="ptotal" class="form form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Description</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <textarea name="description" id="description" class="form-control"></textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Status</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <select name="status" id="ustatus" class="form-control">
                                                    <option value="Unpaid">Unpaid</option>
                                                    <option value="Paid">Paid</option>
                                                    <option value="Partial">Partial</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-12 d-flex justify-content-end">
                                                <button type="reset"
                                                    class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light-primary" data-bs-dismiss="modal">
                                        <i class="bx bx-x d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Close</span>
                                    </button>
                                    <button type="submit" class="btn btn-primary ml-1" id="addpayment" data-bs-dismiss="modal">
                                        <i class="bx bx-check d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Submit</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-header">
                <form action="" method="GET">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Start Date</label>
                                <input type="date" name="startdate" id="startdate" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <label for="">End Date</label>
                                <input type="date" name="enddate" id="enddate" class="form-control">
                            </div>
                            <div class="col-md-3 mt-2">
                                <button type="submit" id="search" class="btn btn-primary mt-3">Search</button>
                            </div>
                        </div>
                    </form>
            </div>
            <div class="card-body">
                <div class="container">
                    <table class="table table-striped" id="dataTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Plat Number</th>
                                <th>Truck Type</th>
                                <th>Description</th>
                                <th>Sparepart</th>
                                <th>Harga</th>
                                <th>Jasa</th>
                                <th>Bon</th>
                                <th>Bukti</th>
                                <th>Bukti Potong</th>
                                <th>PPN</th>
                                <th>PPH</th>
                                <th>Total</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
    $('#border-less').on('shown.bs.modal', function() {
                $('.js-example-basic-single').select2({
                    theme: "bootstrap-5",
                    dropdownParent: $('#border-less')
                }).next('.select2-container').find('.select2-selection--single').addClass(
                    'form-control');
            });
</script>
<script>
    var table;
    // function tampil datatable user
    function initDataTable(){
        if($.fn.dataTable.isDataTable('#dataTable')){
            $('#dataTable').DataTable().clear().destroy();
        }
        table = $('#dataTable').DataTable({
            ajax: {
                url : '<?= base_url()?>/getmaintenance',
                type: 'GET',
                data: function(data){
                    data.startdate = $('#startdate').val(),
                    data.enddate = $('#enddate').val();
                }
            },
            processing:true,
            serverSide:true,
            select:true,
            responsive:true,
            columns:[
                {
                    data: 'uuid',
                    name: 'uuid',
                    render:function(data, type, row, meta){
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {
                    data: 'tanggal',
                    name: 'tanggal',
                },
                {
                    data: 'plat_number',
                    name: 'plat_number',
                },
                {
                    data: 'truck_type',
                    name: 'truck_type',
                },
                {
                    data: 'description',
                    name: 'description'
                },
                {
                    data: 'sparepart',
                    name: 'sparepart'
                },
                {
                    data: 'harga',
                    name: 'harga'
                },
                {
                    data: 'jasa',
                    name: 'jasa'
                },
                {
                    data: 'bon',
                    name: 'bon',
                    render: function(data,type,row){
                        var urlAsset = "<?= asset('document/data/transactions')?>";
                        return '<img src="'+urlAsset+'/'+data+'" width="50%" alt="bon">';
                    }
                },
                {
                    data: 'bukti',
                    name: 'bukti',
                    render: function(data,type,row){
                        var urlAsset = "<?= asset('document/data/transactions');?>";
                        return '<img src="'+urlAsset+'/'+data+'" width="50%" alt="bon">';
                    }
                },
                {
                    data: 'buktipotong',
                    name: 'buktipotong',
                    render: function(data,type,row){
                        var urlAsset = "<?= asset('document/data/transactions');?>";
                        return '<img src="'+urlAsset+'/'+data+'" width="50%" alt="bon">';
                    }
                },
                {
                    data: 'ppn',
                    name: 'ppn',
                    render:function(data,type,row){
                        var ppn = data ?? 0;
                        return '<span class="badge bg-light-danger">'+'Rp. '+ppn.toLocaleString('id-ID')+'</span>';
                    }
                },
                {
                    data: 'pph',
                    name: 'pph',
                    render:function(data,type,row){
                        var pph = data ?? 0;
                        return '<span class="badge bg-light-danger">'+'Rp. '+pph.toLocaleString('id-ID')+'</span>';
                    }
                },
                {
                    data: 'total',
                    name: 'total',
                    render:function(data,type,row){
                        return '<span class="badge bg-light-success">'+'Rp. '+data.toLocaleString('id-ID')+'</span>';
                    }
                },
                {
                    data: 'status',
                    name: 'status'
                },
            ],
            lengthMenu: [10,25,50,100],
            dom: 'Blftrip',
            buttons: [{
                        extend: 'copy',
                        text: 'COPY',
                        exportOptions: {
                            columns: function(idx, data, node) {
                                return true;
                            },
                            columnDefs: [{
                                targets: -1,
                                visible: false
                            }]
                        }
                    },
                    {
                        extend: 'pdf',
                        text: 'PDF',
                        exportOptions: {
                            columns: function(idx, data, node) {
                                return true;
                            },
                            columnDefs: [{
                                targets: -1,
                                visible: false
                            }]
                        }
                    },
                    {
                        extend: 'print',
                        text: 'CETAK',
                        exportOptions: {
                            columns: function(idx, data, node) {
                                return true;
                            },
                            columnDefs: [{
                                targets: -1,
                                visible: false
                            }]
                        }
                    },
                    {
                        extend: 'csv',
                        text: 'CSV',
                        exportOptions: {
                            columns: function(idx, data, node) {
                                return true;
                            },
                            columnDefs: [{
                                targets: -1,
                                visible: false
                            }]
                        }
                    },
                    {
                        extend: 'excel',
                        text: 'EXCEL',
                        exportOptions: {
                            // columns: ':visible',
                            columns: function(idx, data, node) {
                                return true;
                            },
                            format: {
                                body: function(data, row, column, node) {
                                    return String(data)
                                        .replace(/<[^>]*>/g, '') // Hapus elemen HTML
                                        .replace(/\./g, '') // Hapus tanda titik
                                        .replace(/,/g,
                                            '.'); // Ganti koma menjadi titik (jika perlu)
                                }
                            }
                        },
                        columnDefs: [{
                            targets: -1,
                            visible: false
                        }]
                    },
                    {
                        extend: 'colvis',
                        text: 'COLUMN VISIBLE',
                        exportOptions: {
                            columns: ':visible',
                            columnDefs: [{
                                targets: -1,
                                visible: false
                            }]
                        }
                    }
                ]
        })
    }
    // function crud user
    function crudMaintenance(){
        $('#search').on('click', function(e){
            e.preventDefault();
            table.ajax.reload();
        })
        $('#addmtc').on('click', function(e){
            e.preventDefault();
            var url = '<?= base_url()?>/maintenance';
            var formdata = new FormData($('#formaddmtc')[0]);
            $.ajax({
                type: 'POST',
                url: url,
                processData: false,
                contentType: false,
                data: formdata,
                dataType: 'json',
                success:function(response){
                    if(response.status === 201){
                        $('#formaddmtc')[0].reset();
                        table.ajax.reload(null, false);
                        Swal.fire({
                            title: 'Success',
                            icon: 'success',
                            text:response.message,
                        });
                    } else {
                        var errorMessage = '';
                        if(response.status === 500 && typeof response.message === 'object'){
                            for(var field in response.message){
                                if(response.message.hasOwnProperty(field)){
                                    response.message[field].forEach(function(message){
                                        errorMessage += message + '\n';
                                    });
                                }
                            }
                        } else {
                            errorMessage = 'An unexpected error occurred.';
                        }
                        Swal.fire({
                            title: 'error',
                            icon: 'error',
                            text: errorMessage.trim(),
                        });
                    }
                }
            })
        })
        $('#payment').on('click', function(e){
            e.preventDefault();
            var selectedData = table.rows({
                selected: true
            }).data();
            var vehicle_id = $('#pvehicle_id');
            var tanggal = $('#ptanggal');
            var total = $('#ptotal');
            var status = $('#pstatus');
            var maintenance = $('#pmaintenance');
            if(selectedData.length > 0){
                vehicle_id.val(selectedData[0].plat_number+' '+selectedData[0].truck_type);
                maintenance.val(selectedData[0].maintenance_id);
                tanggal.val(selectedData[0].tanggal);
                total.val(selectedData[0].total);
                status.val(selectedData[0].status);
                $('#modalPayment').modal('show');
            } else {
                $('#modalPayment').modal('hide');
                Swal.fire({
                    title: 'Info',
                    icon: 'info',
                    text: 'No Data Selected',
                });
            }
        })
        $('#addpayment').on('click', function(e){
            e.preventDefault();
            var selectedData = table.rows({
                selected: true
            }).data();
            if (selectedData.length == 0) {
                Swal.fire({
                    title: 'Error',
                    icon: 'error',
                    text: 'Tidak ada data yang dipilih!',
                    showConfirmButton: false,
                    timer: 1500,
                    timerProgressBar: true,
                });
                return;
            }
            var row = selectedData[0];
            var updatePayment = "<?= base_url() . '/transaction' ?>";
            var formID = '#formpayment';
            $('#modalwarning').modal('hide');
            if (selectedData.length > 0) {
                Swal.fire({
                    title: 'Update',
                    icon: 'warning',
                    text: 'Yakin data ingin diubah?',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Ubah!!',
                }).then((result) => {
                    if (result.isConfirmed) {
                        var formUpPayment = new FormData($(formID)[0]);
                        $.ajax({
                            type: 'POST',
                            url: updatePayment,
                            data: formUpPayment,
                            contentType: false,
                            processData: false,
                            dataType: 'json',
                            success: function(response) {
                                if (response.status === 201) {
                                    Swal.fire({
                                        title: 'success',
                                        icon: 'success',
                                        text: response.message,
                                        showConfirmButton: false,
                                        timer: 1500,
                                        timerProgressBar: true,
                                    })
                                    table.ajax.reload(null, false);
                                    $('#formpayment')[0].reset();
                                } else {
                                    Swal.fire({
                                        title: 'error',
                                        icon: 'error',
                                        text: response.message,
                                        showConfirmButton: false,
                                        timer: 1500,
                                        timerProgressBar: true,
                                    })
                                }
                            }
                        })
                    }
                })
            }
        })
        $('#modalupdatemtc').on('click', function(e){
            e.preventDefault();
            var selectedData = table.rows({
                selected: true
            }).data();
            var vehicle_id = $('#uvehicle_id');
            var tanggal = $('#utanggal');
            var description = $('#udescription');
            var sparepart = $('#usparepart');
            var harga = $('#uharga');
            var jasa = $('#ujasa');
            var ppn = $('#uppn');
            var pph = $('#upph');
            var total = $('#utotal');
            var status = $('#ustatus');
            if(selectedData.length > 0){
                vehicle_id.val(selectedData[0].plat_number+' '+selectedData[0].truck_type);
                tanggal.val(selectedData[0].tanggal);
                description.val(selectedData[0].description);
                sparepart.val(selectedData[0].sparepart);
                harga.val(selectedData[0].harga);
                jasa.val(selectedData[0].jasa);
                ppn.val(selectedData[0].ppn);
                pph.val(selectedData[0].pph);
                total.val(selectedData[0].total);
                status.val(selectedData[0].status);
                $('#modalEdit').modal('show');
            } else {
                $('#modalEdit').modal('hide');
                Swal.fire({
                    title: 'Info',
                    icon: 'info',
                    text: 'No Data Selected',
                });
            }
        })
        $('#updatemtc').on('click', function(e){
            e.preventDefault();
            var selectedData = table.rows({
                selected: true
            }).data();
            if (selectedData.length == 0) {
                Swal.fire({
                    title: 'Error',
                    icon: 'error',
                    text: 'Tidak ada data yang dipilih!',
                    showConfirmButton: false,
                    timer: 1500,
                    timerProgressBar: true,
                });
                return;
            }
            var row = selectedData[0];
            var uID = row.uuid;
            var updateMtc = "<?= base_url() . '/maintenance/' ?>" + uID;
            var formID = '#formupdatemtc';
            $('#modalwarning').modal('hide');
            if (selectedData.length > 0) {
                Swal.fire({
                    title: 'Update',
                    icon: 'warning',
                    text: 'Yakin data ingin diubah?',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Ubah!!',
                }).then((result) => {
                    if (result.isConfirmed) {
                        var formUpMtc = new FormData($(formID)[0]);
                        $.ajax({
                            type: 'POST',
                            url: updateMtc,
                            data: formUpMtc,
                            contentType: false,
                            processData: false,
                            dataType: 'json',
                            success: function(response) {
                                if (response.status === 201) {
                                    Swal.fire({
                                        title: 'success',
                                        icon: 'success',
                                        text: response.message,
                                        showConfirmButton: false,
                                        timer: 1500,
                                        timerProgressBar: true,
                                    })
                                    table.ajax.reload(null, false);
                                    $('#formupdatemtc')[0].reset();
                                } else {
                                    Swal.fire({
                                        title: 'error',
                                        icon: 'error',
                                        text: 'Data gagal diupdate',
                                        showConfirmButton: false,
                                        timer: 1500,
                                        timerProgressBar: true,
                                    })
                                }
                            }
                        })
                    }
                })
            }
        })
        $('#deletemtc').on('click', function(e){
            e.preventDefault();
            var selectedData = table.rows({
                selected: true
            }).data();
            if(selectedData.length === 0){
                Swal.fire({
                    title: 'info',
                    icon: 'info',
                    text: 'No data selected',
                    showConfirmButton: false,
                    timer: 1500,
                    timerProgressBar: true,
                })
                return
            }
            if (selectedData.length > 0) {
                Swal.fire({
                    title: 'Delete',
                    icon: 'warning',
                    text: 'Yakin ingin dihapus?',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Hapus!!',
                }).then((result) => {
                    if (result.isConfirmed) {
                        selectedData.each(function(data) {
                            const uuid = data.uuid;
                            $.ajax({
                                type: 'DELETE',
                                url: "<?= base_url() . '/maintenance/' ?>" + uuid,
                                success: function(response) {
                                    if (response.status === 200) {
                                        Swal.fire({
                                            title: 'Success',
                                            icon: 'success',
                                            text: response.message,
                                            timer: 1500,
                                            timerProgressBar: true,
                                        });
                                        table.ajax.reload(null, false);
                                    } else {
                                        Swal.fire({
                                            title: 'Error',
                                            icon: 'error',
                                            text: 'Data Error',
                                            timer: 1500,
                                            timerProgressBar: true,
                                        });
                                    }
                                }
                            })
                        })
                    }
                })

            }
        })
    }
    function getTotal(){
        $('#rpharga').on('input', function(){
            let value = $(this).val().replace(/\D/g, '');
                if (value) {
                    $(this).val(parseInt(value, 10).toLocaleString('id-ID'))
                } else {
                    $(this).val('');
                }
            $('#harga').val(value)
        })
        $('#rpjasa').on('input', function(){
            let value = $(this).val().replace(/\D/g, '');
                if (value) {
                    $(this).val(parseInt(value, 10).toLocaleString('id-ID'))
                } else {
                    $(this).val('');
                }
            $('#jasa').val(value)
        })
        $('#rpharga,#rpjasa,#pph,#ppn').on('input',function(e){
            e.preventDefault();
            var harga = parseNumber($('#harga').val());
            var jasa = parseNumber($('#jasa').val());
            var ppn = parseNumber($('#ppn').val());
            var gppn = (harga + jasa) * ppn;
            var pph = parseNumber($('#pph').val());
            var gpph = (harga + jasa) * pph;
            var total = (harga + jasa + gppn) - gpph;
            $('#total').val(total.toLocaleString('id-ID'));
            $('#hiddentotal').val(total);
        })
    }
    function parseNumber(val){
        return parseFloat(val.replace(',','.')) || 0;
    }
    function flatPicker(){
        flatpickr('#tanggal',{
            dateFormat: 'Y-m-d',
            locale: 'id',
            allowInput: false,
            defaultDate: new Date(),
        })
        flatpickr('#startdate',{
            dateFormat: 'Y-m-d',
            locale: 'id',
            allowInput: false,
            defaultDate: new Date(),
        })
        flatpickr('#enddate',{
            dateFormat: 'Y-m-d',
            locale: 'id',
            allowInput: false,
            defaultDate: new Date(),
        })
    }
    function validateNumberInput(input){
        input.value = input.value.replace(/[^0-9],./g,'');
    }
    $(document).ready(function(){
        initDataTable();
        crudMaintenance();
        getTotal();
        flatPicker();
        validateNumberInput();
        parseNumber();
    })
</script>