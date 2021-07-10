<script src="<?=base_url()?>admin/node_modules/sweetalert/dist/sweetalert.min.js"></script>
<?php if($this->session->has_userdata('success')): ?>
<script>swal({
  title: "Sukses!",
  text: "Data berhasil disimpan!",
  icon: "success",
  button: "Oke!",
});</script>
<?php $this->session->unset_userdata('success'); ?>
<?php endif; ?>

<?php if($this->session->has_userdata('delete')): ?>
<script>swal({
  title: "Sukses!",
  text: "Data telah terhapus!",
  icon: "success",
  button: "Oke!",
});</script>
<?php endif; ?>

<?php if($this->session->has_userdata('loginerror')): ?>
  <script>swal({
  title: "Oops!",
  text: "Username atau Password Tidak Ditemukan!",
  icon: "error",
  button: "Oke!",
});</script>
<?php endif; ?>

<?php if($this->session->has_userdata('error')): ?>
  <script>swal({
  title: "Oops!",
  text: "Barcode Sudah dipakai",
  icon: "error",
  button: "Oke!",
});</script>
<?php endif; ?>

<?php if($this->session->has_userdata('dberror')): ?>
  <script>swal({
  title: "Tidak Dapat Dihapus!",
  text: "Data Masih dipakai di tabel lain",
  icon: "error",
  button: "Oke!",
});</script>
<?php endif; ?>

<?php if($this->session->has_userdata('stkeror')): ?>
  <script>swal({
  title: "Oops!",
  text: "Stoknya Kurang",
  icon: "warning",
  button: "Oke!",
});</script>
<?php endif; ?>

<?php if($this->session->has_userdata('print')){
  echo'
  <script>
swal("Sukses!","Data berhasil Disimpan","success", {
  buttons: {
    cancel: "Oke",
    print: true,
  },
})
.then((value) => {
  switch (value) {
 
    case "print":
      window.location="'.site_url("sales/invoice").'";
      break;
  }
})
  </script>';
} ?>