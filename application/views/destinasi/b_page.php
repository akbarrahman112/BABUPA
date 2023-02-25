<section>
    <div class="slider_img">
        <div id="carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                        <img class="d-block" src="<?php echo base_url().'theme/images/simpaykimfa.jpg'?>" width="150px;">
                            <div class="carousel-caption d-md-block">
                                <div class="slider_title">
                                <p class="breadcrumbs"><span class="mr-2"><a href="<?php echo base_url('');?>">Beranda <i class="fa fa-chevron-right"></i></a></span> <span>Blog <i class="fa fa-chevron-right"></i></span></p>
                                <h1 class="mb-0 bread">Destinasi Wisata</h1>
                                </div>
                            </div>
                </div>
            </div>
        </div>
    </div>
</section>
<br>
<br>
<section class="ftco-section">
<div class="container-fluid">
        <div class="row justify-content-center pb-4">
            <div class="col-md-12 heading-section text-center heading-section-white ftco-animate">
                <span class="subheading">Destinasi Wisata Kecamatan Banjaran</span>
                <h2 class="mb-4">Pilih Destinasi Anda</h2>
            </div>
        </div>
    </div>
    <div class="container" style ="margin-top:20px">
        <div class="row">
        <?php foreach($menu as $menus) : ?>                                         
          <div class="col-lg-4">
            <div class="card">
              <div class="card-body">
              <br>
              <h5 style="text-align: center; color: orangered;"><?= $menus['nama_wisata'];?></h5>
              <br>
                <img class="image" src="<?php echo base_url('assets/foto/'.$menus['gambar']);?>" alt="" style="width:100%;height:230px;" >
                <br>
                <hr>
                <a href="<?php echo base_url('menu/'.$menus['id_wisata']);?>" class="btn btn-primary btn-block">Selengkapnya</a>
              </div>
            </div>
            <br>
          </div>                    
        <?php endforeach ?>  
		</div>
	</div>
</section>
    <br>
    <br>
    <div class="row">
            <div class="col-md-12 text-center ftco-animate">
                <p><a href="<?php echo site_url('pengguna/pemesanan');?>" class="btn btn-primary py-3 px-4">Reservasi</a></p>
            </div>
        </div>
    </div>
