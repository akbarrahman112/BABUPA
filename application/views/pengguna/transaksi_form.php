<section class="contact">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="contact-title">
                    <h2>Form Reservasi</h2>
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
        <div class="row">
            <div class="col-md-12">     
            <?php echo form_open_multipart('pengguna/pemesanan'); ?> 
                    <div class="form-group">
                        <label for="">Nama Pemesan</label><br>
                        <input autocomplete="off" type="type" class="form-control" readonly value="<?php echo $this->session->userdata('fullname') ?>" aria-describedby="basic-addon2">                         
                    </div>                                       
                    <div class="form-group">
                        <label for="">Nama Wisata</label><br>
                        <select name="nama_wisata" class="form-control">
                        <?php foreach($wisata as $data): ?>  
                            <option value="<?= $data['id_wisata'];?>"><?= $data['nama_wisata'];?></option>
                        <?php endforeach ?>    
                        </select>                        
                    </div>                                                    
                    <div class="form-group">
                        <label for="">Alamat Lengkap</label>
                        <input autocomplete="off" type="text" class="form-control" name ="alamat_lengkap" aria-describedby="basic-addon2">                        
                    </div>  
                    <div class="form-group">
                        <label for="">No Telepon</label>
                        <input autocomplete="off" type="text" class="form-control" name ="no_tlp" aria-describedby="basic-addon2" min=0 maxlength=13>                        
                    </div>                                    
                    <div class="form-group">
                        <label for="">Jumlah Tiket</label>
                        <input autocomplete="off" type="number" class="form-control" name ="jumlah_tiket" aria-describedby="basic-addon2" min=0>                        
                    </div>                              
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-block">Pesan Sekarang</button>
                    </div>  
                <?= form_close(); ?>
            </div>
        </div>                
    </div>
</div>
</section>
