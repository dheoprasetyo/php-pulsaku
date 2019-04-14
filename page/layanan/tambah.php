    
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

                            <label for="">Jenis</label>
                            <div class="form-group">
                                 <select class="form-control" name="tipe_id">
                                               <?php 
                                               $sql = $conn->query("SELECT * FROM tipe");
                                               while ($row=$sql->fetch_assoc()) {
                                                   # code...
                                              
                                               echo "<option value='$row[id].$row[Jenis]'>$row[Jenis]</option>"; 
                                                 }
                                               ?>
                                            </select>

                              <label for="">Harga</label>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-addon">Rp</span>
                                        <div class="form-line">
                                            <input name="harga" id="harga" type="text" class="form-control date">
                                        </div>
                                        <span class="input-group-addon">.00</span>
                                    </div>
                                </div>



                            <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                                </form>

<?php 
if (isset($_POST['simpan'])) {
$tipe_id = $_POST['tipe_id'];
    $harga=$_POST["harga"];

  $sql = $conn->query("INSERT INTO layanan VALUES('','$tipe_id','$harga')");

  if($sql){
    ?>
    <script type="text/javascript">alert('DAta Berhasil Disimpan'); window.location.href="?page=layanan";</script>
    <?php 
    
  }

 }
?>