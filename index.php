  <?php include('asset/head.php'); ?>
  <?php include('app/koneksi.php'); ?>
  <?php include('asset/navbar.php'); 
   
  $a = mysqli_query($koneksi, "select * from transaksi where idtransaksi = ''");
  $i = 1;
  
  if (isset($_POST['input'])) {
  
    if (tambahbrgklr($_POST) > 0) {
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
            document.location.href = 'index.php';
          </script>
      ";
    }
  }

  else if (isset($_POST['submit'])) {
  
    if (updatebrgklr($_POST) > 0) {
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
            document.location.href = 'index.php';
          </script>
      ";
    }
  }
  ?>
<div class="body">
  <div class="container container1">
    <div class=" container row blj g-3">
      <div class="col-12 col-sm-6">
        <form method="post" action="">
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" name="kodebarang" autocomplete='off' required placeholder="BRG01">
            <label for="floatingInput">Kode Barang</label>
          </div>
          <div class="form-floating mb-3">
            <input type="number" class="form-control" id="floatingInput" name="jumlah" required placeholder="1">
            <label for="floatingInput">Jumlah</label>
          </div>
            <button type="submit" name="input" class="btn btn-success">Input</button>
        </form>
      </div>
      <div class="col-12 col-sm-6">
        <div class="container" style="background-color: white;">
          <h1>INVOICE:</h1>
          <h2 style="color: black;"><?php kodetransaksi() ?></h2>
        </div>
      </div>
    </div>
    <div class="container">
                <form class=" table-responsive" method="post">
              <table class="table">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Kode Barang</th>
                <th scope="col">Nama Barang</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Harga</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $total = 0;  ?>
              <?php while( $row = mysqli_fetch_assoc($a)) :?>
                <?php $total += $row["harga"];  ?>
              <tr>
                <th scope="row"><?php echo $i ?></th>
                <td><input type="text" name="kodebarang[]" value="<?php echo $row ["kodebarang"]?>" readonly ></td>
                <td><input type="text" name="namabarang[]" value="<?php echo $row ["namabarang"]?>" readonly></td>
                <td><input type="text" name="jumlah[]" value="<?php echo $row ["jumlahbarang"]?>" readonly></td>
                <td><input type="text" name="harga[]" value="<?php echo $row ["harga"]?>" readonly></td>
                <td><button type="submit" name="edit" class="btn btn-primary"><a href="editbrgklr.php?id=<?= $row ["id"]; ?>" style="color: white; text-decoration: none;" > Edit</a></button> | 
                   <a href="hapusbrgklr.php?id=<?= $row ["id"]; ?>"><button type="button" class="btn btn-primary"><img  src="asset/img/sampah.png" style="width: 20px; height: 23px;"></button></a></td>
              </tr>      
              <?php $i++ ;?>
              <?php endwhile;?>
              <tr>
                <th colspan="5" style=" text-align: left; " >Total :</th>
                <td colspan="" style="text-align: right ;" ><?php echo $total ?></td>
              </tr>
            </tbody>
          </table>
          <input type="text" name="transaksi" hidden value="<?php  kodetransaksi() ?>">
          <button type="submit" name="submit" class="btn btn-success">Submit</button>
          </form>
    </div>
  </div>
</div>
   <?php include('asset/footer.php'); ?>