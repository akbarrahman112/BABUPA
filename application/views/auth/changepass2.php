<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<title>BABUPA | Halaman verifikasi email</title>

	<link rel="shorcut icon" href="<?php echo base_url().'theme/images/icon.png'?>">
	<link href="<?=base_url('theme/css/login.css')?>" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="contact-title">
                    <h2>Verifikasi email</h2>
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
        <body class="align">
	
    <div class="grid">
      <form class="form login" action="" method="post">
          <div class="form__field">
              <label for="login__username"><svg class="icon">
                  <use xlink:href="#icon-user"></use>
              </svg><span class="hidden">kata sandi lama </span></label>
              <input autocomplete="username" id="login__username" type="text" name="username" class="form__input" placeholder="kata sandi lama" required>
          </div>
          <?php echo $this->session->flashdata('error'); ?>
          <?=validation_errors()?>
          <div class="form__field">
              <input type="submit" name="Changepassword" value="CHANGE PASSWORD">
          </div>
      </form>
</body>