<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="shorcut icon" href="<?php echo base_url().'theme/images/icon.png'?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>BABUPA| Edit List Wisata</title>

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
                    <li>
                        <a class="nav-link" href="<?=site_url('admin/home')?>">
                            <i class="nc-icon nc-chart-pie-35"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=site_url('admin/user')?>">
                            <i class="fas fa-male"></i>
                            <p>List Akun User</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=site_url('admin/pengelola')?>">
                            <i class="fas fa-male"></i>
                            <p>List Akun Pengelola</p>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="<?=site_url('admin/destinasi')?>">
                            <i class="nc-icon nc-notes"></i>
                            <p>List Destinasi Wisata</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="<?=site_url('admin/galeri')?>">
                            <i class="nc-icon nc-notes"></i>
                            <p>List Galeri Budaya</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="<?=site_url('admin/reviewulasan')?>">
                            <i class="nc-icon nc-notes"></i>
                            <p>List Review & Saran</p>
                        </a>
                    </li> 
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <nav class="navbar navbar-expand-lg " color-on-scroll="500">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">Form Edit Destinasi</a>
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
<section class="contact">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="contact-title">
                    <h2>Form edit Destinasi</h2>
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
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">     
            <?php echo form_open_multipart('admin/edit/'.$data['id_wisata']); ?>                      
                    <div class="form-group">
                        <label for="">Nama Wisata</label>
                        <input type="text" class="form-control" name = "id_wisata" value="<?= $data['id_wisata']; ?>" aria-label="Recipient's username" aria-describedby="basic-addon2" readonly hidden>
                        <input type="type" class="form-control" name ="nama_wisata" value="<?= $data['nama_wisata']; ?>"  aria-label="Recipient's username" aria-describedby="basic-addon2">                         
                    </div>  
                    <div class="form-group">
                        <label for="">Nama Pengelola</label><br>
                        <select name="id_pengelola" class="form-control">
                            <?php foreach($pengelola as $pengelolas) : ?>                  
                            <option <?php if($pengelolas['id_user'] == $data['id_pengelola']){ echo 'selected="selected"'; } ?> value="<?php echo $pengelolas['id_user']; ?>"><?php echo $pengelolas['fullname']; ?> </option>   
                              
                            <?php endforeach ?> 
                        </select>                        
                    </div>                                                                                                      
                    <div class="form-group">
                        <label for="">Deskripsi</label>
                        <textarea type="type" class="form-control" name ="deskripsi" style=" min-width:500px; max-width:100%;min-height:110px;height:100%;width:100%;"  aria-describedby="basic-addon2"><?= $data['deskripsi']; ?></textarea>                      
                    </div>  
                    <div class="form-group">
                        <label for="">Fasilitas</label>
                        <textarea type="type" class="form-control" name ="fasilitas" style=" min-width:500px; max-width:100%;min-height:110px;height:100%;width:100%;"  aria-describedby="basic-addon2"><?= $data['fasilitas']; ?></textarea>                       
                    </div>                                    
                    <div class="form-group">
                        <label for="">Deskripsi Lainya</label>
                        <textarea type="text" class="form-control" name ="deskripsi_lainnya" aria-describedby="basic-addon2"><?= $data['deskripsi_lainnya']; ?></textarea>                  
                    </div>   
                    <div class="form-group">
                        <label for="">Harga Tiket</label>
                        <input type="number" min=0 class="form-control" name ="harga_tiket" aria-describedby="basic-addon2" value="<?= $data['harga_tiket']; ?>">             
                    </div>     
                    <div class="form-group">
                        <label for="">Gambar</label>
                        <input type="file" name="gambar" class="form-control" value="" aria-describedby="basic-addon2">
                        <input type="text" name="gambar" value="<?= $data['gambar']; ?>" hidden>                       
                    </div>                           
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-block">Ubah Destinasi</button>
                    </div>  
                <?= form_close(); ?>
            </div>
        </div>                
    </div>
</div>
</section>