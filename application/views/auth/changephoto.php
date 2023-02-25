<section class="clearfix about about-style2">
    <div class="container">
        <div class="card text-center" style="width:500px; margin-left:auto; margin-right:auto">
            <div class="card-header">
                <h2 class="text-center">Form Ubah Foto</h2>
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
            <div class="card-body">
                <form action="<?php echo base_url('auth/change_foto')?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Foto Saat Ini</label>
                        <img class="avatar about-img mx-auto border-white" src="<?=base_url('profile/'.$this->session->userdata('foto'))?>" width="120" height="120"/>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Foto Baru</label>
                        <input type="file" name="foto" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="upload" class="btn btn-info btn-fill" value="Ubah Foto">
                        <a href="<?=site_url('auth/profile')?>"><button type="button" class="btn btn-danger btn-fill">Kembali</button></a>
                    </div>
                    <br>
                    <br>
                </form>
            </div>
            <br>
            <br>
        </div>
    </div>
</section>