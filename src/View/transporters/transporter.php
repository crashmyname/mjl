<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Transporter</h3>
                <p class="text-subtitle text-muted">This Page to manage transporter.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Transporter</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home"
                                    role="tab" aria-controls="home" aria-selected="true">Vehicle</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab"
                                    aria-controls="profile" aria-selected="false">Drivers</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#contact" role="tab"
                                    aria-controls="contact" aria-selected="false">Pricing</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel"
                                aria-labelledby="home-tab">
                                <section class="section">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="row">
                                                <div class="col-md-7">
                                                    <button class="btn btn-primary block" data-bs-toggle="modal" data-bs-target="#border-less">Add Vehicle <i
                                                            class="bi bi-plus-square"></i></button>
                                                     <button class="btn btn-success block" data-bs-toggle="modal" id="modalimportvehicle">Import Vehicle <i
                                                            class="bi bi-plus-square"></i></button>
                                                    <button class="btn btn-warning" data-bs-toggle="modal" id="modalupdatevehicle">Update Vehicle <i
                                                            class="bi bi-pencil-square"></i></button>
                                                    <button class="btn btn-danger" id="deletevehicle">Delete Vehicle <i
                                                            class="bi bi-trash"></i></button>
                                                    <?php include includeFile('modal/modal-vehicle.php')?>
                                                </div>
                                                <div class="col-md-5">
                                                    <form action="" method="GET">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <select name="status_vehicle" id="status_vehicle" class="form-control">
                                                                    <option value="All">All Status</option>
                                                                    <option value="Internal">Internal</option>
                                                                    <option value="External">External</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <button type="submit" id="filter-vehicle" class="btn btn-primary">Filter</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="container">
                                                <table class="table table-striped" id="dataTableVehicle">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Plat Number</th>
                                                            <th>Truck Type</th>
                                                            <th>Truck sub type</th>
                                                            <th>Plat Color</th>
                                                            <th>Status</th>
                                                            <th>STNK</th>
                                                            <th>KIR</th>
                                                            <th>Created at</th>
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
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <section class="section">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="row">
                                                <div class="col-md-7">
                                                    <button class="btn btn-primary block" data-bs-toggle="modal" data-bs-target="#border-lessDriver">Add Driver <i
                                                            class="bi bi-plus-square"></i></button>
                                                    <button class="btn btn-success block" data-bs-toggle="modal" id="modalimportdriver">Import Driver <i
                                                            class="bi bi-plus-square"></i></button>
                                                    <button class="btn btn-warning" data-bs-toggle="modal" id="modalupdatedriver">Update Driver <i
                                                            class="bi bi-pencil-square"></i></button>
                                                    <button class="btn btn-danger" id="deletedriver">Delete Driver <i
                                                            class="bi bi-trash"></i></button>
                                                    <?php include includeFile('modal/modal-driver.php')?>
                                                </div>
                                                <div class="col-md-5">
                                                    <form action="" method="GET">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <select name="status_driver" id="status_driver" class="form-control">
                                                                    <option value="All">All Status</option>
                                                                    <option value="Internal">Internal</option>
                                                                    <option value="External">External</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <button type="submit" id="filter-driver" class="btn btn-primary">Filter</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="container">
                                                <table class="table table-striped" id="dataTableDriver">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Driver Name</th>
                                                            <th>Driver KSUID</th>
                                                            <th>Phone</th>
                                                            <th>Sim Type</th>
                                                            <th>KTP</th>
                                                            <th>SIM</th>
                                                            <th>Created at</th>
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
                            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                <section class="section">
                                    <div class="card">
                                        <div class="card-header">
                                            <button class="btn btn-primary block" data-bs-toggle="modal" data-bs-target="#border-lessPrice">Add Price <i
                                                    class="bi bi-plus-square"></i></button>
                                            <button class="btn btn-success block" data-bs-toggle="modal" id="modalimportprice">Import Price <i
                                                    class="bi bi-plus-square"></i></button>
                                            <button class="btn btn-warning" data-bs-toggle="modal" id="modalupdateprice">Update Price <i
                                                    class="bi bi-pencil-square"></i></button>
                                            <button class="btn btn-danger" id="deleteprice">Delete Price <i
                                                    class="bi bi-trash"></i></button>
                                            <?php include includeFile('modal/modal-price.php')?>
                                        </div>
                                        <div class="card-body">
                                            <div class="container">
                                                <table class="table table-striped" id="dataTablePrice">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Plat Number</th>
                                                            <th>Truck Type</th>
                                                            <th>Origin City</th>
                                                            <th>Destination</th>
                                                            <th>Min</th>
                                                            <th>Max</th>
                                                            <th>Price</th>
                                                            <th>Status</th>
                                                            <th>Project</th>
                                                            <th>Created at</th>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
    var tableVehicle;
    var tableDriver;
    var tablePrice;
    // function tampil datatable user
    function initDataTable(){
        if($.fn.dataTable.isDataTable('#dataTableVehicle')){
            $('#dataTableVehicle').DataTable().clear().destroy();
        }
        if($.fn.dataTable.isDataTable('#dataTableDriver')){
            $('#dataTableDriver').DataTable().clear().destroy();
        }
        if($.fn.dataTable.isDataTable('#dataTablePrice')){
            $('#dataTablePrice').DataTable().clear().destroy();
        }
        tableVehicle = $('#dataTableVehicle').DataTable({
            ajax: {
                url : '<?= base_url()?>/getvehicle',
                type: 'GET',
                data: function(data){
                    data.status = $('#status_vehicle').val()
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
                    data: 'plat_number',
                    name: 'plat_number',
                },
                {
                    data: 'truck_type',
                    name: 'truck_type',
                },
                {
                    data: 'truck_sub_type',
                    name: 'truck_sub_type',
                },
                {
                    data: 'plat_color',
                    name: 'plat_color'
                },
                {
                    data: 'status_vehicle',
                    name: 'status_vehicle',
                    render: function(data, type, row){
                        if(data == 'External'){
                            return '<span class="badge bg-light-danger">'+data+'</span>';
                        } else {
                            return '<span class="badge bg-light-success">'+data+'</span>'
                        }
                    }
                },
                {
                    data: 'stnk',
                    name: 'stnk',
                    render:function(data,type,row){
                        return '<img src="<?=asset('document/data/')?>'+data+'" width="25%">';
                    }
                },
                {
                    data: 'kir',
                    name: 'kir',
                    render:function(data,type,row){
                        return '<img src="<?=asset('document/data/')?>'+data+'" width="25%">';
                    }
                },
                {
                    data: 'created_at',
                    name: 'created_at'
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
        });

        tableDriver = $('#dataTableDriver').DataTable({
            ajax: {
                url : '<?= base_url()?>/getdriver',
                type: 'GET',
                data: function(data){
                    data.status = $('#status_driver').val()
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
                    data: 'driver_name',
                    name: 'driver_name',
                },
                {
                    data: 'driver_ksuid',
                    name: 'driver_ksuid',
                },
                {
                    data: 'phone_number',
                    name: 'phone_number',
                },
                {
                    data: 'sim_type',
                    name: 'sim_type'
                },
                {
                    data: 'ktp',
                    name: 'ktp',
                    render:function(data,type,row){
                        return '<img src="<?=asset('document/data/')?>'+data+'" width="25%">';
                    }
                },
                {
                    data: 'sim',
                    name: 'sim',
                    render:function(data,type,row){
                        return '<img src="<?=asset('document/data/')?>'+data+'" width="25%">';
                    }
                },
                {
                    data: 'created_at',
                    name: 'created_at'
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

        tablePrice = $('#dataTablePrice').DataTable({
            ajax: '<?= base_url()?>/getprice',
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
                    data: 'plat_number',
                    name: 'plat_number',
                },
                {
                    data: 'truck_type',
                    name: 'truck_type',
                },
                {
                    data: 'origin_city',
                    name: 'origin_city',
                },
                {
                    data: 'destination_city',
                    name: 'destination_city'
                },
                {
                    data: 'min',
                    name: 'min',
                    render:function(data,type,row){
                        return '<span class="badge bg-light-danger">'+data+' KG</span>';
                    }
                },
                {
                    data: 'max',
                    name: 'max',
                    render: function(data,type,row){
                        return '<span class="badge bg-light-danger">'+data+' KG</span>';
                    }
                },
                {
                    data: 'price',
                    name: 'price',
                    render:function(data,type,row){
                        return '<span class="badge bg-light-success">Rp. '+data.toLocaleString('id-ID')+'</span>'
                    }
                },
                {
                    data: 'status',
                    name: 'status'
                },
                {
                    data: 'project',
                    name: 'project'
                },
                {
                    data: 'created_at',
                    name: 'created_at'
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

    // function crud vehicle
    function crudVehicle(){
        $('#filter-vehicle').on('click', function(e){
            e.preventDefault();
            tableVehicle.ajax.reload();
        })
        $('#addvehicle').on('click', function(e){
            e.preventDefault();
            $('#loading').show();
            $('#addvehicle').hide();
            var url = '<?= base_url()?>/vehicle';
            var formdata = new FormData($('#formaddvehicle')[0]);
            $.ajax({
                type: 'POST',
                url: url,
                processData: false,
                contentType: false,
                data: formdata,
                dataType: 'json',
                success:function(response){
                    if(response.status === 201){
                        $('#loading').hide();
                        $('#addvehicle').show();
                        $('#formaddvehicle')[0].reset();
                        Swal.fire({
                            title: 'Success',
                            icon: 'success',
                            text:response.message,
                        });
                        tableVehicle.ajax.reload();
                    } else {
                        $('#loading').hide();
                        $('#addvehicle').show();
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
        $('#modalupdatevehicle').on('click', function(e){
            e.preventDefault();
            var selectedData = tableVehicle.rows({
                selected: true
            }).data();
            var plat_number = $('#uplat_number');
            var truck_type = $('#utruck_type');
            var truck_sub_type = $('#utruck_sub_type');
            var plat_color = $('#uplat_color');
            var statusvehicle = $('#ustatusvehicle');
            var stnk = $('#imgstnk');
            var kir = $('#imgkir');
            var urlimage = '<?= asset('document/data/')?>'
            if(selectedData.length > 0){
                plat_number.val(selectedData[0].plat_number);
                truck_type.val(selectedData[0].truck_type);
                truck_sub_type.val(selectedData[0].truck_sub_type);
                plat_color.val(selectedData[0].plat_color);
                statusvehicle.val(selectedData[0].status_vehicle);
                stnk.attr('src',urlimage+selectedData[0].stnk)
                kir.attr('src',urlimage+selectedData[0].kir);
                $('#modalEditVehicle').modal('show');
            } else {
                $('#modalEditVehicle').modal('hide');
                Swal.fire({
                    title: 'Info',
                    icon: 'info',
                    text: 'No Data Selected',
                });
            }
        })
        $('#modalimportvehicle').on('click', function(e){
            e.preventDefault();
            $('#modalImportVehicle').modal('show');
        })
        $('#importvehicle').on('click', function(e){
            e.preventDefault();
            var from = new FormData($('#formimportvehicle')[0]);
            $('#loadingimportvehicle').show();
            $('#importvehicle').hide();
            $.ajax({
                type: 'POST',
                url: '<?= base_url()?>/importvehicle',
                data: from,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN' : '<?= csrfHeader()?>'
                },
                dataType: 'json',
                success: function(response){
                    if(response.status === 201){
                        $('#loadingimportvehicle').hide();
                        $('#importvehicle').show();
                        tableVehicle.ajax.reload();
                        Swal.fire({
                            title: 'Success',
                            icon: 'success',
                            text: response.message,
                        })
                    } else {
                        $('#loadingimportvehicle').hide();
                        $('#importvehicle').show();
                        tableVehicle.ajax.reload();
                        Swal.fire({
                            title: 'Error',
                            icon: 'error',
                            text: response.message,
                        })
                    }
                }
            })
        })
        $('#updatevehicle').on('click', function(e){
            e.preventDefault();
            var selectedData = tableVehicle.rows({
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
            var updateVehicle = "<?= base_url() . '/uvehicle/' ?>" + uID;
            var formID = '#formupdatevehicle';
            if (selectedData.length > 0) {
                Swal.fire({
                    title: 'Update',
                    icon: 'warning',
                    text: 'Yakin data ingin diubah?',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Ubah!!',
                }).then((result) => {
                    if (result.isConfirmed) {
                        var formUpVehicle = new FormData($(formID)[0]);
                        $.ajax({
                            type: 'POST',
                            url: updateVehicle,
                            data: formUpVehicle,
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
                                    tableVehicle.ajax.reload(null, false);
                                    $('#formupdatevehicle')[0].reset();
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
        $('#deletevehicle').on('click', function(e){
            e.preventDefault();
            var selectedData = tableVehicle.rows({
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
                                url: "<?= base_url() . '/vehicle/' ?>" + uuid,
                                success: function(response) {
                                    if (response.status === 200) {
                                        Swal.fire({
                                            title: 'Success',
                                            icon: 'success',
                                            text: response.message,
                                            timer: 1500,
                                            timerProgressBar: true,
                                        });
                                        tableVehicle.ajax.reload(null, false);
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
    // function crud driver
    function crudDriver(){
        $('#filter-driver').on('click', function(e){
            e.preventDefault();
            tableDriver.ajax.reload();
        })
        $('#adddriver').on('click', function(e){
            e.preventDefault();
            var url = '<?= base_url()?>/driver';
            var formdata = new FormData($('#formadddriver')[0]);
            $.ajax({
                type: 'POST',
                url: url,
                processData: false,
                contentType: false,
                data: formdata,
                dataType: 'json',
                success:function(response){
                    if(response.status === 201){
                        $('#formadddriver')[0].reset();
                        Swal.fire({
                            title: 'Success',
                            icon: 'success',
                            text:response.message,
                        });
                        tableDriver.ajax.reload();
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
        $('#modalupdatedriver').on('click', function(e){
            e.preventDefault();
            var selectedData = tableDriver.rows({
                selected: true
            }).data();
            var driver_name = $('#udriver_name');
            var driver_ksuid = $('#udriver_ksuid');
            var phone_number = $('#uphone_number');
            var sim_type = $('#usim_type');
            var status_driver = $('#ustatusdriver');
            var ktp = $('#imgktp');
            var sim = $('#imgsim');
            var urlimage = '<?= asset('document/data/')?>'
            if(selectedData.length > 0){
                driver_name.val(selectedData[0].driver_name);
                driver_ksuid.val(selectedData[0].driver_ksuid);
                phone_number.val(selectedData[0].phone_number);
                sim_type.val(selectedData[0].sim_type);
                status_driver.val(selectedData[0].status_driver);
                ktp.attr('src',urlimage+selectedData[0].ktp)
                sim.attr('src',urlimage+selectedData[0].sim)
                $('#modalEditDriver').modal('show');
            } else {
                $('#modalEditDriver').modal('hide');
                Swal.fire({
                    title: 'Info',
                    icon: 'info',
                    text: 'No Data Selected',
                });
            }
        })
        $('#modalimportdriver').on('click', function(e){
            e.preventDefault();
            $('#modalImportDriver').modal('show');
        })
        $('#importdriver').on('click', function(e){
            e.preventDefault();
            var from = new FormData($('#formimportdriver')[0]);
            $('#loadingimportdriver').show();
            $('#importdriver').hide();
            $.ajax({
                type: 'POST',
                url: '<?= base_url()?>/importdriver',
                data: from,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN' : '<?= csrfHeader()?>'
                },
                dataType: 'json',
                success: function(response){
                    if(response.status === 201){
                        $('#loadingimportdriver').hide();
                        $('#importdriver').show();
                        tableDriver.ajax.reload();
                        Swal.fire({
                            title: 'Success',
                            icon: 'success',
                            text: response.message,
                        })
                    } else {
                        $('#loadingimportdriver').hide();
                        $('#importdriver').show();
                        tableDriver.ajax.reload();
                        Swal.fire({
                            title: 'Error',
                            icon: 'error',
                            text: response.message,
                        })
                    }
                }
            })
        })
        $('#updatedriver').on('click', function(e){
            e.preventDefault();
            var selectedData = tableDriver.rows({
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
            var updateDriver = "<?= base_url() . '/udriver/' ?>" + uID;
            var formID = '#formupdatedriver';
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
                        var formUpDriver = new FormData($(formID)[0]);
                        $.ajax({
                            type: 'POST',
                            url: updateDriver,
                            data: formUpDriver,
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
                                    tableDriver.ajax.reload(null, false);
                                    $('#formupdatedriver')[0].reset();
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
        $('#deletedriver').on('click', function(e){
            e.preventDefault();
            var selectedData = tableDriver.rows({
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
                                url: "<?= base_url() . '/driver/' ?>" + uuid,
                                success: function(response) {
                                    if (response.status === 200) {
                                        Swal.fire({
                                            title: 'Success',
                                            icon: 'success',
                                            text: response.message,
                                            timer: 1500,
                                            timerProgressBar: true,
                                        });
                                        tableDriver.ajax.reload(null, false);
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
    // function crud price
    function crudPrice(){
        $('#addprice').on('click', function(e){
            e.preventDefault();
            var url = '<?= base_url()?>/price';
            var formdata = new FormData($('#formaddprice')[0]);
            $.ajax({
                type: 'POST',
                url: url,
                processData: false,
                contentType: false,
                data: formdata,
                dataType: 'json',
                success:function(response){
                    if(response.status === 201){
                        $('#formaddprice')[0].reset();
                        Swal.fire({
                            title: 'Success',
                            icon: 'success',
                            text:response.message,
                        });
                        tablePrice.ajax.reload();
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
        $('#modalupdateprice').on('click', function(e){
            e.preventDefault();
            var selectedData = tablePrice.rows({
                selected: true
            }).data();
            var vehicle_id = $('#uvehicle_id');
            var origin_city = $('#uorigin_city');
            var destination_city = $('#udestination_city');
            var min = $('#umin');
            var max = $('#umax');
            var status = $('#ustatus');
            var price = $('#uprice');
            var project = $('#uproject');
            if(selectedData.length > 0){
                vehicle_id.val(selectedData[0].vehicle_id);
                origin_city.val(selectedData[0].origin_city);
                destination_city.val(selectedData[0].destination_city);
                min.val(selectedData[0].min);
                max.val(selectedData[0].max);
                status.val(selectedData[0].status);
                price.val(selectedData[0].price);
                project.val(selectedData[0].project);
                $('#modalEditPrice').modal('show');
            } else {
                $('#modalEditPrice').modal('hide');
                Swal.fire({
                    title: 'Info',
                    icon: 'info',
                    text: 'No Data Selected',
                });
            }
        })
        $('#modalimportprice').on('click', function(e){
            e.preventDefault();
            $('#modalImportPrice').modal('show');
        })
        $('#importprice').on('click', function(e){
            e.preventDefault();
            var from = new FormData($('#formimportprice')[0]);
            $('#loadingimportprice').show();
            $('#importprice').hide();
            $.ajax({
                type: 'POST',
                url: '<?= base_url()?>/importprice',
                data: from,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN' : '<?= csrfHeader()?>'
                },
                dataType: 'json',
                success: function(response){
                    if(response.status === 201){
                        $('#loadingimportprice').hide();
                        $('#importprice').show();
                        tablePrice.ajax.reload();
                        Swal.fire({
                            title: 'Success',
                            icon: 'success',
                            text: response.message,
                        })
                    } else {
                        $('#loadingimportprice').hide();
                        $('#importprice').show();
                        tablePrice.ajax.reload();
                        Swal.fire({
                            title: 'Error',
                            icon: 'error',
                            text: response.message,
                        })
                    }
                }
            })
        })
        $('#updateprice').on('click', function(e){
            e.preventDefault();
            var selectedData = tablePrice.rows({
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
            var updatePrice = "<?= base_url() . '/uprice/' ?>" + uID;
            var formID = '#formupdateprice';
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
                        var formUpPrice = new FormData($(formID)[0]);
                        $.ajax({
                            type: 'POST',
                            url: updatePrice,
                            data: formUpPrice,
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
                                    tablePrice.ajax.reload(null, false);
                                    $('#formupdateprice')[0].reset();
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
        $('#deleteprice').on('click', function(e){
            e.preventDefault();
            var selectedData = tablePrice.rows({
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
                                url: "<?= base_url() . '/price/' ?>" + uuid,
                                success: function(response) {
                                    if (response.status === 200) {
                                        Swal.fire({
                                            title: 'Success',
                                            icon: 'success',
                                            text: response.message,
                                            timer: 1500,
                                            timerProgressBar: true,
                                        });
                                        tablePrice.ajax.reload(null, false);
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
    function validateNumberInput(input){
        input.value = input.value.replace(/[^0-9]/g,'');
    }
    $(document).ready(function(){
        initDataTable();
        crudVehicle();
        crudDriver();
        crudPrice();
        validateNumberInput();
    })
</script>