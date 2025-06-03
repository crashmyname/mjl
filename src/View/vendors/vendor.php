<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Vendor</h3>
                <p class="text-subtitle text-muted">This is page Vendor</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Vendor</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <button class="btn btn-primary block" data-bs-toggle="modal" data-bs-target="#border-less">Add Vendor <i
                        class="bi bi-person-add"></i></button>
                <div class="modal fade text-left modal-borderless modal-lg" id="border-less" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                        <form action="" id="formaddvendor" class="form form-horizontal" method="POST"
                            enctype="multipart/form-data">
                            <?= csrf()?>
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Add Vendor</h5>
                                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                                        <i data-feather="x"></i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Name</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" name="nama_vendor" id="nama_vendor" class="form form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Nama Singkatan</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" name="alias" id="alias" class="form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="email" name="email" id="email" class="form form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Phone</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" name="phone" id="phone" inputmode="numeric" pattern="[0-9]*" oninput="validateNumberInput(this)" class="form form-control">
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
                                    <button type="submit" class="btn btn-primary ml-1" id="addvendor" data-bs-dismiss="modal">
                                        <i class="bx bx-check d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Submit</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <button class="btn btn-success" data-bs-toggle="modal" id="modalimportvendor">Import Vendor <i class="bi bi-plus-square"></i></button>
                <div class="modal fade text-left modal-borderless modal-lg" id="modalImportVendor" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                        <form action="" id="formimportvendor" class="form form-horizontal" method="POST"
                            enctype="multipart/form-data">
                            <?= csrf()?>
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Import Vendor</h5>
                                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                                        <i data-feather="x"></i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-body">
                                        <div class="row">
                                        <div class="col-md-4">
                                                <label>Excel</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="file" name="filevendor" id="filevendor" class="form form-control" accept=".xlsx,.xls">
                                            </div>
                                            <div class="col-sm-12 d-flex justify-content-end">
                                            <button type="submit" id="importvendor" class="btn btn-success me-1 mb-1">Simpan</button>
                                            <button class="btn btn-success me-1 mb-1" id="loadingimportvendor" type="button" disabled="" style="display: none;">
                                                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                                    Processing...
                                                </button>
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
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <button class="btn btn-warning" data-bs-toggle="modal" id="modalupdatevendor">Update Vendor <i class="bi bi-person-fill-gear"></i></button>
                <div class="modal fade text-left modal-borderless modal-lg" id="modalEdit" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                        <form action="" id="formupdatevendor" class="form form-horizontal" method="POST"
                            enctype="multipart/form-data">
                            <?= csrf()?>
                            <?= method('PUT')?>
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Update Vendor</h5>
                                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                                        <i data-feather="x"></i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-body">
                                        <div class="row">
                                        <div class="col-md-4">
                                                <label>Nama Vendor</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" name="nama_vendor" id="unama_vendor" class="form form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Nama Singkatan</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" name="alias" id="ualias" class="form form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="email" name="email" id="uemail" class="form form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Phone</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" name="phone" id="uphone" inputmode="numeric" pattern="[0-9]*" oninput="validateNumberInput(this)" class="form form-control">
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
                                    <button type="submit" class="btn btn-primary ml-1" id="updatevendor" data-bs-dismiss="modal">
                                        <i class="bx bx-check d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Submit</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <button class="btn btn-danger" id="deletevendor">Delete Vendor <i class="bi bi-person-x"></i></button>
            </div>
            <div class="card-body">
                <div class="container">
                    <table class="table table-striped" id="dataTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Vendor</th>
                                <th>Alias</th>
                                <th>Email</th>
                                <th>Phone</th>
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
<script>
    var table;
    // function tampil datatable user
    function initDataTable(){
        if($.fn.dataTable.isDataTable('#dataTable')){
            $('#dataTable').DataTable().clear().destroy();
        }
        table = $('#dataTable').DataTable({
            ajax: '<?= base_url()?>/getvendors',
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
                    data: 'nama_vendor',
                    name: 'nama_vendor',
                },
                {
                    data: 'alias',
                    name: 'alias',
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'phone',
                    name: 'phone'
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
    // function crud user
    function crudVendor(){
        $('#addvendor').on('click', function(e){
            e.preventDefault();
            var url = '<?= base_url()?>/vendors';
            var formdata = new FormData($('#formaddvendor')[0]);
            $.ajax({
                type: 'POST',
                url: url,
                processData: false,
                contentType: false,
                data: formdata,
                dataType: 'json',
                success:function(response){
                    if(response.status === 201){
                        $('#formaddvendor')[0].reset();
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
        $('#modalimportvendor').on('click', function(e){
            e.preventDefault();
            $('#modalImportVendor').modal('show');
        })
        $('#importvendor').on('click', function(e){
            e.preventDefault();
            var from = new FormData($('#formimportvendor')[0]);
            $('#loadingimportvendor').show();
            $('#importvendor').hide();
            $.ajax({
                type: 'POST',
                url: '<?= base_url()?>/importvendor',
                data: from,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN' : '<?= csrfHeader()?>'
                },
                dataType: 'json',
                success: function(response){
                    if(response.status === 201){
                        $('#loadingimportvendor').hide();
                        $('#importvendor').show();
                        table.ajax.reload();
                        Swal.fire({
                            title: 'Success',
                            icon: 'success',
                            text: response.message,
                        })
                    } else {
                        $('#loadingimportvendor').hide();
                        $('#importvendor').show();
                        table.ajax.reload();
                        Swal.fire({
                            title: 'Error',
                            icon: 'error',
                            text: response.message,
                        })
                    }
                }
            })
        })
        $('#modalupdatevendor').on('click', function(e){
            e.preventDefault();
            var selectedData = table.rows({
                selected: true
            }).data();
            var nama_vendor = $('#unama_vendor');
            var alias = $('#ualias');
            var email = $('#uemail');
            var phone = $('#uphone');
            if(selectedData.length > 0){
                nama_vendor.val(selectedData[0].nama_vendor);
                alias.val(selectedData[0].alias);
                email.val(selectedData[0].email);
                phone.val(selectedData[0].phone);
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
        $('#updatevendor').on('click', function(e){
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
            var updateVendor = "<?= base_url() . '/uvendors/' ?>" + uID;
            var formID = '#formupdatevendor';
            // $('#modalwarning').modal('hide');
            if (selectedData.length > 0) {
                Swal.fire({
                    title: 'Update',
                    icon: 'warning',
                    text: 'Yakin data ingin diubah?',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Ubah!!',
                }).then((result) => {
                    if (result.isConfirmed) {
                        var formUpVendor = new FormData($(formID)[0]);
                        $.ajax({
                            type: 'POST',
                            url: updateVendor,
                            data: formUpVendor,
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
                                    $('#formupdatevendor')[0].reset();
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
        $('#deletevendor').on('click', function(e){
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
                                url: "<?= base_url() . '/vendors/' ?>" + uuid,
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
    function validateNumberInput(input){
        input.value = input.value.replace(/[^0-9]/g,'');
    }
    $(document).ready(function(){
        initDataTable();
        crudVendor();
        validateNumberInput();
    })
</script>