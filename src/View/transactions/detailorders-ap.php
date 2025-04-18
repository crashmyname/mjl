<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Detail Order Pages</h3>
                <p class="text-subtitle text-muted">Detail Order</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Detail Order
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Detail Order</h4>
                <h5 class="card-title"><?= $order->no_po?></h5>
                <h6 class="card-title" style="float:right">Rute <?= $order->origin_city.' - '.$order->destination?></h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <form action="" id="updateorders" method="POST"
                                        enctype="multipart/form-data">
                                        <?= csrf()?>
                                        <?= method('PUT')?>
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="first-name-column">Pickup Date</label>
                                                    <input type="text" name="pickup_date"
                                                        value="<?= \Support\Date::parse($order->pickup_date)->format('d M Y') ?>"
                                                        class="form form-control" id="pickup_date" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="last-name-column">Tanggal PO</label>
                                                    <input type="text" name="tgl_pembuatan_po"
                                                        value="<?= \Support\Date::parse($order->tgl_pembuatan_po)->format('d M Y') ?>"
                                                        class="form form-control" id="tgl_pembuatan_po" disabled>
                                                </div>
                                            </div>
                                            <hr>
                                        </div>
                                        <h4 class="card-title">Supplier <?= $order->company_name?></h4>
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="first-name-column">Address</label>
                                                    <textarea name="" id="" disabled class="form-control"><?= $order->address?></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="last-name-column">Email</label>
                                                    <input type="text" name="email"
                                                        value="<?= $order->email ?>"
                                                        class="form form-control" id="email" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="first-name-column">Sales</label>
                                                    <input type="text" name="sales"
                                                        value="<?= $order->sales ?>"
                                                        class="form form-control" id="sales" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="last-name-column">Sales Support</label>
                                                    <input type="text" name="sales_support"
                                                        value="<?= $order->sales_support ?>"
                                                        class="form form-control" id="sales_support" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="first-name-column">NPWP</label>
                                                    <input type="text" name="npwp"
                                                        value="<?= $order->npwp ?>"
                                                        class="form form-control" id="npwp" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="last-name-column">Phone</label>
                                                    <input type="text" name="phone"
                                                        value="<?= $order->phone ?>"
                                                        class="form form-control" id="phone" disabled>
                                                </div>
                                            </div>
                                            <hr>
                                        </div>
                                        <h4 class="card-title">Driver <?= $order->company_name?></h4>
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="first-name-column">Plat Number</label>
                                                    <input type="text" name="plat_number"
                                                        value="<?= $order->plat_number ?>"
                                                        class="form form-control" id="plat_number" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="last-name-column">Truck Type</label>
                                                    <input type="text" name="truck_type"
                                                        value="<?= $order->truck_type ?>"
                                                        class="form form-control" id="truck_type" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="first-name-column">Truck Sub Type</label>
                                                    <input type="text" name="truck_sub_type"
                                                        value="<?= $order->truck_sub_type ?>"
                                                        class="form form-control" id="truck_sub_type" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="last-name-column">Plat Color</label>
                                                    <input type="text" name="plat_color"
                                                        value="<?= $order->plat_color ?>"
                                                        class="form form-control" id="plat_color" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <h4 class="card-title">No Surat Jalan <?= $order->no_surat_jalan ?? 'Belum diinput'?></h4>
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="first-name-column">No Surat Jalan</label>
                                                    <?php if($order->no_surat_jalan != null): ?>
                                                        <input type="text" name="no_surat_jalan"
                                                            value="<?= $order->no_surat_jalan?>"
                                                            class="form form-control" id="no_surat_jalan" disabled>
                                                        <?php else: ?>
                                                        <input type="text" name="no_surat_jalan"
                                                            value=""
                                                            class="form form-control" id="no_surat_jalan">
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="last-name-column">Upload Bukti Surat jalan</label>
                                                    <?php if($order->bukti != null): ?>
                                                        <img src="<?= asset('document/data/').$order->bukti?>" width="85%" alt="">
                                                        <?php else: ?>
                                                            <input type="file" name="bukti"
                                                            class="form form-control" id="bukti">
                                                    <?php endif;?>
                                                </div>
                                            </div>
                                        </div>
                                        <?php if($order->no_surat_jalan == null && $order->bukti == null):?>
                                        <button type="submit" class="btn btn-warning" style="float:right" id="update">Update</button>
                                        <?php endif; ?>
                                        <br>
                                        <hr>
                                        <h1 class="card-title"><?= $order->status?></h1>
                                        <h2 class="card-title" style="float:right">Rp. <?= number_format($order->price,2,',','.')?></h2>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script type="text/javascript">
    $('#update').on('click', function(e) {
        e.preventDefault();
        var uID = '<?= $order->no_po?>';
        var url = "<?= base_url()?>/updateorders" + '/' + uID;
        var formData = new FormData($('#updateorders')[0]);
        Swal.fire({
            title: 'Update',
            icon: 'warning',
            text: 'Apakah yakin data ingin diubah?',
            showCancelButton: true,
            confirmButtonText: 'Yes, Update!!',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'POST',
                    url: url,
                    processData: false,
                    contentType: false,
                    data: formData,
                    dataType: 'json',
                    success: function(response) {
                        if (response.status === 200) {
                            Swal.fire({
                                title: 'Success',
                                icon: 'success',
                                text: 'PO berhasil diupdate',
                            });
                            if (response.data.no_surat_jalan) {
                                $('#no_surat_jalan').val(response.data.no_surat_jalan).prop('disabled', true);
                            }
                            if (response.data.bukti) {
                                $('#bukti').replaceWith('<img src="<?= asset('document/data/') ?>' + response.data.bukti + '" width="85%" alt="">');
                            }
                            $('#update').hide();
                        } else {
                            Swal.fire({
                                title: 'Error',
                                icon: 'error',
                                text: 'Gagal membuat PO',
                            })
                        }
                    },
                    error: function(error) {
                        console.error(error);
                        Swal.fire({
                            title: 'Error',
                            icon: 'error',
                            text: 'Error dalam melakukan fungsi',
                        })
                    }
                })
            }
        })
    })
</script>