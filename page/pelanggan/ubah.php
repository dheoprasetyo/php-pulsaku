<?php 
$id= $_GET['id'];
$sql = $conn->query("SELECT * FROM pelanggan WHERE id='$id'");
$tampil = $sql->fetch_assoc(); 
$kelamin = $tampil["kelamin"];
?>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               Ubah Data Pelanggan
                            </h2>
                        </div>

                           <div class="body">
                           <form method="POST">
                            

                            <label for="">Nama</label>
                            <div class="form-group">
                                 <div class="form-line">
                                     <input type="text" class="form-control" value="<?= $tampil['nama'] ?>" name="nama"/>
                                        </div>
                                    </div>

                            

                            


                            <label for="">Kelamin</label>
                            <div class="demo-radio-button">
                                <input name="kelamin" type="radio" id="radio_1" value="L" <?php echo($kelamin=='L')?"checked":""; ?> />
                                <label for="radio_1">Laki Laki</label>
                                <input name="kelamin" type="radio" id="radio_2" value="P" <?php echo ($kelamin=='P')?"checked":""; ?> />
                                <label for="radio_2">Perempuan</label>
                            </div>
                            

                            

                           

                            <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                                </form>

<?php 
if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $kelamin = $_POST['kelamin'];


    $sql = $conn->query("UPDATE pelanggan SET  nama = '$nama', kelamin = '$kelamin' WHERE id= '$id'");  

    if($sql){
        ?>
        <script type="text/javascript">alert('DAta Berhasil Diubah'); window.location.href="?page=pelanggan";</script>
        <?php 
        
    }

 } ?>
