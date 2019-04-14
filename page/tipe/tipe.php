<!-- With Material Design Colors -->
            <div class="row clearfix">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Data Jenis
                            </h2>
                            
                        </div>
                        <div class="body table-responsive">
                            <table class="table table-condensed">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Jenis</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                        <?php 
                                        $no = 1;
                                        $sql = $conn->query("SELECT * FROM tipe");
                                        while ($row=$sql->fetch_assoc()){
                                                
                                            
                                                ?>
                                        <tr>
                                            <td><?=$no++; ?></td>
                                            
                                            <td><?= $row["Jenis"]; ?></td>
                                            
                                           
                                            
                                            <td> <a href="?page=tipe&aksi=ubah&id=<?= $row["id"]; ?>" class="btn btn-info">Ubah</a> 
                                                 <a  onclick="return confirm('yakin ?')" href="?page=tipe&aksi=hapus&id=<?= $row['id'] ?>" class="btn btn-danger">Hapus</a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                       
                                    </tbody>
                            </table>
                            <a href="?page=tipe&aksi=tambah" class="btn btn-primary">Tambah Data</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# With Material Design Colors -->
