

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>POS &mdash; DMX STORY 4</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?=base_url()?>admin/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?=base_url()?>admin/node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css">
  <link rel="stylesheet" href="<?=base_url()?>admin/node_modules/jquery-ui-dist/jquery-ui.min.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?=base_url()?>admin/assets/css/style.css">
  <link rel="stylesheet" href="<?=base_url()?>admin/assets/css/components.css">
  <style>
    form label{
      font-weight:  bold;
      font-family: Arial, Helvetica, sans-serif;
    }
  </style>
</head>
<script src="<?=base_url()?>admin/node_modules/jquery/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.3/dist/JsBarcode.all.min.js"></script>
<body <?= $this->uri->segment(1) == 'sales' ? 'class="sidebar-mini"' : '' ?>>
<div id="app">
    <div class="main-wrapper">
    
    <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
            <a href="#" data-toggle="sidebar" class="nav-link nav-link-lg hidden"><i class="fas fa-bars"></i></a>
          </form>
          <!-- PROFILE -->
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="<?=base_url()?>admin/assets/img/avatar/admin.png" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Hi, <?= $this->fungsi->userLogin()->nama;?></div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-divider"></div>
              <a href="<?=site_url('auth/logout')?>" onclick="return confirm('Yakin ingin Logout ?')" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <!-- END -->

      <!-- SIDEBAR -->
      <div class="main-sidebar d-print-none">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="<?= site_url('dashboard') ?>">DMX STORY 4</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm bg-light">
            <a href="<?= site_url('dashboard') ?>">DMX</a>
          </div>
          <ul class="sidebar-menu">
              <li class="menu-header bg-light">Dashboard</li>
   
                    <li <?= $this->uri->segment(1) == 'dashboard' || $this->uri->segment(1) == '' ? 'class="active"' : '' ?>>
                    <a class="nav-link" href="<?= site_url('dashboard') ?>"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a>
                    </li>

                    <li <?= $this->uri->segment(1) == 'supplier' ? 'class="active"' : '' ?> >
                    <a class="nav-link" href="<?= site_url('supplier') ?>"><i class="fas fa-truck"></i> <span>Suppliers</span></a>
                    </li>

                    <li <?= $this->uri->segment(1) == 'service' ? 'class="active"' : '' ?> >
                    <a class="nav-link" href="<?= site_url('service/in') ?>"><i class="fas fa-tools"></i> <span>Services</span></a>
                    </li>

                    <li class="dropdown <?= $this->uri->segment(1) == 'category' || $this->uri->segment(1) == 'unit' || $this->uri->segment(1) == 'item' ? 'active' : '' ?>">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-cubes"></i> <span>Products</span></a>
                    <ul class="dropdown-menu">
                    <li <?= $this->uri->segment(1) == 'category' ? 'class="active"' : '' ?> ><a class="nav-link" href="<?= site_url('category') ?>">Categories</a></li>
                    <li <?= $this->uri->segment(1) == 'unit' ? 'class="active"' : '' ?>><a class="nav-link" href="<?= site_url('unit') ?>">Unit</a></li>
                    <li <?= $this->uri->segment(1) == 'item' ? 'class="active"' : '' ?>><a class="nav-link" href="<?= site_url('item') ?>">Items</a></li>
    
                    <li <?= $this->uri->segment(2) == 'in' ? 'class="active"' : '' ?>><a class="nav-link" href="<?= site_url('stock/in') ?>">Stock</a></li>
                    <li <?= $this->uri->segment(2) == 'out' ? 'class="active"' : '' ?>><a class="nav-link" href="<?= site_url('stock/out') ?>">Retur</a></li>
            
                    </ul>
                    </li>

                    <li <?= $this->uri->segment(1) == 'sales' ? 'class="active"' : '' ?>>
                    <a href="<?= site_url('sales') ?>" class="nav-link"><i class="fas fa-shopping-cart"></i> <span>Transaction</span></a>
                    </li>
                    
                    <li class="nav-item dropdown">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-file-invoice-dollar"></i></i> <span>Reports</span></a>
                    <ul class="dropdown-menu">
                    <li><a class="nav-link" href="<?= site_url('report') ?>">Sales</a></li>
                    <li><a class="nav-link" href="<?= site_url('RStock') ?>">Stock</a></li>
                    </ul>
                    </li>
                    <?php if($this->fungsi->userLogin()->level == 1):?>
                    <li class="menu-header bg-light">Setting</li>
                    <li <?= $this->uri->segment(1) == 'user' ? 'class="active"' : '' ?> ><a class="nav-link" href="<?= site_url('user') ?>"><i class="fas fa-user-cog"></i> <span>Data Pegawai</span></a></li>
                    <?php endif;?>
            </ul>
            
        </aside>
      </div>
      <!-- END -->     
      
    <!-- Main Content -->

        <?= $contents ?>
        
    <!-- END CONTENT -->

  <!-- General JS Scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.3/dist/JsBarcode.all.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
<script src="<?=base_url()?>admin/assets/js/stisla.js"></script>

<!-- JS Libraies -->
<script src="<?=base_url()?>admin/node_modules/jquery-sparkline/jquery.sparkline.min.js"></script>
<script src="<?=base_url()?>admin/node_modules/chart.js/dist/Chart.min.js"></script>
<script src="<?=base_url()?>admin/node_modules/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>admin/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?=base_url()?>admin/node_modules/datatables.net-select-bs4/js/select.bootstrap4.min.js"></script>
<script src="<?=base_url()?>admin/node_modules/sweetalert/dist/sweetalert.min.js"></script>

<!-- Template JS File -->
<script src="<?=base_url()?>admin/assets/js/scripts.js"></script>
<script src="<?=base_url()?>admin/assets/js/custom.js"></script>
<script src="<?=base_url()?>admin/assets/js/myscript.js"></script>

<!-- Page Specific JS File -->
<script src="<?=base_url()?>admin/assets/js/page/modules-chartjs.js"></script>
<script>
$(document).ready(function(){
$('#mytable').DataTable();
})
</script>
</body>
</html>