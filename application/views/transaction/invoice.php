<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />

		<title>Invoice</title>

		<!-- Invoice styling -->
		<style>
			body {
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				text-align: center;
				color: #777;
			}

			body h1 {
				font-weight: 300;
				margin-bottom: 0px;
				padding-bottom: 0px;
				color: #000;
			}

			body h3 {
				font-weight: 300;
				margin-top: 10px;
				margin-bottom: 20px;
				font-style: italic;
				color: #555;
			}

			body a {
				color: #06f;
			}

			.invoice-box {
				max-width: 100%;
				margin: auto;
				padding: 30px;
				border: 1px solid #eee;
				font-size: 16px;
				line-height: 24px;
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				color: #555;
				margin-bottom: 50px;
			}

			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
				border-collapse: collapse;
			}

			.invoice-box table td {
				padding: 5px;
				vertical-align: top;
			}

			.invoice-box table tr td:nth-child(2) {
				text-align: right;
			}

			.invoice-box table tr.top table td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.top table td.title {
				font-size: 20px;
				line-height: 45px;
				color: #333;
			}

			.invoice-box table tr.information table td {
				padding-bottom: 40px;
			}

			.invoice-box table tr.heading td {
				background: #eee;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
			}

			.invoice-box table tr.details td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.item td {
				border-bottom: 1px solid #eee;
			}

			.invoice-box table tr.item.last td {
				border-bottom: none;
			}

			.invoice-box table tr.total td:nth-child(4) {
				border-top: 2px solid #eee;
                padding-top: 16px;
                padding-left: 16px;
                text-align: right;
				font-weight: bold;
			}
			.kembali{
				background-color: #bb371a;
				padding: 15px;
				text-decoration: none;
				color: white;
				border-radius: 15px;
				font-weight: 500;
			}
			.kembali:hover{
				background-color: #962d2d;
				font-weight: 600;
				color: whitesmoke;
			}
			@media print{
				.kembali{
					display: none;
				}
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
		</style>
	</head>

	<body>

		<div class="invoice-box">
			<table>
				<tr class="top">
					<td colspan="4">
						<table>
							<tr>
								<td class="title">
									<b>DMX STORY 4</b>
								</td>

								<td>
									Invoice #:<?= $invoice ?><br/>
									Tanggal : <?= date('d-M-Y') ?><br />
									Kasir : <?= $this->fungsi->userLogin()->nama;?>
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="information">
					<td colspan="2">
						<table>
							<tr>
								<td>
                                    JL.Cinehel no.10.<br/>
									Kec.Cipedes Kel.Cipedes Kota Tasikmalaya<br/>
									Telp.081281241701
								</td>
							</tr>
						</table>
					</td>
				</tr>
				<hr>
				<tr class="heading">
					<td>Item</td>
					<td style="text-align: center;">Price</td>
                    <td style="text-align: center;">qty</td>
                    <td>Total</td>
				</tr>
                <?php foreach($this->cart->contents() as $items): ?>
				<tr class="item">
                <td><?= $items['name'] ?></td>
                <td style="text-align: center;"><?= rupiah($items['price']) ?></td>
                <td style="text-align: center;"><?= $items['qty'] ?></td>
                <td><?= rupiah($items['subtotal']) ?></td>
				</tr>
                <?php endforeach ?>
				<tr class="total">
					<td></td>
                    <td></td>
                    <td></td>
					<td>Sub Total: <?= rupiah($this->cart->total())?></td>
				</tr>
			</table>
		</div>
		<a class="kembali" href="<?= site_url('Sales') ?>">Kembali</a>
	</body>
</html>
<script>window.print()</script>