 <section class="contact" style="margin-bottom:50px;">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="contact-title">
                                <h2>Review & Ulasan</h2>
                            </div>
                            <div class="form-group">
                                        <?php if($this->session->flashdata('success')){ ?>  
                                            <div class="alert alert-success alert-dismissible fade show">
                                                <?php echo $this->session->flashdata('success'); ?>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="color: black;">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>  
                                            </div>  
                                        <?php } else if($this->session->flashdata('error')){ ?>  
                                            <div class="alert alert-danger alert-dismissible fade show">
                                                <?php echo $this->session->flashdata('error'); ?>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="color: black;">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>   
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table class="table table-bordered" >
                                                    <thead class="thead-dark"> 
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>Nama Lengkap</th>
                                                        <th>Tempat Wisata</th>
                                                        <th>Review & Saran</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                    </thead>
                                            <tbody>
                                            <?php 
                                                $i = 1;
                                                foreach($data as $datas) { 
                                            ?>
                                            <tr>
                                                <td><?=$i++.'.'?></td>
                                                <td><?= $datas['nama']; ?></td>
                                                <td><?= $datas['nama_wisata']; ?></td>                               
                                                <td><?= $datas['review_ulasan']; ?></td>   
                                                <td>
                                                <a href="<?= base_url('kontak/delete/'.$datas['id_review']); ?>" class="btn btn-danger">Hapus</a>
                                                </td>
                                            </tr>
                                            <?php } ?>   
                                        </tbody>
                                    </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
