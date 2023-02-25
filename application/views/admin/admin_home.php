<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="shorcut icon" href="<?php echo base_url().'theme/images/icon.png'?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>BABUPA|  Halaman Dasboard Admin</title>

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
                    <li class="nav-item active">
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
                    <li class="nav-item">
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
                    <a class="navbar-brand" href="#"> Dashboard Admin</a>
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
            <div class="content transition">    
                <div class="container-fluid dashboard">
                    <div class="card">
                        &nbsp      
                            <center><h1>Selamat datang  <?= $this->session->userdata('fullname'); ?></h1></center>
                        &nbsp      
            <div class="row">
                <div class="col-5">
                    <div class="card-body">   
                        <div class="text-center">
                        <div class="container-fluid dashboard">
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
<script type="text/javascript">
    $(document).ready(function() {
        demo.initDashboardPageCharts();
    });
</script>
