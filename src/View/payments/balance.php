<!DOCTYPE html>
<html>
<head>
    <title>Mutation </title>
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
            <td></td>
            <td rowspan="3"><img src="<?= asset('documents/logomjl.png')?>" style="float:right"></td>
        </tr>
        <tr>
            <td style="font-size:55px;width: 60%;"><b>Mutation</b></td>
        </tr>
        <tr>
            <td>Periode Mutation &nbsp;&nbsp; <b><?= \Support\Date::parse($startdate)->format('d M Y')?> - <?= \Support\Date::parse($enddate)->format('d M Y')?></b></td>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>
            <td style="font-size:30px"><b>Perusahaan</b></td>
        </tr>
        <tr>
            <td style="font-size:40px">CV Murai Jaya Logistic</td>
            <td style="font-size:40px"></td>
        </tr>
        <tr>
            <td style="font-size:20px"><b>Alamat</b> BABAT, LEGOK, TANGERANG, BANTEN</td>
        </tr>
        <tr>
            <td colspan="2"></td>
        </tr>
        <tr>
            <td colspan="2" style="font-size:30px"><b>Rincian Mutation</b></td>
        </tr>
        <tr>
            <table border="1" width="100%" class="">
                <thead>
                    <tr>
                        <th colspan="9">Begining Balance</th>
                        <th colspan="2"><span style="float:right"><?= 'Rp. '.number_format($balance,2,',','.')?></span></th>
                        <th></th>
                    </tr>
                </thead>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Transaction Date</th>
                        <th>Reference</th>
                        <th>No Invoice</th>
                        <th>Nama Bank</th>
                        <th>No Rek</th>
                        <th>Nama Rek</th>
                        <th>Jenis Transaction</th>
                        <th>Type</th>
                        <th>Amount</th>
                        <th>Balance</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    $balance;
                    foreach($transactions as $transaction):
                        if($transaction->type_transaction == 'income'){
                            $balance += $transaction->amount;
                        } else if($transaction->type_transaction == 'outcome'){
                            $balance -= $transaction->amount;
                        }
                    ?>
                    <tr>
                        <th><?= $no?></th>
                        <th><?= $transaction->transaction_date?></th>
                        <th><?= $transaction->reference_table?></th>
                        <th><?= $transaction->reff?></th>
                        <th><?= $transaction->nama_bank?></th>
                        <th><?= $transaction->no_rek?></th>
                        <th><?= $transaction->nama_rek?></th>
                        <th><?= $transaction->jenis_transaction?></th>
                        <th><?= $transaction->type_transaction?></th>
                        <th><?= 'Rp. '.number_format($transaction->amount,2,',','.')?></th>
                        <th><?= 'Rp. '.number_format($balance,2,',','.')?></th>
                        <th><?= $transaction->description?></th>
                    <?php $no++; ?>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </tr>
        <br>
        <tr>
            <table>
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
