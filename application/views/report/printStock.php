<html>
<head>
	<title>Cetak PDF</title>
	<style>
		table {
			border-collapse:collapse;
			table-layout:fixed;
            width: 100%;
		}
		table td {
			word-wrap:break-word;
			width: 20%;
		}
        table th{
            background-color: gainsboro;
        }
        td th{
            padding: 10px;
        }
        h1,h5{
            text-align: center;
        }
	</style>
</head>
<body>
    <h1>DMX STORY 4</h1>    
    <h5>JL.Cinehel no.10 Kec.Cipedes Kel.Cipedes Kota Tasikmalaya Telp.081281241701</h5>
    <hr>

    <h5><?php echo $ket; ?></h5>
    
	<table border="1" cellpadding="8">
	<tr>
		<th>No</th>
		<th>Tanggal</th>
		<th>Item</th>
		<th>Qty</th>
		<th>Supplier</th>
	</tr>

        <?php
            if( ! empty($transaksi)){
            $no = 1;
            foreach($transaksi as $data){
                    $tgl = date('d-m-Y', strtotime($data->date));
                    
                echo "<tr>";
                echo "<td style='width: 20px; text-align: center;'>".$no."</td>";
                echo "<td style='text-align: center;'>".$tgl."</td>";
                echo "<td style='text-align: center;'>".$data->nama_item."</td>";
                echo "<td style='width: 20px; text-align: center;'>".$data->qty."</td>";
                echo "<td style='text-align: center;'>".$data->nama_supplier."</td>";
                echo "</tr>";
                $no++;
                }
            }
             ?>
	</table>
</body>
</html>