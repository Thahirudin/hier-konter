  <?php include('asset/head.php'); ?>
  <?php include('app/koneksi.php'); ?>
  <?php include('asset/navbar.php');
    $id = $_GET["id"];
   $a = mysqli_query($koneksi, "select * from transaksi where id = '$id'");
   $row = mysqli_fetch_assoc($a);
   if (isset($_POST['input'])) {
  
    if (editbrgklr($_POST) > 0) {
      echo "
          <script>
            alert('Data Berhasil Ditambahkan!');
            document.location.href = 'index.php';
          </script>
      ";
    }
    else {
      echo "
          <script>
            alert('Data Gagal Ditambahkan!');
            document.location.href = 'editbrgklr.php';
          </script>
      ";
    }
  }
    ?>
  <div class="container">
  	<form method="post" action="">
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" name="kodebarang" required value="<?php echo $row ["namabarang"]?>" readonly>
            <label for="floatingInput">Nama Barang</label>
          </div>
          <div class="form-floating mb-3">
            <input type="number" class="form-control" id="floatingInput" name="jumlah" required value="<?php echo $row ["jumlahbarang"]?>">
            <label for="floatingInput">Jumlah</label>
          </div>
          <div class="form-floating mb-3">
            <input type="number" class="form-control" id="floatingInput" name="id" required hidden value="<?php echo $row ["id"]?>">
            <label for="floatingInput" hidden>ID</label>
          </div>
          <div class="form-floating mb-3">
            <input type="number" class="form-control" id="floatingInput" name="kodebarang" required value="<?php echo $row ["kodebarang"]?>" hidden>
            <label for="floatingInput" hidden>kodebarang</label>
          </div>
            <button type="submit" name="input" class="btn btn-success">Input</button>
          
        </form>
  </div>