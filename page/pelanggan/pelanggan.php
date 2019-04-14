<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Data Anggota
                            </h2>
                            
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            
                                            <th>Nama</th>
                                            
                                            <th>Kelamin</th>
                                            
                                            <th>Aksi</th>
                                            
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php 
                                        $no = 1;
                                        $sql = $conn->query("SELECT * FROM pelanggan");
                                        while ($row=$sql->fetch_assoc()){
                                                $kelamin =($row["kelamin"]==L)?"Laki laki":"Perempuan";
                                                ?>
                                        <tr>
                                            <td><?=$no++; ?></td>
                                            
                                            <td><?= $row["nama"]; ?></td>
                                            
                                            <td><?= $kelamin; ?></td>
                                            
                                            <td> <a href="?page=pelanggan&aksi=ubah&id=<?= $row["id"]; ?>" class="btn btn-info">Ubah</a> 
                                                 <a  onclick="return confirm('yakin ?')" href="?page=pelanggan&aksi=hapus&id=<?= $row['id'] ?>" class="btn btn-danger">Hapus</a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                       
                                    </tbody>
                                </table>
                                <a href="?page=pelanggan&aksi=tambah" class="btn btn-primary">Tambah Data</a>
                                <!-- <a href="page/pelanggan/cetak.php" target="blank" class="btn btn-default">Cetak</a>
                                <a href="./laporan/laporan_pelanggan.php" target="blank" class="btn btn-success"></i>ExportToExcel</a> -->
