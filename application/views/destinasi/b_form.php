<!-- Content -->
<div class="content transition">
    <div class="container-fluid dashboard">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb" style="background:white;">
                <li class="breadcrumb-item"><a href="<?php echo base_url('pembeli/home');?>">Dashboard</a></li>                    
                 <li class="breadcrumb-item active" aria-current="page">Riwayat Transaksi</li>
            </ol>
        </nav>
        <div class="card">
            <div class="card-body">
                <?php echo form_open('admin/data-pembeli'); ?>
                    <div class="input-group mb-3">
                    </div>                  
                <?php echo form_close(); ?>                                                                     
                <div class="table table-stripped table-responsive" style="margin-top:15px;">                                                
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pesanan</th>                                   
                                <th>Nama Pemesan</th>
                                <th>Kuantitas</th>                             
                                <th>Tanggal Transaksi</th>                                
                                <th>Harga Satuan</th>
                                <th>Pajak</th>
                                <th>Total Harga</th>                                
                                <th>Status Transaksi</th>  
                                <th>Status Pesanan</th> 
                                <th>Action</th>                                                                                         
                            </tr>
                        </thead>
                        <tbody> 
                         <center><h1>RIWAYAT TRANSAKSI</h1></center>
                         &nbsp   
                        <?php $no = 1; ?>      
                            <?php foreach($transaksi as $transaksis) : ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?= $transaksis['nama_menu']; ?></td>
                                <td><?= $transaksis['nama_lengkap']; ?></td>
                                <td><?= $transaksis['kuantitas']; ?></td>
                                <td><?= $transaksis['tanggal_pemesanan']; ?></td>                                
                                <td><?= $transaksis['harga']; ?></td>  
                                <td>
                                    <?php 
                                        $pajak = ($transaksis['harga'] * (20/100)) * $transaksis['kuantitas'];
                                        echo $pajak;
                                     ?>
                                </td> 
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
                                    <?php if($transaksis['status_pemesanan'] == 'Belum Diantar'): ?>
                                        <span class="badge badge-warning"><?= $transaksis['status_pemesanan']; ?></span>
                                    <?php elseif($transaksis['status_pemesanan'] == 'Sudah Diantar'): ?>
                                        <span class="badge badge-success"><?= $transaksis['status_pemesanan']; ?></span>
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
                                                        <form action="<?php echo base_url('pembeli/bayar/'.$transaksis['id_pemesanan']); ?>" method="post" enctype="multipart/form-data">
                                                            <div class="form-group">
                                                                <label for="">Total Bayar</label>
                                                                <input type="text" name="total_harga" class="form-control" value="<?= $transaksis['total_harga']; ?>" readonly>
                                                            </div>
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
                                        <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#lihat_buktitransfer_<?php $transaksis['id_pemesanan']?>">
                                            Lihat Bukti Transfer
                                        </button>
                                        <div class="modal fade" id="lihat_buktitransfer_<?php $transaksis['id_pemesanan']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Lihat Bukti Transfer</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <img src="<?= base_url('./assets/bukti_tf/'. $transaksis['bukti_transfer']); ?>" class="form-control">
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
                            </tr>      
                            <?php endforeach ?>                                                                                                               
                        </tbody>
                    </table>
                </div>
            </div>
        </div>                
    </div>
</div>        