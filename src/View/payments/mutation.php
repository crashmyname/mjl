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
                <h3>Mutation</h3>
                <p class="text-subtitle text-muted">This is page Mutation</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Mutation</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
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
                                <th>Transaction Date</th>
                                <th>Reference Data</th>
                                <th>Nama Bank</th>
                                <th>No Rekening</th>
                                <th>Nama Rekening</th>
                                <th>Jenis Transaction</th>
                                <th>Type</th>
                                <th>Amount</th>
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
                url : '<?= base_url()?>/getmutation',
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
                    data: 'transaction_date',
                    name: 'transaction_date',
                },
                {
                    data: 'reference_table',
                    name: 'reference_table',
                },
                {
                    data: 'nama_bank',
                    name: 'nama_bank',
                },
                {
                    data: 'no_rek',
                    name: 'no_rek',
                },
                {
                    data: 'nama_rek',
                    name: 'nama_rek'
                },
                {
                    data: 'jenis_transaction',
                    name: 'jenis_transaction'
                },
                {
                    data: 'type_transaction',
                    name: 'type_transaction',
                    render: function(data,type,row){
                        if(data == 'outcome'){
                            return '<span class="badge bg-light-danger">'+data+'</span>'
                        } else {
                            return '<span class="badge bg-light-success">'+data+'</span>'
                        }
                    }
                },
                {
                    data: 'amount',
                    name: 'amount'
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
    }
    function flatPicker(){
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
        input.value = input.value.replace(/[^0-9]/g,'');
    }
    $(document).ready(function(){
        initDataTable();
        crudClaim();
        flatPicker();
        validateNumberInput();
    })
</script>