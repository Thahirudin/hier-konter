  <?php include('asset/head.php') ?>
  <?php include('app/koneksi.php'); ?>
  <?php include('asset/navbar.php'); 

if(isset($_GET['tanggalawal']) AND isset($_GET['tanggalakhir'])){
    $tanggalawal = $_GET['tanggalawal'];
    $tanggalakhir = $_GET['tanggalakhir'];
    $a = mysqli_query($koneksi, "select * from transaksi where (tanggal BETWEEN '$tanggalawal' AND '$tanggalakhir') ");       
  }
  else {
    $a = mysqli_query($koneksi, "select * from transaksi where idtransaksi != ''");   
  }
  $i = 1;
  $total =0;
  ?>

<div>
  <div class="col-12 col-sm-4">
        <form method="get" action="" role="search">
          <h1>Tampil Riwayat</h1>
          <div class="form-floating mb-3">
            <input type="date" class="form-control" id="floatingInput" name="tanggalawal" required >
            <label for="floatingInput">Tanggal Awal</label>
          </div>
          <div class="form-floating mb-3">
            <input type="date" class="form-control" id="floatingInput" name="tanggalakhir" required placeholder="1">
            <label for="floatingInput">Tanggal Akhir</label>
          </div>
          <button type="submit" class="btn btn-primary">Search</button>
        </form>
  </div>
</div>
<div class="">
    <form class="barangmasuk table-responsive">
    <table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">ID transaksi</th>
      <th scope="col">Tanggal</th>
      <th scope="col">Kode barang</th>
      <th scope="col">nama barang</th>
      <th scope="col">jumlah barang</th>
      <th scope="col">Harga</th>
    </tr>
  </thead>
  <tbody>
    <?php while( $row = mysqli_fetch_assoc($a)) :?>
      <?php $total += $row["harga"];  ?>

    <tr>
      <th scope="row"><?php echo $i ?></th>
      <td><?php echo $row ["idtransaksi"]?></td>
      <td><?php echo $row ["tanggal"]?></td>
      <td><?php echo $row ["kodebarang"]?></td>
      <td><?php echo $row ["namabarang"]?></td>
      <td><?php echo $row ["jumlahbarang"]?></td>
      <td><?php echo $row ["harga"]?></td>
    </tr>
    
    <?php $i++ ;?>
    <?php endwhile;?>
    <tr>
      <th colspan="6" style=" text-align: left; " >Total :</th>
      <td colspan="" style="text-align: right ;" ><?php echo $total ?></td>
     </tr>
  </tbody>
</table>
</form>
</div>




  <?php include('asset/footer.php'); ?>