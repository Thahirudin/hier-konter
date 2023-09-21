<?php include('asset/head.php') ?>
  <?php include('app/koneksi.php'); ?>
  <?php include('asset/navbar.php'); 
  $kodebarang   = $_GET['kodebarang'];
  $a = mysqli_query($koneksi, "select * from barang where kodebarang = '$kodebarang'");
  $row = mysqli_fetch_assoc($a);
  if (isset($_POST['ubah'])) {
  
    if (editbrg($_POST) > 0) {
      echo "
          <script>
            alert('Data Berhasil Diubah!');
            document.location.href = 'barang.php';
          </script>
      ";
    }
    else {
      echo "
          <script>
            alert('Data Gagal Ditambahkan!');
            document.location.href = 'barang.php';
          </script>
      ";
    }
  }
  ?>

<div class="col-12 col-sm-4">
        <form method="post" action="">
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" maxlength="9" name="kodebarang" required value="<?php echo $row["kodebarang"];  ?>" >
            <label for="floatingInput">Kode Barang</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" name="kodebarangasli" required hidden value="<?php echo $row["kodebarang"];  ?>" >
            <label for="floatingInput">Kode Barang</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" name="namabarang" required value="<?php echo $row["namabarang"];  ?>">
            <label for="floatingInput">Nama Barang</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" name="jumlahbarang" required value="<?php echo $row["jumlahbarang"];  ?>" >
            <label for="floatingInput">Stok</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" name="hargabarang" re required value="<?php echo $row["hargabarang"];  ?>" >
            <label for="floatingInput">Harga</label>
          </div>
          <button type="submit" name="ubah" class="btn btn-primary">Ubah</button>
        </form>
  </div>

  <?php include('asset/footer.php'); ?>