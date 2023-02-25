<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="shorcut icon" href="<?php echo base_url().'theme/images/icon.png'?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>BABUPA|  Halaman Daftar Pesanan</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />

    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <link rel="stylesheet" href="<?php echo base_url().'theme/css/font-awesome.min.css'?>">
    <link href="<?=base_url('assets/font-awesome/css/all.css')?>" rel="stylesheet">

    <!-- CSS Files -->
    <link href="<?php echo base_url().'/assets/admin/css/bootstrap.min.css'?>" rel="stylesheet" />
    <link href="<?php echo base_url().'/assets/admin/css/light-bootstrap-dashboard.css?v=2.0.0'?>" rel="stylesheet" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="<?php echo base_url().'/assets/admin/css/demo.css'?>" rel="stylesheet" />
</head>
<body>
    <div class="wrapper">
        <div class="sidebar" data-color="orange">
            <div class="sidebar-wrapper">
                <div class="logo">
                    <label class="simple-text">Banjaran Budaya Pariwisata</label>
                </div>
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="<?=site_url('pengelola/home')?>">
                            <i class="nc-icon nc-chart-pie-35"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=site_url('pengelola/profile')?>">
                            <i class="fas fa-male"></i>
                            <p>Profile</p>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="<?=site_url('pengelola/daftarpesanan')?>">
                            <i class="nc-icon nc-notes"></i>
                            <p>List Daftar Pesanan</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <nav class="navbar navbar-expand-lg " color-on-scroll="500">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#"> Dashboard Pengelola</a>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <ul class="nav navbar-nav mr-auto"></ul>
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo site_url('logout');?>">
                                    <span class="fas fa-sign-out-alt"></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav> 
                <?php echo form_close(); ?>   
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-plain table-plain-bg">                                                                  
                                    <div class="table table-stripped table-responsive" style="margin-top:15px;">    
                                        <div class="card-header ">
                                            <h4 class="card-title">Daftar Pesanan Tiket</h4>
                                        </div>                                            
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>                                   
                                <th>Nama Pemesan</th>                           
                                <th>Tanggal Transaksi</th>                                
                                <th>Alamat Lengkap</th>
                                <th>No Telpon</th>  
                                <th>Nama Wisata</th> 
                                <th>Jumlah Tiket</th>                             
                                <th>Status Transaksi</th>                                                                                                         
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <body>
                            &nbsp
                        <?php $no = 1; ?>    
                            <?php foreach($pesanan as $pesanans) : ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?= $pesanans['fullname']; ?></td>
                                <td><?= $pesanans['tanggal_pemesanan']; ?></td> 
                                <td><?= $pesanans['alamat_lengkap']; ?></td>   
                                <td><?= $pesanans['no_tlp']; ?></td>                            
                                <td><?= $pesanans['nama_wisata']; ?></td>    
                                <td><?= $pesanans['jumlah_tiket']; ?></td>                            
                                <td>
                                    <?php if($pesanans['status_transaksi'] == 'Belum Bayar'): ?>
                                        <span class="badge badge-danger"><?= $pesanans['status_transaksi']; ?></span>
                                    <?php elseif($pesanans['status_transaksi'] == 'Pending'): ?>
                                        <button type="button" class="btn btn-success mb-1" data-toggle="modal" data-target="#bayar_<?php echo $pesanans['id_pemesanan']?>">
                                            Terima
                                        </button>
                                        <div class="modal fade" id="bayar_<?php echo $pesanans['id_pemesanan']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Upload Tiket</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="<?php echo base_url('pengelola/daftarpesanan/terimabayar/'.$pesanans['id_pemesanan'])?>" method="post" enctype="multipart/form-data">
                                                            <div class="form-group">
                                                                <label for="">Tiket</label>
                                                                <input type="file" name="file_tiket" class="form-control">
                                                            </div>                                                  
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-success">Simpan</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>      
                                        <form action="<?php echo base_url('pengelola/daftarpesanan/tolakbayar/'.$pesanans['id_pemesanan'])?>" method="post">
                                            <button type="submit" class="btn btn-danger">Tolak</button>
                                        </form>                                                                                
                                    <?php elseif($pesanans['status_transaksi'] == 'Sudah Bayar'): ?>
                                        <span class="badge badge-success"><?= $pesanans['status_transaksi']; ?></span>
                                    <?php endif ?>
                                </td>                                     
                                <td>
                                        <?php if($pesanans['status_transaksi'] == 'Belum Bayar'): ?>
                                            -
                                        <?php elseif($pesanans['status_transaksi'] == 'Pending'): ?>
                                            <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#lihat_buktitransfer_<?php echo $pesanans['id_pemesanan']?>">
                                            Lihat Bukti Transfer
                                            </button>
                                            <div class="modal fade" id="lihat_buktitransfer_<?php echo $pesanans['id_pemesanan']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Lihat Bukti Transfer</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <img src="<?= base_url('./assets/bukti_tf/'. $pesanans['bukti_transfer']); ?>" class="form-control" style="height:100%;">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>                                                                                                                
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                      
                                        <?php elseif($pesanans['status_transaksi'] == 'Sudah Bayar'): ?>                                        
                                            <form action="<?php echo base_url('download/tiket_wisata/'.$pesanans['id_pemesanan'])?>" method="post">
                                                <button class="badge badge-dark">Download Tiket</button>
                                            </form>                                                 
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
</div>
