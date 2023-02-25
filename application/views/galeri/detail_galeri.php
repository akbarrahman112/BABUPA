<script type="text/javascript">
  function pindah(url)
    {
      alert('Anda Tidak Dapat Melakukan Pembelian. Silahkan Login Terlebih Dahulu!');
      window.location = url;
    }
</script>
<div class="container">
  <div class="row">
    <div class="col-lg-12">
            <img class="image" src="<?php echo base_url('assets/image/'.$menu['gambar']);?>" style="width:200px height:300px;" >
            <p class="card-text"><?= $menu['deskripsi']; ?></p>             
        </div>            
      </div>
    </div>
  </div>
</div>
