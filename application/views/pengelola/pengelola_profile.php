<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="shorcut icon" href="<?php echo base_url().'theme/images/icon.png'?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>BABUPA|  Halaman Profile Pengelola</title>

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
            <br><br>
                <div class="container">
                    <div class="card text-center" style="width:500px;  margin-left:auto; margin-right:auto">
                        <div class="card-header" style="background-color: #2c3338;">
                            <h2 class="text-center" style="color: white;">User Profile</h2>
                        </div>
                        <div class="card-body">
                        <br><br>
                        <img class="" src="<?=base_url('profile/'.$this->session->userdata('foto'))?>" width="200" height="200"/>
                        <br><br>
                            <h3 class="card-title"><?=$this->session->userdata('fullname')?></h3>
                            <h6><?=$this->session->userdata('email')?></h6>
                        <br>
                            <a href="<?=site_url('pengelola/changephoto')?>" class="btn btn-primary">Ubah Foto</a>
                        </div>
                    <br>
                <br><br>
            </div>
            <br><br><br>
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

        
            