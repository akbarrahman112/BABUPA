
<div class="container">
  <div class="row">
    <div class="col-lg-12">
    <br>
    <br>
          <h3 style="text-align: center; color: orangered;"><?= $menu['nama_wisata'];?></h3>
          <br>
          <div class="text-center">
            <img class="image" src="<?php echo base_url('assets/foto/'.$menu['gambar']);?>" style="height: 370px; width: 570px;" ><br>
          </div>
          <br>
              <p style="text-align: center;"><?= $menu['deskripsi']; ?></p>     
              <h5 class="font-weight-bold" style="text: bold; color: orangered;">Fasilitas :</h5>
              <li class="card-title"><?= $menu['fasilitas']; ?></li>
              <br>
              <h5 class="font-weight-bold" style="text: bold; color: orangered;">Deskripsi lainya</h5>
              <li class="card-title"><?= $menu['deskripsi_lainnya']; ?></li>   
              <br>        
              <h5 class="font-weight-bold" style="text: bold; color: orangered;">Harga Tiket</h5>
              <li class="card-title"><?= $menu['harga_tiket']; ?></li>           
              <hr>
            <?php if($this->session->userdata('usertype') == "Pengguna"):?>
              <a href="<?= base_url('pengguna/pemesanan');?>" class="btn btn-success">Beli Tiket</a>
              <a href="<?= base_url('destinasi');?>" class="btn btn-success">Kembali</a>
            <?php else: ?>
<!-- Button trigger modal -->
<button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#exampleModal">
Beli
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Anda harus Login dulu sebelum melakukan pembelian!
      </div>
      <div class="modal-footer">
              <a class = "btn btn-danger btn-sm" href ="<?php echo base_url('login') ?>">tutup</a>
      </div>
    </div>
  </div>
</div>
              <?php endif ?>
        </div>            
      </div>
    </div>
  </div>
</div>
