<section>
<div class="slider_img">
        <div id="carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                        <img class="d-block" src="<?php echo base_url().'theme/images/budaya4.jpg'?>" width="150px;">
                            <div class="carousel-caption d-md-block">
                            <div class="slider_title">
                        <p class="breadcrumbs"><span class="mr-2"><a href="<?php echo base_url('');?>">Beranda <i class="fa fa-chevron-right"></i></a></span> <span>Galeri <i class="fa fa-chevron-right"></i></span></p>
                        <h1>Galeri</h1>
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
                <h2 class="mb-4">Galeri Budaya Kecamatan Banjaran</h2>
            </div>
        </div>
    </div>
    <div class="container" style ="margin-top:20px">
    <div class="row">
        <?php foreach($menu as $menus) : ?> 
        <div class="col-md-4">
            <div class="card">
              <div class="card-body">                                        
                <img class="img-fluid" src="<?php echo base_url('assets/image/'.$menus['gambar']);?>" alt="" style="width:100%;height:230px;">
              </div>
            </div>
            <br>
          </div>                    
        <?php endforeach ?>  
		</div>
	</div>
</section>