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
                                            <button class="btn btn-primary block" data-bs-toggle="modal" data-bs-target="#border-less">Add Vehicle <i
                                                    class="bi bi-plus-square"></i></button>
                                            <button class="btn btn-warning" data-bs-toggle="modal" id="modalupdatevehcile">Update Vehicle <i
                                                    class="bi bi-pencil-square"></i></button>
                                            <button class="btn btn-danger">Delete Vehicle <i
                                                    class="bi bi-trash"></i></button>
                                            <?php include includeFile('modal/modal-vehicle.php')?>
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
                                            <button class="btn btn-primary block" data-bs-toggle="modal" data-bs-target="#border-lessDriver">Add Driver <i
                                                    class="bi bi-plus-square"></i></button>
                                            <button class="btn btn-warning">Update Driver <i
                                                    class="bi bi-pencil-square"></i></button>
                                            <button class="btn btn-danger">Delete Driver <i
                                                    class="bi bi-trash"></i></button>
                                            <?php include includeFile('modal/modal-driver.php')?>
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
                                            <button class="btn btn-warning">Update Price <i
                                                    class="bi bi-pencil-square"></i></button>
                                            <button class="btn btn-danger">Delete Price <i
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
            ajax: '<?= base_url()?>/getvehicle',
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
                    data: 'stnk',
                    name: 'stnk'
                },
                {
                    data: 'kir',
                    name: 'kir'
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
        });

        tableDriver = $('#dataTableDriver').DataTable({
            ajax: '<?= base_url()?>/getdriver',
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
                    name: 'ktp'
                },
                {
                    data: 'sim',
                    name: 'sim'
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
                    name: 'min'
                },
                {
                    data: 'max',
                    name: 'max'
                },
                {
                    data: 'price',
                    name: 'price'
                },
                {
                    data: 'status',
                    name: 'status'
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

    // function crud vehicle
    function crudVehicle(){
        $('#addvehicle').on('click', function(e){
            e.preventDefault();
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
                        $('#formaddvehicle')[0].reset();
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
        $('#modalupdatevehicle').on('click', function(e){
            e.preventDefault();
            var selectedData = table.rows({
                selected: true
            }).data();
            var no_rek = $('#uno_rek');
            var nama_rek = $('#unama_rek');
            var bank_code = $('#ubank_code');
            var swift_code = $('#uswift_code');
            if(selectedData.length > 0){
                no_rek.val(selectedData[0].no_rek);
                nama_rek.val(selectedData[0].nama_rek);
                bank_code.val(selectedData[0].bank_code);
                swift_code.val(selectedData[0].swift_code);
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
        $('#updatevehicle').on('click', function(e){
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
            var updateVehicle = "<?= base_url() . '/uvehicle/' ?>" + uID;
            var formID = '#formupdatevehicle';
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
                                    table.ajax.reload(null, false);
                                    $('#formupdatepayment')[0].reset();
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
            var selectedData = table.rows({
                selected: true
            }).data();
            if(selectedData === 0){
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
    // function crud driver
    function crudDriver(){
        $('#addpayment').on('click', function(e){
            e.preventDefault();
            var url = '<?= base_url()?>/payment';
            var formdata = new FormData($('#formaddpayment')[0]);
            $.ajax({
                type: 'POST',
                url: url,
                processData: false,
                contentType: false,
                data: formdata,
                dataType: 'json',
                success:function(response){
                    if(response.status === 201){
                        $('#formaddpayment')[0].reset();
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
        $('#modalupdatepayment').on('click', function(e){
            e.preventDefault();
            var selectedData = table.rows({
                selected: true
            }).data();
            var no_rek = $('#uno_rek');
            var nama_rek = $('#unama_rek');
            var bank_code = $('#ubank_code');
            var swift_code = $('#uswift_code');
            if(selectedData.length > 0){
                no_rek.val(selectedData[0].no_rek);
                nama_rek.val(selectedData[0].nama_rek);
                bank_code.val(selectedData[0].bank_code);
                swift_code.val(selectedData[0].swift_code);
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
        $('#updatepayment').on('click', function(e){
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
            var uID = row.payment_id;
            var updatePayment = "<?= base_url() . '/upayment/' ?>" + uID;
            var formID = '#formupdatepayment';
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
                                    $('#formupdatepayment')[0].reset();
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
        $('#deletepayment').on('click', function(e){
            e.preventDefault();
            var selectedData = table.rows({
                selected: true
            }).data();
            if(selectedData === 0){
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
                            const uuid = data.payment_id;
                            $.ajax({
                                type: 'DELETE',
                                url: "<?= base_url() . '/payment/' ?>" + uuid,
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
    // function crud price
    function crudPrice(){
        $('#addpayment').on('click', function(e){
            e.preventDefault();
            var url = '<?= base_url()?>/payment';
            var formdata = new FormData($('#formaddpayment')[0]);
            $.ajax({
                type: 'POST',
                url: url,
                processData: false,
                contentType: false,
                data: formdata,
                dataType: 'json',
                success:function(response){
                    if(response.status === 201){
                        $('#formaddpayment')[0].reset();
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
        $('#modalupdatepayment').on('click', function(e){
            e.preventDefault();
            var selectedData = table.rows({
                selected: true
            }).data();
            var no_rek = $('#uno_rek');
            var nama_rek = $('#unama_rek');
            var bank_code = $('#ubank_code');
            var swift_code = $('#uswift_code');
            if(selectedData.length > 0){
                no_rek.val(selectedData[0].no_rek);
                nama_rek.val(selectedData[0].nama_rek);
                bank_code.val(selectedData[0].bank_code);
                swift_code.val(selectedData[0].swift_code);
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
        $('#updatepayment').on('click', function(e){
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
            var uID = row.payment_id;
            var updatePayment = "<?= base_url() . '/upayment/' ?>" + uID;
            var formID = '#formupdatepayment';
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
                                    $('#formupdatepayment')[0].reset();
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
        $('#deletepayment').on('click', function(e){
            e.preventDefault();
            var selectedData = table.rows({
                selected: true
            }).data();
            if(selectedData === 0){
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
                            const uuid = data.payment_id;
                            $.ajax({
                                type: 'DELETE',
                                url: "<?= base_url() . '/payment/' ?>" + uuid,
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
    $(document).ready(function(){
        initDataTable();
        crudVehicle();
        crudDriver();
        crudPrice();
    })
</script>