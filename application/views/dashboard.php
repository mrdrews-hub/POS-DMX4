
       <!-- Main Content -->
       <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Dashboard</h1>
          </div>
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="fas fa-tools"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Services</h4>
                  </div>
                  <div class="card-body">
                  <?= $this->fungsi->countService(); ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                  <i class="far fa-newspaper"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Suppliers</h4>
                  </div>
                  <div class="card-body">
                    <?= $this->fungsi->countSupplier(); ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                  <i class="fas fa-shopping-bag"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Items</h4>
                  </div>
                  <div class="card-body">
                  <?= $this->fungsi->countItem(); ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                  <i class="fas fa-cart-arrow-down"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Transaksi</h4>
                  </div>
                  <div class="card-body">
                  <?= $this->fungsi->countTrx(); ?>
                  </div>
                </div>
              </div>
            </div>                  
          </div>
          <div class="row">
            <div class="col-12 col-md-8 col-lg-8">
            <div class="card">
                  <div class="card-header">
                    <h4 class="text-danger">DAFTAR STOCK KURANG DARI 5</h4>
                  </div>
                  <div class="card-body">
                  <div class="table-responsive">
                      <table class="table table-bordered table-hover text-center" id="mytable">
                            <thead>                            
                                <tr class="table-warning">
                                    <th style="width: 10%;">#</th>
                                    <th>Nama Barang</th>
                                    <th>Kategori</th>
                                    <th>Stock</th>
                                </tr>
                            </thead>
                            <tbody>

                                 <?php $i=1;
                                 foreach( $row->result() as $data): ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><?= $data->nama_item ?></td>
                                    <td><?= $data->nama_category ?></td>
                                    <td><?= $data->stock?></td>
                                </tr>
                                <?php 
                                endforeach;?>

                            </tbody>
                      </table>
                    </div>
                  </div>
                </div>
            </div>

            </div>

          </div>
        </section>
      </div>
<!-- END CONTENT -->
<!-- <script>
var myNodelist = document.getElementsByTagName("LI");
var i;
for (i = 0; i < myNodelist.length; i++) {
  var span = document.createElement("SPAN");
  var txt = document.createTextNode("\u00D7");
  span.className = "close";
  span.appendChild(txt);
  myNodelist[i].appendChild(span);
}

// Click on a close button to hide the current list item
var close = document.getElementsByClassName("close");
var i;
for (i = 0; i < close.length; i++) {
  close[i].onclick = function() {
    var div = this.parentElement;
    div.style.display = "none";
  }
}

// Add a "checked" symbol when clicking on a list item
var list = document.querySelector('ul');
list.addEventListener('click', function(ev) {
  if (ev.target.tagName === 'LI') {
    ev.target.classList.toggle('checked');
  }
}, false);

// Create a new list item when clicking on the "Add" button
function newElement() {
  var li = document.createElement("li");
  var inputValue = document.getElementById("myInput").value;
  var t = document.createTextNode(inputValue);
  li.appendChild(t);
  if (inputValue === '') {
    alert("You must write something!");
  } else {
    document.getElementById("myUL").appendChild(li);
  }
  document.getElementById("myInput").value = "";

  var span = document.createElement("SPAN");
  var txt = document.createTextNode("\u00D7");
  span.className = "close";
  span.appendChild(txt);
  li.appendChild(span);

  for (i = 0; i < close.length; i++) {
    close[i].onclick = function() {
      var div = this.parentElement;
      div.style.display = "none";
    }
  }
} 
</script> -->