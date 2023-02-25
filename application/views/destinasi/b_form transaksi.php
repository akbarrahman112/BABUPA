<!-- Content -->
<div class="content transition">
    <div class="container-fluid dashboard">
        <div class="card">
            <div class="card-header">
                Form Transaksi
            </div>
            <div class="card-body">                                
                <?php echo form_open_multipart('pembeli/pemesanan/'); ?>                                          
                    <div class="form-group">
                        <label for="">Nama Menu</label><br>
                        <input type="text" class="form-control" name = "id_user" value="<?= $user['id_user']; ?>" aria-describedby="basic-addon2" readonly hidden>                         
                        <select name="nama_menu" class="form-control">       
                            <?php foreach($menu as $menus) : ?>                     
                            <option value="<?= $menus['id_menu']; ?>"><?= $menus['nama_menu']; ?> - (Rp.<?= $menus['harga']; ?>)</option>   
                            <?php endforeach ?>                         
                        </select>
                    </div>                                                                               
                    <div class="form-group">
                        <label for="">Kuantitas</label>
                        <input type="type" class="form-control" name = "kuantitas" aria-describedby="basic-addon2">                        
                    </div>                                                                
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-block">Beli Sekarang</button>
                    </div>  
                <?= form_close(); ?>
            </div>
        </div>                
    </div>
</div>

<script>
    document.getElementById('harga').innerHTML = 'Hello JavaScript';
</script>