<!DOCTYPE html>
<html>
<head>
    <title>Invoice #<?= $invoice->invoice_id ?></title>
</head>
<body>
    <h2>Invoice #<?= $invoice->invoice_id ?></h2>
    <p>Tanggal: <?= $invoice->tgl_invoice ?></p>
    <p>Nama Perusahaan: <?= $invoice->name_pt ?></p>
    <table border="1" width="100%">
        <tr>
            <td>Nomor Invoice</td>
            <td rowspan="3"><img src="<?= asset('documents/logomjl.png')?>" style="float:right"></td>
        </tr>
        <tr>
            <td>Test</td>
        </tr>
        <tr>
            <td>Tanggal Penagihan   12-12-1990</td>
        </tr>
    </table>
</body>
</html>
