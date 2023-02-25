
    <section class="contact" style="margin-bottom:50px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="contact-title">
                        <h2>Riwayat Transaksi</h2>
                    </div>
                    <div class="form-group">
                        <?php if($this->session->flashdata('success')){ ?>  
                            <div class="alert alert-success alert-dismissible fade show">
                                <?php echo $this->session->flashdata('success'); ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>  
                            </div>  
                        <?php } else if($this->session->flashdata('error')){ ?>  
                            <div class="alert alert-danger alert-dismissible fade show">
                                <?php echo $this->session->flashdata('error'); ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>   
                            </div>
                        <?php } ?>
                    </div>   
                    <br>
                </div>
            </div>                                                                   
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" >
                            <thead class="thead-dark">                                         
                            <tr>
                                <th>No</th>
                                <th>Nama Pemesan</th>
                                <th>Nama Wisata</th>     
                                <th>Alamat Lengkap</th>                                                         
                                <th>Tanggal Transaksi</th>   
                                <th>No Telepon</th>
                                <th>Jumlah Tiket</th>
                                <th>Total Harga</th>
                                <th>Status Transaksi</th>  
                                <th>Bukti Pembayaran</th>  
                                <th>Tiket Wisata</th>
                                <th>Action</th>                                                                                       
                            </tr>
                        </thead>
                        <tbody> 
                            <?php 
                                $i = 1;
                                foreach($transaksi as $transaksis) { 
                            ?>
                            <tr>
                                <td><?=$i++.'.'?></td>
                                <td><?= $transaksis['fullname']; ?></td>
                                <td><?= $transaksis['nama_wisata']; ?></td>
                                <td><?= $transaksis['alamat_lengkap']; ?></td>
                                <td><?= $transaksis['tanggal_pemesanan']; ?></td>   
                                <td><?= $transaksis['no_tlp']; ?></td>  
                                <td><?= $transaksis['jumlah_tiket']; ?></td>   
                                <td><?= $transaksis['total_harga']; ?></td>                            
                                <td>
                                    <?php if($transaksis['status_transaksi'] == 'Belum Bayar'): ?>
                                        <span class="badge badge-danger"><?= $transaksis['status_transaksi']; ?></span>
                                    <?php elseif($transaksis['status_transaksi'] == 'Pending'): ?>
                                        <span class="badge badge-warning"><?= $transaksis['status_transaksi']; ?></span>
                                    <?php elseif($transaksis['status_transaksi'] == 'Sudah Bayar'): ?>
                                        <span class="badge badge-success"><?= $transaksis['status_transaksi']; ?></span>
                                    <?php endif ?>
                                </td>                                  
                                <td>
                                    <?php if($transaksis['status_transaksi'] == 'Belum Bayar'):?>                                        
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#bayar">
                                            Bayar
                                        </button>
                                        <div class="modal fade" id="bayar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Bayar</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="<?php echo base_url('pengguna/bayar/'.$transaksis['id_pemesanan']); ?>" method="post" enctype="multipart/form-data">
                                                            <div class="form-group">
                                                                <label for="">Bukti Transfer</label>
                                                                <input type="file" name="bukti_transfer" class="form-control">
                                                            </div>                                                    
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-success">Bayar</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>                                                    
                                    <?php elseif($transaksis['status_transaksi'] == 'Pending'):?>
                                        <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#lihat_buktitransfer_<?php echo $transaksis['id_pemesanan']?>">
                                            Lihat Bukti Transfer
                                        </button>
                                        <div class="modal fade" id="lihat_buktitransfer_<?php echo $transaksis['id_pemesanan']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Lihat Bukti Transfer</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <img src="<?= base_url('./assets/bukti_tf/'. $transaksis['bukti_transfer']); ?>" class="form-control" style="height:100%;">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>                                                                                                                
                                                    </div>
                                                </div>
                                            </div>
                                        </div>            
                                    <?php elseif($transaksis['status_transaksi'] == 'Sudah Bayar'):?>
                                        -
                                    <?php else:?>
                                    <?php endif ?>
                                </td>   
                                <td>
                                    <?php if($transaksis['status_transaksi'] == 'Belum Bayar'):?>  
                                        -
                                    <?php elseif($transaksis['status_transaksi'] == 'Pending'):?>
                                        -
                                    <?php elseif($transaksis['status_transaksi'] == 'Sudah Bayar'):?>
                                        <form action="<?php echo base_url('download/tiket_wisata/'.$transaksis['id_pemesanan'])?>" method="post">
                                            <button class="btn btn-sm btn-success">Download Tiket</button>
                                        </form>
                                    <?php else:?>
                                    <?php endif ?>
                                </td>
                                <td>
                                    <a href="<?= base_url('pengguna/delete/'.$transaksis['id_pemesanan']); ?>" class="btn btn-danger">Hapus</a>
                                </td>                          
                            </tr>      
                            <?php } ?>                                                                                                             
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>