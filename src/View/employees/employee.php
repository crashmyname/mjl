<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Employee</h3>
                <p class="text-subtitle text-muted">This is page Employee to Manage Employee.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Employees</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <button class="btn btn-primary block" data-bs-toggle="modal" data-bs-target="#border-less">Add Employee <i
                        class="bi bi-person-add"></i></button>
                <div class="modal fade text-left modal-borderless modal-lg" id="border-less" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                        <form action="" id="formaddemployee" class="form form-horizontal" method="POST"
                            enctype="multipart/form-data">
                            <?= csrf()?>
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Add Employee</h5>
                                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                                        <i data-feather="x"></i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>No Karyawan</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" name="no_karyawan" id="no_karyawan" class="form form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Nama Karyawan</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" name="nama_karyawan" id="nama_karyawan" class="form form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Tempat Lahir</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" name="tempat_lahir" id="tempat_lahir" class="form form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Tanggal Lahir</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="date" name="tgl_lahir" id="tgl_lahir" class="form form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Bagian</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" name="section" id="section" class="form form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Jabatan</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" name="jabatan" id="jabatan" class="form form-control">
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
                                    <button type="submit" class="btn btn-primary ml-1" id="addemployee" data-bs-dismiss="modal">
                                        <i class="bx bx-check d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Submit</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <button class="btn btn-warning" data-bs-toggle="modal" id="modalupdateemployee">Update Employee <i class="bi bi-person-fill-gear"></i></button>
                <div class="modal fade text-left modal-borderless modal-lg" id="modalEdit" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                        <form action="" id="formupdateemployee" class="form form-horizontal" method="POST"
                            enctype="multipart/form-data">
                            <?= csrf()?>
                            <?= method('PUT')?>
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Update Employee</h5>
                                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                                        <i data-feather="x"></i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>No Karyawan</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" name="no_karyawan" id="uno_karyawan" class="form form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Nama Karyawan</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" name="nama_karyawan" id="unama_karyawan" class="form form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Tempat Lahir</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" name="tempat_lahir" id="utempat_lahir" class="form form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Tanggal Lahir</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="date" name="tgl_lahir" id="utgl_lahir" class="form form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Bagian</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" name="section" id="usection" class="form form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Jabatan</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" name="jabatan" id="ujabatan" class="form form-control">
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
                                    <button type="submit" class="btn btn-primary ml-1" id="updateemployee" data-bs-dismiss="modal">
                                        <i class="bx bx-check d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Submit</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <button class="btn btn-danger" id="deleteemployee">Delete Employee <i class="bi bi-person-x"></i></button>
            </div>
            <div class="card-body">
                <div class="container">
                    <table class="table table-striped" id="dataTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No Karyawan</th>
                                <th>Nama Karyawan</th>
                                <th>Tempat Lahir</th>
                                <th>Tanggal Lahir</th>
                                <th>Bagian</th>
                                <th>Jabatan</th>
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
            ajax: '<?= base_url()?>/getemployees',
            processing:true,
            serverSide:true,
            select:true,
            responsive:true,
            columns:[
                {
                    data: 'employee_id',
                    name: 'employee_id',
                    render:function(data, type, row, meta){
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {
                    data: 'no_karyawan',
                    name: 'no_karyawan',
                },
                {
                    data: 'nama_karyawan',
                    name: 'nama_karyawan',
                },
                {
                    data: 'tempat_lahir',
                    name: 'tempat_lahir',
                },
                {
                    data: 'tgl_lahir',
                    name: 'tgl_lahir',
                },
                {
                    data: 'section',
                    name: 'section',
                },
                {
                    data: 'jabatan',
                    name: 'jabatan',
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
    // function crud employee
    function crudEmployee(){
        $('#addemployee').on('click', function(e){
            e.preventDefault();
            var url = '<?= base_url()?>/employees';
            var formdata = new FormData($('#formaddemployee')[0]);
            $.ajax({
                type: 'POST',
                url: url,
                processData: false,
                contentType: false,
                data: formdata,
                dataType: 'json',
                success:function(response){
                    if(response.status === 201){
                        $('#formaddemployee')[0].reset();
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
        $('#modalupdateemployee').on('click', function(e){
            e.preventDefault();
            var selectedData = table.rows({
                selected: true
            }).data();
            var no_karyawan = $('#uno_karyawan');
            var nama_karyawan = $('#unama_karyawan');
            var tempat_lahir = $('#utempat_lahir');
            var tgl_lahir = $('#utgl_lahir');
            var section = $('#usection');
            var jabatan = $('#ujabatan');
            if(selectedData.length > 0){
                no_karyawan.val(selectedData[0].no_karyawan);
                nama_karyawan.val(selectedData[0].nama_karyawan);
                tempat_lahir.val(selectedData[0].tempat_lahir);
                tgl_lahir.val(selectedData[0].tgl_lahir);
                section.val(selectedData[0].section);
                jabatan.val(selectedData[0].jabatan);
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
        $('#updateemployee').on('click', function(e){
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
            var uID = row.employee_id;
            var updateUser = "<?= base_url() . '/uemployees/' ?>" + uID;
            var formID = '#formupdateemployee';
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
                        var formUpUser = new FormData($(formID)[0]);
                        $.ajax({
                            type: 'POST',
                            url: updateUser,
                            data: formUpUser,
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
                                    $('#formupdateemployee')[0].reset();
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
        $('#deleteemployee').on('click', function(e){
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
                            const uuid = data.employee_id;
                            $.ajax({
                                type: 'DELETE',
                                url: "<?= base_url() . '/employees/' ?>" + uuid,
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
        crudEmployee();
    })
</script>