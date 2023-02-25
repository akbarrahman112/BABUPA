<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="shorcut icon" href="<?php echo base_url().'theme/images/icon.png'?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>BABUPA| Halaman List Pengelola</title>

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
                    <li class="nav-item active">
                        <a class="nav-link" href="<?=site_url('admin/pengelola')?>">
                            <i class="fas fa-male"></i>
                            <p>List Akun Pengelola</p>
                        </a>
                    </li>
                    <li  class="nav-item">
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
                    <a class="navbar-brand" href="#"> List Akun Pengelola </a>
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
                                    <h4 class="card-title">Form Tambah Pengelola</h4>
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
                                    <a href="<?=site_url('admin/pengelola')?>" class="btn btn-danger btn-fill btn-md">Kembali</a>
                                    <br><br>
                                    <form class="form login" action="<?php echo base_url('register-pengelola'); ?>" method="post">
                                        <div class="form-group">
                                            <label for="">Username</label>
                                            <input autocomplete="off" type="text" name="username" class="form-control" placeholder="Enter Username" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input autocomplete="off" type="text" name="email" class="form-control" placeholder="Enter Email" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Full Name</label>
                                            <input autocomplete="off" type="text" name="fullname" class="form-control" placeholder="Enter Full Name" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Password</label>
                                            <input id="login__password" type="password" name="password" class="form-control" placeholder="Enter Password" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Password Confirmation</label>
                                            <input id="login__password" type="password" name="password_confirmation" class="form-control" placeholder="Enter Password Confirmation" required>
                                        </div>
                                        <input autocomplete="off" hidden type="text" name="usertype" class="form-control" value="Pengelola">
                                        <?php echo $this->session->flashdata('error'); ?>
                                        <?=validation_errors()?>
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-block btn-success" name="login" value="Register">
                                        </div>
                                    </form>
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
