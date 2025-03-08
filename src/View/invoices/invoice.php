<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Invoices</h3>
                <p class="text-subtitle text-muted">This is page Invoices</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Invoices</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <button class="btn btn-primary block" data-bs-toggle="modal" data-bs-target="#border-less">Add Invoices <i
                        class="bi bi-person-add"></i></button>
                <div class="modal fade text-left modal-borderless modal-lg" id="border-less" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                        <form action="" id="formaddinvoices" class="form form-horizontal" method="POST"
                            enctype="multipart/form-data">
                            <?= csrf()?>
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Add Invoices</h5>
                                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                                        <i data-feather="x"></i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Tanggal Invoice</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="date" name="tgl_invoice" id="tgl_invoice" class="form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Tanggal Jatuh Tempo</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="date" name="tgl_jatuh_tempo" id="tgl_jatuh_tempo" class="form form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Name PT</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" name="name_pt" id="name_pt" class="form form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Purchase Orders</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <div id="po-container">
                                                    <div class="row po-item">
                                                        <div class="col-md-10">
                                                            <select name="order_id[0]" class="form-control">
                                                                <?php foreach($vendor as $vnd): ?>
                                                                    <option value="<?= $vnd->order_id ?>"><?= $vnd->no_po ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <button type="button" id="addSelect" class="btn btn-primary w-100">Add</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Payment</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <select name="payment_id" id="payment_id" class="form-control">
                                                    <?php foreach($payment as $pmt): ?>
                                                        <option value="<?= $pmt->payment_id?>"><?= $pmt->no_rek.' '.$pmt->nama_rek?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Sub Total</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" name="subtotal" id="subtotal" class="form form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>PPH 23</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" name="pph23" id="pph23" class="form form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>PPN</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" name="ppn" id="ppn" class="form form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Total Pembayaran</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" name="total_pembayaran" id="total_pembayaran" class="form form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Description</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" name="description" id="description" class="form form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Sign</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" name="sign" id="sign" class="form form-control">
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
                                    <button type="submit" class="btn btn-primary ml-1" id="addinvoices" data-bs-dismiss="modal">
                                        <i class="bx bx-check d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Submit</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <button class="btn btn-warning" data-bs-toggle="modal" id="modalupdateinvoices">Update Invoices <i class="bi bi-person-fill-gear"></i></button>
                <div class="modal fade text-left modal-borderless modal-lg" id="modalEdit" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                        <form action="" id="formupdateinvoices" class="form form-horizontal" method="POST"
                            enctype="multipart/form-data">
                            <?= csrf()?>
                            <?= method('PUT')?>
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Update Invoices</h5>
                                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                                        <i data-feather="x"></i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>No Invoices</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" name="no_invoice" id="uno_invoice" class="form form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Tanggal Invoice</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="date" name="tgl_invoice" id="utgl_invoice" class="form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Tanggal Jatuh Tempo</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="date" name="tgl_jatuh_tempo" id="utgl_jatuh_tempo" class="form form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Name PT</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" name="name_pt" id="uname_pt" class="form form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Vendor</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <select name="vendor_id" id="uvendor_id" class="form-control">
                                                    <?php foreach($vendor as $vnd): ?>
                                                        <option value="<?= $vnd->vendor_id?>"><?= $vnd->company_name?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Payment</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <select name="payment_id" id="upayment_id" class="form-control">
                                                    <?php foreach($payment as $pmt): ?>
                                                        <option value="<?= $pmt->payment_id?>"><?= $pmt->no_rek?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Sub Total</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" name="subtotal" id="usubtotal" class="form form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>PPH 23</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" name="pph23" id="upph23" class="form form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>PPN</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" name="ppn" id="uppn" class="form form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Total Pembayaran</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" name="total_pembayaran" id="utotal_pembayaran" class="form form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Description</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="text" name="description" id="udescription" class="form form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Sign</label>
                                            </div>
                                            <div class="col-md-8 form-group">
                                                <input type="file" name="sign" id="usign" class="form form-control">
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
                                    <button type="submit" class="btn btn-primary ml-1" id="updateinvoices" data-bs-dismiss="modal">
                                        <i class="bx bx-check d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Submit</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <button class="btn btn-danger" id="deleteinvoices">Delete Invoices <i class="bi bi-person-x"></i></button>
            </div>
            <div class="card-body">
                <div class="container">
                    <table class="table table-striped" id="dataTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No Invoices</th>
                                <th>Tanggal Invoice</th>
                                <th>Tanggal jatuh tempo</th>
                                <th>Name PT</th>
                                <th>Vendor</th>
                                <th>Payment</th>
                                <th>Sub total</th>
                                <th>PPH23</th>
                                <th>PPN</th>
                                <th>Total Pembayaran</th>
                                <th>Description</th>
                                <th>Sign</th>
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
document.addEventListener("DOMContentLoaded", function () {
    const poContainer = document.getElementById("po-container");
    let selectIndex = 1; // Indeks untuk nama select

    // Event listener untuk tombol Add
    document.getElementById("addSelect").addEventListener("click", function () {
        const newPoItem = document.createElement("div");
        newPoItem.classList.add("row", "po-item");
        newPoItem.innerHTML = `
            <div class="col-md-10">
                <select name="order_id[${selectIndex}]" class="form-control">
                    <?php foreach($vendor as $vnd): ?>
                        <option value="<?= $vnd->order_id ?>"><?= $vnd->no_po ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-2">
                <button type="button" class="btn btn-danger w-100 removeSelect">X</button>
            </div>
        `;
        poContainer.appendChild(newPoItem);
        selectIndex++; // Tambah indeks
    });

    // Event listener untuk tombol Remove
    poContainer.addEventListener("click", function (e) {
        if (e.target.classList.contains("removeSelect")) {
            e.target.closest(".po-item").remove();
        }
    });
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
            ajax: '<?= base_url()?>/getinvoices',
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
                    data: 'no_invoice',
                    name: 'no_invoice',
                },
                {
                    data: 'tgl_invoice',
                    name: 'tgl_invoice',
                },
                {
                    data: 'tgl_jatuh_tempo',
                    name: 'tgl_jatuh_tempo',
                },
                {
                    data: 'name_pt',
                    name: 'name_pt'
                },
                {
                    data: 'company_name',
                    name: 'company_name'
                },
                {
                    data: 'no_rek',
                    name: 'no_rek',
                    render:function(data,type,row){
                        return row.no_rek + '|' +row.nama_rek;
                    }
                },
                {
                    data: 'subtotal',
                    name: 'subtotal'
                },
                {
                    data: 'pph23',
                    name: 'pph23'
                },
                {
                    data: 'ppn',
                    name: 'ppn'
                },
                {
                    data: 'total_pembayaran',
                    name: 'total_pembayaran'
                },
                {
                    data: 'description',
                    name: 'description'
                },
                {
                    data: 'sign',
                    name: 'sign'
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
    function crudInvoices(){
        $('#addinvoices').on('click', function(e){
            e.preventDefault();
            var url = '<?= base_url()?>/cinvoices';
            console.log(url);
            var formdata = new FormData($('#formaddinvoices')[0]);
            $.ajax({
                type: 'POST',
                url: url,
                processData: false,
                contentType: false,
                data: formdata,
                dataType: 'json',
                success:function(response){
                    if(response.status === 201){
                        $('#formaddinvoices')[0].reset();
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
        $('#modalupdateinvoices').on('click', function(e){
            e.preventDefault();
            var selectedData = table.rows({
                selected: true
            }).data();
            var company_name = $('#ucompany_name');
            var address = $('#uaddress');
            var sales = $('#usales');
            var sales_support = $('#usales_support');
            var email = $('#uemail');
            var phone = $('#uphone');
            var npwp = $('#unpwp');
            if(selectedData.length > 0){
                company_name.val(selectedData[0].company_name);
                address.val(selectedData[0].address);
                sales.val(selectedData[0].sales);
                sales_support.val(selectedData[0].sales_support);
                email.val(selectedData[0].email);
                phone.val(selectedData[0].phone);
                npwp.val(selectedData[0].npwp);
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
        $('#updateinvoices').on('click', function(e){
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
            var updateShippers = "<?= base_url() . '/ushippers/' ?>" + uID;
            var formID = '#formupdateshippers';
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
                        var formUpShippers = new FormData($(formID)[0]);
                        $.ajax({
                            type: 'POST',
                            url: updateShippers,
                            data: formUpShippers,
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
                                    $('#formupdateshippers')[0].reset();
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
        $('#deleteinvoices').on('click', function(e){
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
                                url: "<?= base_url() . '/invoices/' ?>" + uuid,
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
    function addElement(){
        let selectIndex = 1; 
        $('#addSelect').on('click', function(){
            const newPoItem = document.createElement("div");
            newPoItem.classList.add("row", "po-item");
            newPoItem.innerHTML = `
                <div class="col-md-10">
                    <select name="order_id[${selectIndex}]" class="form-control">
                        <?php foreach($vendor as $vnd): ?>
                            <option value="<?= $vnd->order_id ?>"><?= $vnd->no_po ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-danger w-100 removeSelect">X</button>
                </div>
            `;
            poContainer.appendChild(newPoItem);
            selectIndex++; // Tambah indeks
        })
        poContainer.addEventListener("click", function (e) {
        if (e.target.classList.contains("removeSelect")) {
            e.target.closest(".po-item").remove();
        }
    });
    }
    $(document).ready(function(){
        initDataTable();
        crudInvoices();
    })
</script>