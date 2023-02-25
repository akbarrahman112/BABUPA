<section class="contact">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="contact-title">
                    <h2>Form Keputusan</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <?php
                    $status='';
                    $komentar='';
                    
                    if(isset($laps)) {
                        $status=$laps->status_laporan;
                        $komentar=$laps->komentar_laporan;
                    }
                ?>
                <form action="" method="post">
                    <table>
                        <div class="form-group">
                            <tr>
                                <td><label>Pengaju</label></td>
                                <td><label> &nbsp; : &nbsp; <?=$laporan->pengaju?></label></td>
                            </tr>
                        </div>
                        <div class="form-group">
                            <tr>
                                <td><label>Judul Proposal</label></td>
                                <td><label> &nbsp; : &nbsp; <?=$laporan->judul_proposal?></label></td>
                            </tr>
                        </div>
                        <div class="form-group">
                            <tr>
                                <td><label>Judul Laporan</label></td>
                                <td><label> &nbsp; : &nbsp; <?=$laporan->judul_laporan?></label></td>
                            </tr>
                        </div>
                    </table>
                    <hr>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Keputusan</label>
                        <select class="form-control" name="status_laporan" required>
                            <option selected>~ Pilih ~</option>
                            <?php if ($this->session->userdata('usertype')=='KASUBAG') { ?>
                            <option value="2" <?=set_select('status_laporan','2',$status=='2'?TRUE:FALSE)?>>Setuju</option>
                            <option value="1" <?=set_select('status_laporan','1',$status=='1'?TRUE:FALSE)?>>Tidak Setuju</option>
                            <?php } if ($this->session->userdata('usertype')=='WAKIL REKTOR') { ?>
                            <option value="3" <?=set_select('status_laporan','3',$status=='3'?TRUE:FALSE)?>>Setuju</option>
                            <option value="1" <?=set_select('status_laporan','1',$status=='1'?TRUE:FALSE)?>>Tidak Setuju</option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Komentar</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" name="komentar_laporan" value="<?=$komentar?>" placeholder="Enter Komentar"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" class="btn btn-info btn-fill" value="Simpan">
                        <a href="<?=site_url('laporan/keputusan')?>"><button type="button" class="btn btn-success btn-fill">Batal</button></a>
                    </div>
                    <br>
                    <br>
                </form>
            </div>
        </div>
    </div>
</section>