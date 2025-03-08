<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Purchase Orders</h3>
                <p class="text-subtitle text-muted">This is page Purchase Orders</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Purchase Orders</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <button class="btn btn-primary block" data-bs-toggle="modal" data-bs-target="#border-less">Add Purchase Orders <i
                        class="bi bi-person-add"></i></button>
                <div class="modal fade text-left modal-borderless modal-lg" id="border-less" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                        <form action="" id="formaddorders" class="form form-horizontal" method="POST"
                            enctype="multipart/form-data">
                            <?= csrf()?>
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Add Purchase Orders</h5>
                                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                                        <i data-feather="x"></i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>No PO</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" name="no_po" id="no_po" class="form form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Vendors</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <select name="vendor_id" id="vendor_id" class="form-control">
                                                <?php foreach($vendor as $vnd): ?>
                                                    <option value="<?= $vnd->vendor_id?>"><?= $vnd->company_name?></option>
                                                <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Pickup Date</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="date" name="pickup_date" id="pickup_date" class="form form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Tanggal Pembuatan PO</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="date" name="tgl_pembuatan_po" id="tgl_pembuatan_po" class="form form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Origin City</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" name="origin_city" id="origin_city" class="form form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Destination</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" name="destination" id="destination" class="form form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Vehicle</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <select name="vehicle_id" id="vehicle_id" class="form-control">
                                                    <option value="-" disabled selected value> - </option>
                                                <?php foreach($vehicle as $vhc):?>
                                                    <option value="<?= $vhc->vehicle_id?>"><?= $vhc->plat_number?> | <?= $vhc->truck_type?> | <?= $vhc->truck_sub_type?></option>
                                                <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Driver</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <select name="driver_id" id="driver_id" class="form-control">
                                                    <option value="-" disabled selected value> - </option>
                                                <?php foreach($driver as $dv): ?>
                                                    <option value="<?= $dv->driver_id?>"><?= $dv->driver_name?></option>
                                                <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Price</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" name="price" id="price" class="form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Status</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <select name="status" id="status" class="form-control">
                                                    <option value="Active">Active</option>
                                                    <option value="Inactive">Inactive</option>
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
                                    <button type="submit" class="btn btn-primary ml-1" id="addorders" data-bs-dismiss="modal">
                                        <i class="bx bx-check d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Submit</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <button class="btn btn-warning" data-bs-toggle="modal" id="modalupdateorders">Update Purchase Orders <i class="bi bi-person-fill-gear"></i></button>
                <div class="modal fade text-left modal-borderless modal-lg" id="modalEdit" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                        <form action="" id="formupdateorders" class="form form-horizontal" method="POST"
                            enctype="multipart/form-data">
                            <?= csrf()?>
                            <?= method('PUT')?>
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Update Purchase Orders</h5>
                                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                                        <i data-feather="x"></i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-body">
                                        <div class="row">
                                        <div class="col-md-4">
                                                <label>No PO</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" name="no_po" id="uno_po" class="form form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Vendors</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <select name="vendor_id" id="uvendor_id" class="form-control">
                                                    <option value=""></option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Pickup Date</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="date" name="pickup_date" id="upickup_date" class="form form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Tanggal Pembuatan PO</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="date" name="tgl_pembuatan_po" id="utgl_pembuatan_po" class="form form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Origin City</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" name="origin_city" id="uorigin_city" class="form form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Destination</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" name="destination" id="udestination" class="form form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Vehicle</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <select name="vehicle_id" id="uvehicle_id" class="form-control">
                                                    <option value=""></option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Driver</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <select name="driver_id" id="udriver_id" class="form-control">
                                                    <option value=""></option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Price</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" name="price" id="uprice" class="form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Status</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <select name="status" id="ustatus" class="form-control">
                                                    <option value="Active">Active</option>
                                                    <option value="Inactive">Inactive</option>
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
                                    <button type="submit" class="btn btn-primary ml-1" id="updateorders" data-bs-dismiss="modal">
                                        <i class="bx bx-check d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Submit</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <button class="btn btn-danger" id="deleteorders">Delete Purchase Orders <i class="bi bi-person-x"></i></button>
            </div>
            <div class="card-body">
                <div class="container">
                    <table class="table table-striped" id="dataTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Number PO</th>
                                <th>Vendor</th>
                                <th>Pickup Date</th>
                                <th>Tanggal Pembuatan PO</th>
                                <th>Origin City</th>
                                <th>Destination</th>
                                <th>Vehicle</th>
                                <th>Driver</th>
                                <th>Price</th>
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
    var table;
    // function tampil datatable user
    function initDataTable(){
        if($.fn.dataTable.isDataTable('#dataTable')){
            $('#dataTable').DataTable().clear().destroy();
        }
        table = $('#dataTable').DataTable({
            ajax: '<?= base_url()?>/getorders',
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
                    data: 'no_po',
                    name: 'no_po',
                },
                {
                    data: 'company_name',
                    name: 'company_name',
                },
                {
                    data: 'pickup_date',
                    name: 'pickup_date',
                },
                {
                    data: 'tgl_pembuatan_po',
                    name: 'tgl_pembuatan_po'
                },
                {
                    data: 'origin_city',
                    name: 'origin_city'
                },
                {
                    data: 'destination',
                    name: 'destination'
                },
                {
                    data: 'truck_type',
                    name: 'truck_type'
                },
                {
                    data: 'driver_name',
                    name: 'driver_name'
                },
                {
                    data: 'price',
                    name: 'price'
                },
                {
                    data: 'created_at',
                    name: 'created_at'
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
    function crudOrders(){
        $('#addorders').on('click', function(e){
            e.preventDefault();
            var url = '<?= base_url()?>/orders';
            var formdata = new FormData($('#formaddorders')[0]);
            $.ajax({
                type: 'POST',
                url: url,
                processData: false,
                contentType: false,
                data: formdata,
                dataType: 'json',
                success:function(response){
                    if(response.status === 201){
                        $('#formaddorders')[0].reset();
                        Swal.fire({
                            title: 'Success',
                            icon: 'success',
                            text:response.message,
                        });
                        table.ajax.reload();
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
        $('#modalupdateorders').on('click', function(e){
            e.preventDefault();
            var selectedData = table.rows({
                selected: true
            }).data();
            var no_po = $('#uno_po');
            var vendor_id = $('#uvendor_id');
            var pickup_date = $('#upickup_date');
            var tgl_pembuatan_po = $('#utgl_pembuatan_po');
            var origin_city = $('#uorigin_city');
            var destination = $('#udestination');
            var vehicle_id = $('#uvehicle_id');
            var driver_id = $('#udriver_id');
            var price = $('#uprice');
            var status = $('#ustatus');
            if(selectedData.length > 0){
                no_po.val(selectedData[0].no_po);
                vendor_id.empty();
                vendor_id.append('<option value="' + selectedData[0].vendor_id + '">' + selectedData[0].company_name + '</option>');
                pickup_date.val(selectedData[0].pickup_date);
                tgl_pembuatan_po.val(selectedData[0].tgl_pembuatan_po);
                origin_city.val(selectedData[0].origin_city);
                destination.val(selectedData[0].destination);
                vehicle_id.empty();
                vehicle_id.append('<option value="'+selectedData[0].vehicle_id+'">'+selectedData[0].truck_type+'</option>');
                driver_id.empty();
                driver_id.append('<option value="'+selectedData[0].driver_id+'">'+selectedData[0].driver_name+'</option>');
                price.val(selectedData[0].price);
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
        $('#updateorders').on('click', function(e){
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
            var updateOrders = "<?= base_url() . '/uorders/' ?>" + uID;
            var formID = '#formupdateorders';
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
                        var formUpOrders = new FormData($(formID)[0]);
                        $.ajax({
                            type: 'POST',
                            url: updateOrders,
                            data: formUpOrders,
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
                                    $('#formupdateorders')[0].reset();
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
        $('#deleteorders').on('click', function(e){
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
                                url: "<?= base_url() . '/orders/' ?>" + uuid,
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
    function getPrice(){
        $('#vehicle_id').on('change', function(){
            var url = '<?= base_url()?>/getprice';
            var price = $('#vehicle_id').val();
            $.ajax({
                type : 'POST',
                url:url,
                data: {
                    price: price
                },
                dataType: 'json',
                headers:{
                    'X-CSRF-TOKEN': '<?= csrfHeader() ?>'
                },
                success:function(response){
                    console.log(response.data);
                    if(response.status === 200){
                        $('#price').val(response.data.price);
                    } else {
                        $('#price').val('');
                    }
                }
            })
        })
    }
    $(document).ready(function(){
        initDataTable();
        crudOrders();
        getPrice();
    })
</script>