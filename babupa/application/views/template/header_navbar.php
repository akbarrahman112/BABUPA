<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shorcut icon" href="<?php echo base_url().'assets/img/iicon.png'?>">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootshape.css">
</head>
<body>
<script type="text/javascript">
(function(){
  var bsa = document.createElement('script');
     bsa.type = 'text/javascript';
     bsa.async = true;
     bsa.src = '//s3.buysellads.com/ac/bsa.js';
  (document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(bsa);
})();
</script>
<div class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
      <a class="navbar-brand" href="">Banjaran Tourism Culture</a></div>
    <nav role="navigation" class="collapse navbar-collapse navbar-right">
      <ul class="navbar-nav nav">
      <li class="active"><a href="">Home</a></li>
      <li class="dropdown"><a data-toggle="dropdown" href="javascript:void(0)" class="dropdown-toggle">Menu <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li class="active"><a href="">Cara Booking</a></li>
            <li><a href="">Daftar Pesanan</a></li>
          </ul>
        </li>
        <li><a href="<?php echo base_url('utama/destinasiwisata');?>">Destinasi Wisata</a></li>
        <li><a href="<?php echo base_url('utama/budaya');?>">Budaya</a></li>
        <li><a href="<?php echo base_url('utama/profile');?>">Profile</a></li>
        <li><a href="<?php echo base_url('login');?>" class="nav-item nav-link">Login
        <i class="las la-sign-in-alt"></i></a></li>
      </ul>
    </nav>
  </div>
</div>

</body>
</html>