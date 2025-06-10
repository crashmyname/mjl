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
                <h3>Claim</h3>
                <p class="text-subtitle text-muted">This is page Claim</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Claim</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <button class="btn btn-primary block" data-bs-toggle="modal" data-bs-target="#border-less" id="">Add Claim <i
                        class="bi bi-person-add"></i></button>
                <div class="modal fade text-left modal-borderless modal-lg" id="border-less" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                        <form action="" id="formaddclaim" class="form form-horizontal" method="POST"
                            enctype="multipart/form-data">
                            <?= csrf()?>
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Add Claim</h5>
                                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                                        <i data-feather="x"></i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Tanggal Claim</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                            <input type="date" name="tanggal_claim" id="tanggal_claim" class="form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Plat Number</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                            <select name="vehicle_id" id="vehicle_id" class="form-control">
                                                <?php foreach($vehicle as $vhc): ?>
                                                    <option value="<?= $vhc->vehicle_id?>"><?= $vhc->plat_number.' '.$vhc->truck_type?></option>
                                                <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Driver Name</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <select name="driver_id" id="driver_id" class="form-control">
                                                <?php foreach($driver as $dr): ?>
                                                    <option value="<?= $dr->driver_id?>"><?= $dr->driver_name?></option>
                                                <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Supplier</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <select name="vendor_id" id="vendor_id" class="form-control">
                                                <?php foreach($supplier as $sp): ?>
                                                    <option value="<?= $sp->vendor_id?>"><?= $sp->company_name?></option>
                                                <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Jenis Claim</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <select name="jenis_claim" id="jenis_claim" class="form-control">
                                                    <option value="" hidden selected disabled>Pilih</option>
                                                    <option value="Barang Hilang/Kurang">Barang Hilang/Kurang</option>
                                                    <option value="Packing Rusak">Packing Rusak</option>
                                                    <option value="Lainnya">Lainnya</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Biaya</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" name="biaya" id="rpbiaya" inputmode="numeric" pattern="[0-9],.*" oninput="validateNumberInput(this)" class="form form-control">
                                                <input type="hidden" name="biaya" id="biaya" class="form form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Remark</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <textarea name="remark" id="remark" class="form form-control"></textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Surat Jalan</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="file" name="surat_jalan" id="surat_jalan" class="form-control">
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
                                    <button type="submit" class="btn btn-primary ml-1" id="addclaim" data-bs-dismiss="modal">
                                        <i class="bx bx-check d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Submit</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <button class="btn btn-warning" data-bs-toggle="modal" id="modalupdateclaim">Update Claim <i class="bi bi-person-fill-gear"></i></button>
                <div class="modal fade text-left modal-borderless modal-lg" id="modalEdit" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                        <form action="" id="formupdateclaim" class="form form-horizontal" method="POST"
                            enctype="multipart/form-data">
                            <?= csrf()?>
                            <?= method('PUT')?>
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Update Claim</h5>
                                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                                        <i data-feather="x"></i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Tanggal Claim</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                            <input type="date" name="tanggal_claim" id="utanggal_claim" class="form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Plat Number</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                            <select name="vehicle_id" id="uvehicle_id" class="form-control">
                                                <?php foreach($vehicle as $vhc): ?>
                                                    <option value="<?= $vhc->vehicle_id?>"><?= $vhc->plat_number.' '.$vhc->truck_type?></option>
                                                <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Driver Name</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <select name="driver_id" id="udriver_id" class="form-control">
                                                <?php foreach($driver as $dr): ?>
                                                    <option value="<?= $dr->driver_id?>"><?= $dr->driver_name?></option>
                                                <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Supplier</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <select name="vendor_id" id="uvendor_id" class="form-control">
                                                <?php foreach($supplier as $sp): ?>
                                                    <option value="<?= $sp->vendor_id?>"><?= $sp->company_name?></option>
                                                <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Jenis Claim</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                            <select name="jenis_claim" id="ujenis_claim" class="form-control">
                                                    <option value="" hidden selected disabled>Pilih</option>
                                                    <option value="Barang Hilang/Kurang">Barang Hilang/Kurang</option>
                                                    <option value="Packing Rusak">Packing Rusak</option>
                                                    <option value="Lainnya">Lainnya</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Biaya</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="number" name="biaya" id="ubiaya" class="form form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Remark</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <textarea name="remark" id="uremark" class="form form-control"></textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Surat Jalan</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="file" name="surat_jalan" id="usurat_jalan" class="form-control">
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
                                    <button type="submit" class="btn btn-primary ml-1" id="updateclaim" data-bs-dismiss="modal">
                                        <i class="bx bx-check d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Submit</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <button class="btn btn-danger" id="deleteclaim">Delete Claim <i class="bi bi-person-x"></i></button>
                <button class="btn btn-success" data-bs-toggle="modal" id="payment">Payment <i class="bi bi-person-x"></i></button>
                <div class="modal fade text-left modal-borderless modal-lg" id="modalPayment" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                        <form action="" id="formpayment" class="form form-horizontal" method="POST"
                            enctype="multipart/form-data">
                            <?= csrf()?>
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Payment Claim</h5>
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
                                                <input type="hidden" name="claim" id="pclaim" class="form form-control" readonly>
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
                                                <input type="number" name="biaya" id="pbiaya" class="form form-control">
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
                                <th>Tanggal Claim</th>
                                <th>Plat Number</th>
                                <th>Driver Name</th>
                                <th>Supplier</th>
                                <th>Jenis Claim</th>
                                <th>Biaya</th>
                                <th>Remark</th>
                                <th>Surat Jalan</th>
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
                url : '<?= base_url()?>/getclaim',
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
                    data: 'tanggal_claim',
                    name: 'tanggal_claim',
                },
                {
                    data: 'plat_number',
                    name: 'plat_number',
                },
                {
                    data: 'driver_name',
                    name: 'driver_name',
                },
                {
                    data: 'company_name',
                    name: 'company_name',
                },
                {
                    data: 'jenis_claim',
                    name: 'jenis_claim'
                },
                {
                    data: 'biaya',
                    name: 'biaya'
                },
                {
                    data: 'remark',
                    name: 'remark'
                },
                {
                    data: 'sj',
                    name: 'sj',
                    render: function(data,type,row){
                        var urlAsset = "<?= asset('document/data/claim');?>";
                        return '<img src="'+urlAsset+'/'+data+'" width="50%" alt="sj">';
                    }
                },
                {
                    data: 'status',
                    name: 'status'
                },
            ],
            lengthMenu: [10,25,50,100],
            dom: 'Blftrip',
            layout: {
                topStart: {
                    buttons: ['copy', 'excel', 'pdf', 'colvis']
                }
            }
        })
    }
    // function crud user
    function crudClaim(){
        $('#search').on('click', function(e){
            e.preventDefault();
            table.ajax.reload();
        })
        $('#addclaim').on('click', function(e){
            e.preventDefault();
            var url = '<?= base_url()?>/claim';
            var formdata = new FormData($('#formaddclaim')[0]);
            $.ajax({
                type: 'POST',
                url: url,
                processData: false,
                contentType: false,
                data: formdata,
                dataType: 'json',
                success:function(response){
                    if(response.status === 201){
                        $('#formaddclaim')[0].reset();
                        table.ajax.reload(null, false);
                        Swal.fire({
                            title: 'Success',
                            icon: 'success',
                            text:response.message,
                        });
                        DateNow();
                        formatDate();
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
        $('#modalupdateclaim').on('click', function(e){
            e.preventDefault();
            var selectedData = table.rows({
                selected: true
            }).data();
            var plat_number = $('#uplat_number');
            var driver_name = $('#udriver_name');
            var company_name = $('#ucompany_name');
            var jenis_claim = $('#ujenis_claim');
            var biaya = $('#ubiaya');
            var remark = $('#uremark');
            var status = $('#ustatus');
            if(selectedData.length > 0){
                plat_number.val(selectedData[0].plat_number);
                driver_name.val(selectedData[0].driver_name);
                company_name.val(selectedData[0].company_name);
                jenis_claim.val(selectedData[0].jenis_claim);
                biaya.val(selectedData[0].biaya);
                remark.val(selectedData[0].remark);
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
        $('#updateclaim').on('click', function(e){
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
            var updateClaim = "<?= base_url() . '/uclaim/' ?>" + uID;
            var formID = '#formupdateclaim';
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
                        var formUpClaim = new FormData($(formID)[0]);
                        $.ajax({
                            type: 'POST',
                            url: updateClaim,
                            data: formUpClaim,
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
                                    $('#formupdateclaim')[0].reset();
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
        $('#payment').on('click', function(e){
            e.preventDefault();
            var selectedData = table.rows({
                selected: true
            }).data();
            var vehicle_id = $('#pvehicle_id');
            var tanggal = $('#ptanggal');
            var biaya = $('#pbiaya');
            var status = $('#pstatus');
            var claim = $('#pclaim');
            if(selectedData.length > 0){
                vehicle_id.val(selectedData[0].plat_number+' '+selectedData[0].truck_type);
                claim.val(selectedData[0].claim_id);
                tanggal.val(selectedData[0].tanggal);
                biaya.val(selectedData[0].biaya);
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
            var updatePayment = "<?= base_url() . '/transactionclaim' ?>";
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
        $('#deleteclaim').on('click', function(e){
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
                                url: "<?= base_url() . '/claim/' ?>" + uuid,
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
    function flatPicker(){
        flatpickr('#tgl_pembuatan_po',{
            dateFormat: 'Y-m-d',
            locale: 'id',
            allowInput: false,
            defaultDate: new Date(),
        })
        flatpickr('#pickup_date',{
            dateFormat: 'Y-m-d',
            locale: 'id',
            allowInput: false,
            defaultDate: new Date(),
        })
        flatpickr('#tanggal_claim',{
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
        input.value = input.value.replace(/[^0-9].,/g,'');
    }
    function getRupiah(){
        $('#rpbiaya').on('input', function(){
            let value = $(this).val().replace(/\D/g, '');
                if (value) {
                    $(this).val(parseInt(value, 10).toLocaleString('id-ID'))
                } else {
                    $(this).val('');
                }
            $('#biaya').val(value)
        })
    }
    $(document).ready(function(){
        initDataTable();
        crudClaim();
        flatPicker();
        getRupiah();
        validateNumberInput();
    })
</script>