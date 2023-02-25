<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <style>
        .d-block {
            filter: blur(2px);
            -webkit-filter: blur(2px);
        }

        .thead-dark {
            background-color: #2c3338;
            color: white;
        }

        h1, h4 {
            text-shadow: 2px -2px 5px white;
        }
    </style>

    <title><?=$judul ?></title>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url().'theme/css/bootstrap.min.css'?>">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url().'theme/css/font-awesome.min.css'?>">
    <link href="<?=base_url('assets/font-awesome/css/all.css')?>" rel="stylesheet">
    <!-- Simple Line Font -->
    <link rel="stylesheet" href="<?php echo base_url().'theme/css/simple-line-icons.css'?>">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="<?php echo base_url().'theme/css/owl.carousel.min.css'?>">
    <!-- Main CSS -->
    <link href="<?php echo base_url().'theme/css/style.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'theme/css/review.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'theme/css/dataTables.bootstrap4.min.css'?>" rel="stylesheet">

    <link rel="shorcut icon" href="<?php echo base_url().'theme/images/icon.png'?>">
</head>
<body>
    <div data-toggle="affix" style="border-bottom:solid 1px #f2f2f2;">
        <div class="container nav-menu2">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar2 navbar-toggleable-md navbar-dark shadow-3-strong">
                        <button class="navbar-toggler navbar-toggler2 navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown">
                            <span class="icon-menu"></span>
                        </button>
                        <a href="<?php echo site_url('');?>" class="navbar-brand nav-brand2"><img class="img img-responsive" width="150px;" src="<?php echo base_url().'theme/images/logo.png'?>"></a>
                        <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url('');?>">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo site_url('destinasi');?>">Destinasi Wisata</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo site_url('galeri');?>">Galeri</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo site_url('about')?>">Tentang Kami</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo site_url('kontak')?>">Kontak Kami</a>
                                </li>
                                <li class="nav-item dropdown">                           
                                    <?php  if (!$this->session->userdata('username') && !$this->session->userdata('usertype')):?>
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Login</a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <li><a class='dropdown-item' href="<?php echo base_url('login')?>">Masuk</a></li>
                                        <li><a class='dropdown-item' href="<?php echo site_url('register')?>">Daftar</a></li>
                                    </ul> 
                                    <?php else: ?>
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?php echo $this->session->userdata('username'); ?></a>
                                        <?php if($this->session->userdata('usertype') == "Pengguna"):?>   
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <a href="<?php echo base_url('pengguna/riwayatTransaksi');?>" class="nav-item nav-link">Data Transaksi</a> 
                                            <a href="<?php echo base_url('kontak/reviewulasan');?>" class="nav-item nav-link">Review & Ulasan</a> 
                                            <a href="<?php echo base_url('auth/profile');?>" class="nav-item nav-link">Profile</a>            
                                            <a href="<?php echo base_url('logout');?>" class="nav-item nav-link">Logout</a> 
                                        </ul>                
                                        <?php endif ?> 
                                    <?php endif; ?>   
                                </li>                               
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>