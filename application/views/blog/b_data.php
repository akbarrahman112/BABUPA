<section class="contact" style="margin-bottom:50px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="contact-title">
                        <h2>List Laporan</h2>
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
                    <br>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="display">
                            <thead class="thead-dark">
                                <!-- KASUBAG Kemahasiswaan-->
                                <?php if ($this->session->userdata('usertype')=='KASUBAG') { ?>
                                <tr>
                                    <th width="25px">No</th>
                                    <th>Pengaju</th>
                                    <th width="200px">Judul Proposal</th>
                                    <th width="220px">Judul Laporan</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $i=1;
                                    foreach($data as $file) {
                                ?>
                                <tr>
                                    <td><?=$i++.'.'?></td>
                                    <td><?=$file->pengaju?></td>
                                    <td><?=$file->judul_proposal?></td>
                                    <td><a href="<?=$file->link_laporan?>" target="_blank"><?=$file->judul_laporan?></a></td>
                                    <td><?=date("d/m/Y", strtotime($file->tgl_upload))?></td>
                                    <?php if ($file->status_laporan > 0) { ?>
                                    <td style="text-align: center;">
                                        <label>Selesai</label>
                                    </td>
                                    <?php } else { ?>
                                    <td style="text-align: center;">
                                        <a href="<?=site_url('laporan/hasil_laps/'.$file->id_laporan)?>" class="btn btn btn-success btn-fill btn-sm"><span class="fas fa-vote-yea"> Keputusan</span></a>
                                    </td>
                                    <?php } ?>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                            <?php } ?>

                            <!-- Wakil Rektor-->
                            <?php if ($this->session->userdata('usertype')=='WAKIL REKTOR') { ?>
                                <tr>
                                    <th width="25px">No</th>
                                    <th>Pengaju</th>
                                    <th width="200px">Judul Proposal</th>
                                    <th width="220px">Judul Laporan</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $i=1;
                                    foreach($data as $file) {
                                ?>
                                <tr>
                                    <?php if ($file->status_laporan > 1) { ?>
                                    <td><?=$i++.'.'?></td>
                                    <td><?=$file->pengaju?></td>
                                    <td><?=$file->judul_proposal?></td>
                                    <td><a href="<?=$file->link_laporan?>" target="_blank"><?=$file->judul_laporan?></a></td>
                                    <td><?=date("d/m/Y", strtotime($file->tgl_upload))?></td>
                                        <?php if ($file->status_laporan > 2) { ?>
                                        <td style="text-align: center;">
                                            <label>Selesai</label>
                                        </td>
                                        <?php } else { ?>
                                        <td style="text-align: center;">
                                            <a href="<?=site_url('laporan/hasil_laps/'.$file->id_laporan)?>" class="btn btn btn-success btn-fill btn-sm"><span class="fas fa-vote-yea"> Keputusan</span></a>
                                        </td>
                                        <?php } ?>
                                    <?php } ?>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                            <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    