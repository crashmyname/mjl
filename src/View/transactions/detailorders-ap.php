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
                                        <h4 class="card-title">Supplier <?= $order->vendor?></h4>
                                        <div class="row">
                                            <hr>
                                        </div>
                                        <h4 class="card-title">Driver <?= $order->driver?></h4>
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="first-name-column">Plat Number</label>
                                                    <input type="text" name="vehicle"
                                                        value="<?= $order->vehicle ?>"
                                                        class="form form-control" id="vehicle" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <h4 class="card-title">Quotation <?= $order->quotation ?? 'Belum diinput'?></h4>
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="last-name-column">Upload Quotation</label>
                                                    <?php if($order->quotation != null): ?>
                                                        <img src="<?= asset('document/data/quotation/').$order->quotation?>" width="85%" alt="">
                                                        <?php else: ?>
                                                            <input type="file" name="quotation"
                                                            class="form form-control" id="quotation">
                                                    <?php endif;?>
                                                </div>
                                            </div>
                                        </div>
                                        <?php if($order->quotation == null):?>
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
        var url = "<?= base_url()?>/updateorders-ap" + '/' + uID;
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
                            if (response.data.quotation) {
                                $('#quotation').replaceWith('<img src="<?= asset('document/data/quotation/') ?>' + response.data.quotation + '" width="85%" alt="">');
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