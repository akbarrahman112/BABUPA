<section>
    <div class="slider_img">
        <div id="carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                        <img class="d-block" src="<?php echo base_url().'theme/images/banjaran.jpg'?>" width="150px;">
                            <div class="carousel-caption d-md-block">
                            <div class="slider_title">
                              <p class="breadcrumbs"><span class="mr-2"><a href="<?php echo base_url('');?>">Beranda <i class="fa fa-chevron-right"></i></a></span> <span>Kontak Kami <i class="fa fa-chevron-right"></i></span></p>
                              <h1 class="mb-0 bread">Kontak Kami</h1>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</section>
<br>
<br>
<section class="ftco-section ftco-no-pb contact-section mb-4">
    <div class="container">
        <div class="row d-flex contact-info">
                <div class="col-md-3 d-flex">
                    <div class="align-self-stretch box p-4 text-center">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fa fa-map-marker"></span>
                        </div>
                        <h3 class="mb-2">Alamat</h3>
                        <p>Jl. Alun-alun Selatan No.222, Banjaran, Kec. Banjaran, Kabupaten Bandung, Jawa Barat 40377</p>
                    </div>
                </div>
                <div class="col-md-3 d-flex">
                    <div class="align-self-stretch box p-4 text-center">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fa fa-phone"></span>
                        </div>
                        <h3 class="mb-2">Nomor Telepon</h3>
                        <p>0899-9895-151</p>
                    </div>
                </div>
                <div class="col-md-3 d-flex">
                    <div class="align-self-stretch box p-4 text-center">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fa fa-paper-plane"></span>
                        </div>
                        <h3 class="mb-2">Alamat Email</h3>
                        <p style="margin-bottom: 0px;">Banjaran Budaya Pariwisata</p>
                        <p><a href="mailto:kec.banjaran@bandungkab.go.id">kec.banjaran@bandungkab.go.id</a></p>
                    </div>
                </div>
                <div class="col-md-3 d-flex">
                    <div class="align-self-stretch box p-4 text-center">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fa fa-globe"></span>
                        </div>
                        <h3 class="mb-2">Website</h3>
                        <p><a href="http://kecamatanbanjaran.bandungkab.go.id/public/">kecamatanbanjaran.bandungkab.go.id</a></p>
                    </div>
                </div>
            </div>
    </div>
</section>

<section class="ftco-section contact-section ftco-no-pt">
    <div class="container" > 
    <?php echo form_open_multipart('kontak/review'); ?>
        <div class="row block-9">
              <div class="col-md-6 ">
                <form method="post" action="" class="bg-light p-5 contact-form">
                    <h3>Kritik dan Saran</h3>
                    <div class="form-group">
                    <label>Nama Lengkap</label>
                        <input type="text" class="form-control" name="nama" value="<?= $this->session->userdata('fullname'); ?>" readonly>
                    </div>
                    <div class="form-group">
                    <label>Tempat Wisata</label>
                        <select name="id_wisata" class="form-control">
                        <?php foreach($user as $data): ?>  
                            <option value="<?= $data['id_wisata'];?>"><?= $data['nama_wisata'];?></option>
                        <?php endforeach ?>    
                        </select>                        
                    </div>
                    <div class="form-group">
                    <label>Review & Saran</label>
                        <textarea id="" cols="30" rows="7" class="form-control" name="review_ulasan" placeholder="Review dan Ulasan" required></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Kirim" class="btn btn-primary py-3 px-5">
                    </div>
                </form>
            </div>
            <?= form_close(); ?>
            <div class="col-md-6 d-flex">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63350.59726675735!2d107.56047278486274!3d-7.078102512778574!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68eb40d2e6494d%3A0xfc8db9e8b39c7ccc!2sKec.%20Banjaran%2C%20Kabupaten%20Bandung%2C%20Jawa%20Barat!5e0!3m2!1sid!2sid!4v1674628858891!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</section>


