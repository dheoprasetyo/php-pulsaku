
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               Tambah Data
                            </h2>
                        </div>

                           <div class="body">
                           <form method="POST">

                            <label for="">Pelanggan</label>
                            <div class="form-group">
                                 <select class="form-control" name="pelanggan_id">
                                               <?php 
                                               $sql = $conn->query("SELECT * FROM pelanggan order by id");
                                               while ($row=$sql->fetch_assoc()) {
                                                   # code...
                                              
                                               echo "<option value='$row[id].$row[nama]'>$row[nama]</option>"; 
                                                 }
                                               ?>
                                            </select>


                            <label for="">layanan</label>
                            <div class="form-group">
                                 <select class="form-control" name="layanan_id">
                                               <?php 
                                               $sql = $conn->query("SELECT l.id, l.harga, t.Jenis from layanan l, tipe t where l.tipe_id = t.id");
                                              while ($row=$sql->fetch_assoc()) {
                                               echo "<option value='$row[id]'>$row[Jenis].$row[harga]</option>"; 
                                                 }
                                               ?>
                                            </select>
                             </div>

                            <!-- <label for="">Tanggal</label>
                            <div class="form-group">
                                 <div class="form-line">
                                     <input class="form-control" name="tanggal" type="text" id="tgl" value="
                                            <?php echo $tanggal; ?>" readonly />
                                        </div>
                                    </div> -->




                            <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                                </form>

<?php 

if (isset($_POST['simpan'])) {
  $tanggal = date("Y-m-d");
  $pelanggan_id = $_POST['pelanggan_id'];
  $layanan_id = $_POST['layanan_id'];
  // $tanggal = $_POST['tanggal'];
  $sql = $conn->query("INSERT INTO transaksi VALUES('','$pelanggan_id','$layanan_id','$tanggal','NGUTANG')");

  if($sql){
    ?>
    <script type="text/javascript">alert('DAta Berhasil Disimpan'); window.location.href="?page=transaksi";</script>
    <?php 
    
  }

 }
 ?>