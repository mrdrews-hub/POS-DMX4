<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tiket</title>
    <style>
        body{
            width: 360px;
            margin: auto;
            padding: 30px;
            border: 1px solid rgb(209, 209, 209);
            font-size: 14px;
            line-height: 20px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            /* color: #555; */
        }
        table {
            margin-top: 36px;
            flex-wrap: wrap;
            width: 100%;
            line-height: inherit;
            border-collapse: collapse;
        }
        table tr{
            border-bottom: 1px solid rgb(114, 114, 114);
        }
        table th { 
            text-align: left; 
            padding: 6px;
        }
        table td{
            text-align: right;
            padding-right: 4px;
        }
        button{
            padding: 4px;
            cursor: pointer;
        }
        button:hover{
            background-color: #eee;
        }
        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }
        @media print{
            button{
            display: none;
            }
        }
    </style>
</head>
<body>
<header>
    <div class="container">
        <h4 style="text-align: center; font-size: larger;"><b>Tiket Service</b></h4>
        <hr><hr>
        <p class="title" style="text-align: center;"><b>DMX STORY 4</b></p>
        <p class="address" style="text-align: center;">JL.Cinehel no.10 Kec.Cipedes Kel.Cipedes Kota Tasikmalaya Telp.081281241701</p>
    </div>
</header>
<main>
<div class="container">
    <table>
        <tr>
            <th>Nama Customer :</th>
            <td><?= $row->customer ?></td>
        </tr>
        <tr>
            <th>Barang service :</th>
            <td><?= $row->perangkat ?></td>
        </tr>
        <tr>
            <th>No Telp :</th>
            <td><?= $row->notelp ?></td>
        </tr>
        <tr>
            <th>Keluhan :</th>
            <td><?= $row->keluhan ?></td>
        </tr>
    </table>
</div>
</main>

<footer>
<div class="container" style="margin-top: 36px;">
    <hr><hr>
    <p style="margin-bottom: -10px;"><i>*Harap dibawa saat mengambil barang service</i></p>
    <p><i>*Kami akan menghubungi anda kembali apabila proses service selesai</i></p>
    <p style="text-align: right; margin-bottom:-10px;">Kasir : <?= $row->admin ?></p>
</div>
</footer>
<a href="<?=site_url('service/in')?>"><button>Kembali</button></a>
<script> window.print() </script>
</body>
</html>