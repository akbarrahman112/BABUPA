<section class="contact">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="contact-title">
                        <h2>Form Upload Laporan</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <?php
                        $judul='';
                        $link='';
                        
                        if(isset($laps)) {
                            $judul=$laps->judul_laporan;
                            $link=$laps->link_laporan;
                        }
                    ?>
                    <form action="" method="post">
                        <div class="form-group" hidden>
                            <label for="exampleInputEmail1">Pengaju</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="pengaju" value="<?=$this->session->userdata('fullname')?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Pilih Laporan</label>
                            <select class="form-control" name="judul_proposal" required>
                                <option selected>~ Pilih ~</option>
                                <?php foreach($proposal as $props) { ?>
                                <option value="<?=$props->judul_proposal?>" <?=set_select('judul_proposal',$props->judul_proposal?TRUE:FALSE)?>><?=$props->judul_proposal?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Judul Laporan</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="judul_laporan" value="<?=$judul?>" placeholder="Enter Judul Laporan" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Link Google Drive</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" name="link_laporan" value="<?=$link?>" placeholder="Enter Link" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="simpan" class="btn btn-info btn-fill" value="Kirim">
                            <a href="<?=site_url('laporan')?>"><button type="button" class="btn btn-success btn-fill">Kembali</button></a>
                        </div>
                        <br>
                        <br>
                    </form>
                </div>
            </div>
        </div>
    </section>