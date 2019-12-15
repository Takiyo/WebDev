        <?php 
        $id   = '';
        $titel   = 'Tambah';
        $aksi   = 'tambah';
        $button   = 'Simpan';
        $tanggal = '';
        $kode = '';
        $jumlah = '';
        $hsatuan = '';
        $tharga = '';
        if (!empty($penjualan)) { 
        foreach ($penjualan as $row):
        $id = $row->id;    
        $tanggal = $row->tanggal;
        $kode = $row->kodebarang;
        $jumlah = $row->jumlah;
        $hsatuan = $row->hargasatuan;
        $tharga = $row->totalharga;
        $titel   = 'Perbarui';
        $aksi   = 'perbarui';
        $button   = 'Perbarui';
        endforeach;
        }
        ?> 
<div class="span9">
       <h3 class="page-title"><?php echo $titel; ?> Penjualan</h3>
       
<div class="well">
    <form id="user" method="post" action="<?php echo base_url();?>index.php/cpenjualan/<?php echo $aksi; ?>">
       
        <input type="hidden" id="id" name="id" value="<?php echo $id; ?>">
       
        <label>Tanggal</label>
        <input type="text" id="tanggal" name="tanggal" value="<?php echo $tanggal; ?>" required>
        <label>Kode Barang</label>
        <input type="text" id="kode" name="kode" value="<?php echo $kode; ?>" required>
        
        <label>Jumlah</label>
        <input type="text" id="jumlah" name="jumlah" value="<?php echo $jumlah; ?>" required>
        <label>Harga Satuan</label>
        <input type="text" id="hsatuan" name="hsatuan" value="<?php echo $hsatuan; ?>" required>
        <label>Total Harga</label>
        <input type="text" id="tharga" name="tharga" value="<?php echo $tharga; ?>" required>	
        
        <div style="padding-top:20px">
           <button class="btn btn-primary" id="simpan" type="submit"><?php echo $button; ?> Penjualan</button>
            
        </div>
	</form>
      </div>
  </div>


   