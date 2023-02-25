<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="shorcut icon" href="<?php echo base_url().'theme/images/icon.png'?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Halaman change foto pengelola</title>

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
                    <li class="nav-item active">
                        <a class="nav-link" href="<?=site_url('pengelola/profile')?>">
                            <i class="fas fa-male"></i>
                            <p>Profile</p>
                        </a>
                    </li>
                    <li class="nav-item">
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
                    <a class="navbar-brand" href="#"> Form Ubah Foto </a>
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
            <br><br><br>
<section class="clearfix about about-style2">
    <div class="container">
        <div class="card text-center" style="width:500px; margin-left:auto; margin-right:auto">
            <div class="card-header">
                <h2 class="text-center">Form Ubah Foto</h2>
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
            <div class="card-body">
            <form action="<?php echo base_url('pengelola/change_foto')?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Foto Saat Ini</label>
                        <img class="" src="<?=base_url('profile/'.$this->session->userdata('foto'))?>" width="200" height="200"/>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Foto Baru</label>
                        <input type="file" name="foto" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="upload" class="btn btn-info btn-fill" value="Ubah Foto">
                        <a href="<?=site_url('pengelola/profile')?>"><button type="button" class="btn btn-danger btn-fill">Kembali</button></a>
                    </div>
                    <br>
                    <br>
                </form>
            </div>
            <br>
            <br>
        </div>
    </div>
</section>
<br><br><br>
</div>
</div>