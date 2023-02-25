<section>
    <div class="slider_img layout_two">
        <div id="carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block" src="<?php echo base_url().'theme/images/default1.jpg'?>">
                    <div class="carousel-caption d-md-block">
                        <div class="slider_title">
                            <p>Selamat Datang di Website Kecamatan Banjaran</p>
                            <h1 class="mb-4">Rasakan Keindahan Tanah Sunda</h1>
                            <p class="caps">Benteng Budaya Jawa Barat, dari desa untuk dunia</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<br>
<br>
<section class="clearfix">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img src="<?php echo base_url().'theme/images/gambar.png'?>" class="img-rounded" alt="Cinque Terre" width="290" height="190">
            </div>
            <div class="col-md-8">
                <div class="slider_title1">
                <h2></h2>
                <p style="text-align: justify;">
                Babupa merupakan website yang direncanakan dapat membantu masyarakat dalam mencari tempat destinasi wisata dan budaya khususnya di daerah Banjaran, Kabupaten Bandung.</p>
                <p>Didalam website tersebut pengguna dapat melihat deskripsi harga, jarak lokasi ke berbagai tempat yang ada di daerah banjaran dan sekitarnya serta dapat melakukan reservasi via Whatsaap/email admin pemilik tempat wisata. </p>
                </div>
            </div>
        </div>
    </div>
</section>
<br>
<br>
<br>
<section class="ftco-section img ftco-select-destination" style="background: linear-gradient(90deg, rgba(241,93,48,1) 0%, rgba(249,146,62,1) 100%);">
    <br>
    <div class="container-fluid">
        <div class="row justify-content-center pb-4">
            <div class="col-md-12 heading-section text-center heading-section-white ftco-animate">
                <span class="subheading">Destinasi Wisata Banjaran</span>
                <h2 class="mb-4">Pilih Destinasi Anda</h2>
            </div>
        </div>
    </div>
    <div class="container container-2">
        <div class="row">
            <div class="col-sm-4">
                <img src="<?php echo base_url().'theme/images/cahayaabadi.jpg'?>" class="img-rounded" alt="Cinque Terre" width="304" height="236">
            </div>
            <div class="col-sm-4">
                <img src="<?php echo base_url().'theme/images/arjasari.png'?>" class="img-rounded" alt="Cinque Terre" width="304" height="236">
            </div>
            <div class="col-sm-4">
                <img src="<?php echo base_url().'theme/images/villa.jpg'?>" class="img-rounded" alt="Cinque Terre" width="304" height="236">
            </div>
        </div><br>
        <div class="row">
            <div class="col-md-12 text-center ftco-animate">
                <p><a href="<?=site_url('destinasi')?>" class="btn btn-primary py-3 px-4">Selengkapnya</a></p>
            </div>
        </div>
</div>
    <br>
    <br>
</section>
<br>
<br>
<section class="ftco-section">
    <div class="container-fluid">
        <div class="row justify-content-center pb-4">
            <div class="col-md-12 heading-section text-center heading-section-white ftco-animate">
                <h2 class="mb-4">Review Para Pengunjung</h2>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
        <?php foreach($menu as $menus) : ?>  
            <div class="col-lg-4">                                      
            <div class="card text-center mb-5" style="width: 18rem;">
                <div class="circle-image">
                    <img src="https://i.imgur.com/hczKIze.jpg" width="100">
                </div>
                    <span class="dot"></span>
                    <span class="name mb-1 fw-500"><?= $menus['nama'];?></span>
                    <small class="text-black-50"><?= $menus['nama_wisata']; ?></small>
                    <br>
                    <small class="text-black-50 font-weight-bold"><?= $menus['review_ulasan']; ?></small>
                <div class="rate bg-success py-3 text-white mt-3">
                    <h6 class="mb-0">Nilai Tempat Wisata</h6>
                    <div class="rating"> <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label> <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label> <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label> <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label> <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
                </div>
              </div>    
              </div>
            </div>       
        <?php endforeach ?>  
        </div>
    </div>
</section>





