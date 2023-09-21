  <?php include('asset/head.php') ?>
  <?php include('app/koneksi.php'); ?>
  <?php include('asset/navbar.php'); 


if(isset($_GET['cari'])){
    $cari = $_GET['cari'];
    $a = mysqli_query($koneksi, "select * from barang where kodebarang like '%".$cari."%'");       
  }
  else {
    $a = mysqli_query($koneksi, "select * from barang");   
  }

if (isset($_POST['tambah'])) {
  
    if (tambahbrg($_POST) > 0) {
      echo "
          <script>
            alert('Data Berhasil Ditambahkan!');
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
  $i = 1;
  ?>
  <div class="col">
    <form class="d-flex col-md-4" role="search" method="get">
      <input class="form-control me-2" type="text" placeholder="Masukkan Kode Barang" aria-label="Search" name="cari">
      <button class="btn btn-success" type="submit">Search</button>
    </form>
  </div>

<div class="row container2">
  <div class="col-12 col-sm-4">
        <form method="post" action="">
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" name="kodebarang" autocomplete='off' required readonly value="<?php kodebarang();  ?>">
            <label for="floatingInput">Kode Barang</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" name="namabarang" autocomplete='off' required placeholder="1">
            <label for="floatingInput">Nama Barang</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" name="hargabarang" autocomplete='off' required placeholder="1">
            <label for="floatingInput">Harga</label>
          </div>
          <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
        </form>
  </div>
<div class="col-12 col-sm-8">
    <form class="table-responsive">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Kode Barang</th>
            <th scope="col">Nama Barang</th>
            <th scope="col">Stok</th>
            <th scope="col">Harga</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php while( $row = mysqli_fetch_assoc($a)) :?>
          <tr>
            <th scope="row"><?php echo $i ?></th>
            <td><?php echo $row ["kodebarang"]?></td>
            <td><?php echo $row ["namabarang"]?></td>
            <td><?php echo $row ["jumlahbarang"]?></td>
            <td><?php echo $row ["hargabarang"]?></td>
            <td><a href="editbarang.php?kodebarang=<?php echo $row["kodebarang"];  ?>"><button type="button" class="btn btn-primary">edit</button></a> | <a href="hapusbarang.php?kodebarang=<?php echo $row["kodebarang"]; ?>"><button type="button" class="btn btn-primary"><img  src="asset/img/sampah.png" style="width: 20px; height: 23px;"></button></a></td>
          </tr>
          
          <?php $i++ ;?>
          <?php endwhile;?>
        </tbody>
      </table>
  </form>
</div>
</div>

        






  <?php include('asset/footer.php'); ?>