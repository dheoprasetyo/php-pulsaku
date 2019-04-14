<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Data Transaksi
                            </h2>
                            
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Pelanggan</th>
                                            <th>Tipe</th>
                                            <th>Harga</th>
                                            
                                            <th>Tanggal Beli</th>
                                
                                            <th>Status</th>
                                            <th>Aksi</th>
                                            
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php 
                                        $no = 1;
                                        $sql = $conn->query("SELECT t.id, p.nama, c.Jenis, t.tanggal, t.status, l.harga from pelanggan p, layanan l, transaksi t, tipe c where p.id= t.pelanggan_id and l.id = t.layanan_id and l.tipe_id = c.id  order by t.tanggal ");
                                        //SELECT p.nama, t.layanan_id, t.tanggal, t.status, l.harga from pelanggan p, layanan l, transaksi t where p.id= t.pelanggan_id and l.id = t.layanan_id and l.tipe_id = t.id

                                        //SELECT p.nama, c.Jenis, t.tanggal, t.status, l.harga from pelanggan p, layanan l, transaksi t, tipe c where p.id= t.pelanggan_id and l.id = t.layanan_id and l.tipe_id = t.id
                                        while($row = $sql->fetch_assoc()) {?>
                                        <tr>
                                            <td><?=$no++ ?></td>
                                            <td><?= $row["nama"]; ?></td>
                                            <td><?= $row["Jenis"]; ?></td>
                                            <td><?= "Rp ". $row["harga"]; ?></td>
                                            
                                            <td><?=date('d F Y', strtotime($row['tanggal']))?></td>
                                            
                                            <td><?= $row["status"]; ?></td>
                                            <td>
                                             <?php  if ($_SESSION['admin']) {
                                                if($row["status"]=="NGUTANG") {?>   
                                             <a href="?page=transaksi&aksi=lunas&id=<?= $row["id"]; ?>&nama=<?= $row["nama"] ?>" class="btn btn-info">Lunas</a> 
                                             <?php } 
                                                // echo "Alhamdulilah";
                                            }?>
                                                 <!-- <a href="?page=transaksi&aksi=perpanjang&id=<?= $row["id"]; ?>&pelanggan_id=<?= $row["pelanggan_id"] ?>$lambat=<?= $lambat ?>&tgl_kembali=<?= $row["tgl_kembali"]?>" class="btn btn-danger">Perpanjang</a> -->
                                            </td>
                                        </tr>
                                        <?php } ?>
                                       
                                    </tbody>
                                </table>
                                <a href="?page=transaksi&aksi=tambah" class="btn btn-primary">Tambah Data</a>
                                <a href="page/transaksi/cetak.php" target="blank" class="btn btn-default">Cetak</a>
