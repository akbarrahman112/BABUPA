<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="shorcut icon" href="<?php echo base_url().'theme/images/icon.png'?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>BABUPA| Halaman List Galeri Wisata</title>

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
                    <li>
                        <a class="nav-link" href="<?=site_url('admin/destinasi')?>">
                            <i class="nc-icon nc-notes"></i>
                            <p>List Destinasi Wisata</p>
                        </a>
                    </li>
                    <li class="nav-item active">
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
                    <a class="navbar-brand" href="#"> List Galeri Budaya </a>
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
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-plain table-plain-bg">
                                <div class="card-header ">
                                    <h4 class="card-title">Tabel List Galeri</h4>
                                </div>
                                <div class="card-body table-full-width table-responsive">
                                    <div class="form-group" style="margin-left:15px; text-align: left;">
                                        <?php if($this->session->flashdata('success')){ ?>  
                                            <div class="alert alert-success alert-dismissible fade show">
                                                <?php echo $this->session->flashdata('success'); ?>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="color: black;">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>  
                                            </div>  
                                        <?php } else if($this->session->flashdata('error')){ ?>  
                                            <div class="alert alert-danger alert-dismissible fade show">
                                                <?php echo $this->session->flashdata('error'); ?>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="color: black;">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>   
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <div class="card-title" style="margin-left:15px; text-align: left;">
                                        <a href="<?=site_url('admin/gtambah')?>"><button type="button" class="btn btn-success btn-fill btn-md"><span class="fas fa-user-plus">Tambah Galeri</span></button></a>
                                    </div>
                                    <br>
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Deskripsi</th>
                                                <th>Gambar</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $i = 1;
                                                foreach($data as $datas) { 
                                            ?>
                                            <tr>
                                                <td><?=$i++.'.'?></td>
                                                <td><?= $datas['deskripsi']; ?></td> 
                                                <td><?= $datas['gambar']; ?></td>  
                                                <td>  
                                                    <a href="<?= base_url('admin/gedit/'.$datas['id_galeri']); ?>" class="btn btn-warning">Edit</a>                                                                                                                                              
                                                    <a href="<?= base_url('admin/gdelete/'.$datas['id_galeri']); ?>" class="btn btn-danger">Hapus</a>
                                                </td>
                                            </tr>
                                            <?php } ?>   
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

<!--   Core JS Files   -->
<script src="<?php echo base_url().'/assets/admin/js/core/jquery.3.2.1.min.js'?>" type="text/javascript"></script>
<script src="<?php echo base_url().'/assets/admin/js/core/popper.min.js'?>" type="text/javascript"></script>
<script src="<?php echo base_url().'/assets/admin/js/core/bootstrap.min.js'?>" type="text/javascript"></script>

<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="<?php echo base_url().'/assets/admin/js/plugins/bootstrap-switch.js'?>"></script>

<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

<!--  Chartist Plugin  -->
<script src="<?php echo base_url().'/assets/admin/js/plugins/chartist.min.js'?>"></script>

<!--  Notifications Plugin    -->
<script src="<?php echo base_url().'/assets/admin/js/plugins/bootstrap-notify.js'?>"></script>

<!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
<script src="<?php echo base_url().'/assets/admin/js/light-bootstrap-dashboard.js?v=2.0.0'?>" type="text/javascript"></script>

<!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
<script src="<?php echo base_url().'/assets/admin/js/demo.js'?>"></script>
