<section class="clearfix about about-style2">
    <div class="container">
        <div class="card text-center" style="width:500px; margin-left:auto; margin-right:auto">
            <div class="card-header" style="background-color: #2c3338;">
                <h2 class="text-center" style="color: white;">User Profile</h2>
            </div>
            <div class="card-body">
                <br><br>
                <img class="avatar about-img mx-auto border-white" src="<?=base_url('profile/'.$this->session->userdata('foto'))?>"/>
                <br><br>
                <h3 class="card-title"><?=$this->session->userdata('fullname')?></h3>
                <h6><?=$this->session->userdata('email')?></h6>
                <br>
                <a href="<?=site_url('auth/changephoto')?>" class="btn btn-primary">Ubah Foto</a>
            </div>
            <br>
            <br>
        </div>
    </div>
</section>