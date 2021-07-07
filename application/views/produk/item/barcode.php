<div class="main-content">
<section class="section">
        <div class="section-header">
            <h1>Barcode Item</h1>
        </div>
        <?php $this->view('alert');?>
        <div class="card">
        <div class="card-header">
                <h2 class="section-title">Barcode Generator</h2>
        </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <?php 
                            $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
                            echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($row->barcode, $generator::TYPE_CODE_128)) . '">';
                        ?>
                    </div>
                </div>
            </div>
    </section>
</div>