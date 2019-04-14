<div class="row clearfix">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Data Layanan
                            </h2>
                            
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tipe</th>
                                            <th>Harga</th>
                                           
                                            <th>Aksi</th>
                                            
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php 
                                        $no = 1;
                                        $sql = $conn->query("SELECT l.harga, t.Jenis from layanan l, tipe t where l.tipe_id = t.id ");
                                        while ($row=$sql->fetch_assoc()){
                                               
                                                ?>
                                        <tr>
                                            <td><?=$no++; ?></td>
                                            <td><?= $row["Jenis"]; ?></td>
                                            <td><?= $row["harga"]; ?></td>
                                            
                                            <td> <!-- <a href="?page=layanan&aksi=ubah&id=<?= $row["id"]; ?>" class="btn btn-info">Ubah</a>  -->
                                                 <a  onclick="return confirm('yakin ?')" href="?page=layanan&aksi=hapus&id=<?= $row['id'] ?>" class="btn btn-danger">Hapus</a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                       
                                    </tbody>
                                </table>
                                <a href="?page=layanan&aksi=tambah" class="btn btn-primary">Tambah Data</a>
                                <!-- <a href="page/layanan/cetak.php" target="blank" class="btn btn-default">Cetak</a> -->
                               <!--  <a href="./laporan/laporan_layanan.php" target="blank" class="btn btn-success"></i>ExportToExcel</a> -->
