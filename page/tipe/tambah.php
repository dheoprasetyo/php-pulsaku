            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               Tambah Jenis
                            </h2>
                        </div>

                           <div class="body">
                           <form method="POST">

                            <!-- <label for="">NPM</label>
                            <div class="form-group">
                                 <div class="form-line">
                                     <input type="text" class="form-control" name="npm"/>
                                        </div>
                                    </div> -->

                           <label for="">jenis</label>
                            <div class="form-group">
                                 <div class="form-line">
                                     <input type="text" class="form-control" name="Jenis"/>
                                        </div>
                                    </div>

                            <!-- <label for="">Kelas</label>
                            <div class="form-group">
                                 <div class="form-line">
                                     <input type="text" class="form-control" name="kelas"/>
                                        </div>
                             </div> -->

                            <!-- <label for="">Tanggal Lahir</label>
                            <div class="form-group">
                                 <div class="form-line">
                                     <input type="date" class="form-control" name="tgl_lahir"/>
                                        </div>
                                    </div> -->


                            
                            <!-- <div class="form-group">
                                 <label class="checkbox-inline">
                                                <input type="checkbox" value="L" name="kelamin" /> Laki Laki
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" value="P"  name="kelamin" /> Perempuan
                                            </label>
                                            <br> -->

                            <!-- <label for="">Jurusan</label>
                            <div class="form-group">
                                 <div class="form-line">
                                     <input type="text" class="form-control" name="jurusan"/>
                                        </div>
                                    </div> -->

                           

                            <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                                </form>

<?php 
if (isset($_POST['simpan'])) {

 	$Jenis = $_POST['Jenis'];


 	$sql = $conn->query("INSERT INTO tipe VALUES('','$Jenis')");

 	if($sql){
 		?>
 		<script type="text/javascript">alert('DAta Berhasil Disimpan'); window.location.href="?page=tipe";</script>
 		<?php 
 		
 	}

 } ?>