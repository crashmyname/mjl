<!DOCTYPE html>
<html>
<head>
    <title>Invoice #<?= $invoice[0]->no_invoice ?></title>
    <style>
        @media print {
            @page {
                size: A4; /* Set ukuran kertas */
                margin: 10mm; /* Atur margin agar rapi */
            }

            body {
                zoom: 60%; /* Set scale menjadi 60% */
            }

            img {
                max-width: 100%; /* Pastikan gambar tidak pecah */
            }
        }
        .header {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        text-align: center;
        font-size: 14px;
        font-weight: bold;
        border-bottom: 2px solid black;
        padding: 10px 0;
        }

        /* Tambahkan footer */
        .footer {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            text-align: center;
            font-size: 12px;
            border-top: 2px solid black;
            padding: 10px 0;
        }
        body {
            font-family: Arial, sans-serif;
            margin-top: 60px; /* Sesuaikan dengan tinggi header */
            margin-bottom: 60px; /* Sesuaikan dengan tinggi footer */
        }
        table {
                width: 100%;
                border-collapse: collapse; /* Menggabungkan border menjadi satu garis */
            }

            th, td {
                padding: 8px; /* Ruang dalam cell */
                text-align: left; /* Teks rata kiri */
            }
    </style>
</head>
<body>
    <table width="100%">
        <tr>
            <td>Nomor Invoice</td>
            <td rowspan="3"><img src="<?= asset('documents/logomjl.png')?>" style="float:right"></td>
        </tr>
        <tr>
            <td style="font-size:55px;width: 60%;"><b><?= $invoice[0]->no_invoice?></b></td>
        </tr>
        <tr>
            <td>Tanggal Penagihan &nbsp;&nbsp; <b><?= \Support\Date::parse(\Support\Date::Now())->format('d M Y')?></b></td>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>
            <td style="font-size:30px"><b>Perusahaan</b></td>
            <td style="font-size:30px"><b>Pelanggan</b></td>
        </tr>
        <tr>
            <td style="font-size:40px"><?= $invoice[0]->name_pt?></td>
            <td style="font-size:40px"><?= $invoice[0]->company_name?></td>
        </tr>
        <tr>
            <td style="font-size:20px"><b>NPWP</b> 61.346.709.1-435.000</td>
            <td rowspan="2" style="font-size:20px"><b>Alamat</b> <?= $invoice[0]->address?></td>
        </tr>
        <tr>
            <td style="font-size:20px"><b>Alamat</b> BABAT, LEGOK, TANGERANG, BANTEN</td>
        </tr>
        <tr>
            <td colspan="2"></td>
        </tr>
        <tr>
            <td colspan="2" style="font-size:30px"><b>Rincian Tagihan</b></td>
        </tr>
        <tr>
            <table border="1" width="100%" class="">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nomor Pengirim</th>
                        <th>Tanggal Muat</th>
                        <th>Jenis Truck</th>
                        <th>No. Polisi</th>
                        <th>Warna Plat</th>
                        <th>Rute</th>
                        <th>Total Tagihan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($invoice as $inv):?>
                    <tr>
                        <td><?= $inv->invoice_id?></td>
                        <td><?= $inv->no_po?></td>
                        <td><?= \Support\Date::parse($inv->pickup_date)->format('d M Y')?></td>
                        <td><?= $inv->truck_type?></td>
                        <td><?= $inv->plat_number?></td>
                        <td><?= $inv->plat_color?></td>
                        <td><?= $inv->origin_city?>><?= $inv->destination?></td>
                        <td>Rp. <?= number_format($inv->price,2,',','.')?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </tr>
        <br>
        <tr>
            <table width="100%" >
            <tr>
                <td colspan="2" width="49%">Informasi Pembayaran</td>
                <td>Ringkasan Tagihan</td>
            </tr>
            <tr>
                <td style="width:15%">Nomor Rekening</td>
                <td><?= $payment->no_rek?></td>
                <td rowspan="5">
                    <table border=1 height="100%">
                        <tr>
                            <td>Total Penghasilan</td>
                            <td><span style="float:right">Rp. <?= number_format($invoice[0]->subtotal,2,',','.')?></span></td>
                        </tr>
                        <tr>
                            <td>PPH23</td>
                            <td>4%<span style="float:right">Rp. <?= number_format($invoice[0]->subtotal*0.04,2,',','.')?></span></td>
                        </tr>
                        <tr>
                            <td>PPN</td>
                            <td>11%<span style="float:right">Rp. <?= number_format($invoice[0]->subtotal*0.11,2,',','.')?></span></td>
                        </tr>
                        <tr>
                            <td>Total Tagihan</td>
                            <td><span style="float:right">Rp. <?= number_format($invoice[0]->total_pembayaran,2,',','.')?></span></td>
                        </tr>
                        <tr>
                            <td>Terbilang</td>
                            <td style="height:60px" width="50%"><?php $formater = new NumberFormatter("id", NumberFormatter::SPELLOUT);
                                echo ucwords($formater->format($invoice[0]->total_pembayaran)) . " Rupiah"; ?></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td>Nama Bank</td>
                <td><?= $payment->nama_bank?></td>
            </tr>
            <tr>
                <td>Pemilik Rekening</td>
                <td><?= $payment->nama_rek?></td>
            </tr>
            <tr>
                <td>Bank Code</td>
                <td><?= $payment->bank_code?></td>
            </tr>
            <tr>
                <td>Swift Code</td>
                <td><?= $payment->swift_code?></td>
            </tr>
            <tr>
                <td colspan="3">Keterangan</td>
            </tr>
            <tr>
                <td colspan="2">
                    <table border="1">
                        <tr>
                            <td style="height:100px"><?= $invoice[0]->description?></td>
                        </tr>
                    </table>
                </td>
            </tr>
            </table>
        </tr>
        <tr>
            <table>
                <tr>
                    <td></td>
                    <td width="55%"></td>
                    <td>Mengetahui, <?= \Support\Date::parse(\Support\Date::Now())->format('d M Y')?></td>
                </tr>
                <tr>
                    <td></td>
                    <td width="55%"></td>
                    <td><img src="<?= asset('documents/stempel.png')?>" alt=""></td>
                </tr>
            </table>
        </tr>
    </table>
    <script>
    window.onload = function() {
        window.print(); // Cetak otomatis saat halaman dimuat
    };
</script>

</body>
</html>
