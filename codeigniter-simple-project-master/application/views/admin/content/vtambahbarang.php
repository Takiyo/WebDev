        <?php 
        $id   = '';
        $titel   = 'Tambah';
        $aksi   = 'tambah';
        $button   = 'Simpan';
        $kode = '';
        $nama = '';
        $jumlah = '';
        $satuan = '';
        $harga = '';
        if (!empty($barang)) { 
        foreach ($barang as $row):
        $id = $row->id;    
        $kode = $row->kode;
        $nama = $row->nama;
        $jumlah = $row->jumlah;
        $satuan = $row->satuan;
        $harga = $row->harga;
        $titel   = 'Perbarui';
        $aksi   = 'perbarui';
        $button   = 'Perbarui';
        endforeach;
        }
        ?> 
<div class="span9">
       <h3 class="page-title"><?php echo $titel; ?> Barang</h3>
       
<div class="well">
    <form id="user" method="post" action="<?php echo base_url();?>index.php/cbarang/<?php echo $aksi; ?>">
       
        <input type="hidden" id="id" name="id" value="<?php echo $id; ?>">
       
        <label>Kode Barang</label>
        <input type="text" id="kode" name="kode" value="<?php echo $kode; ?>" required>
        <label>Nama Barang</label>
        <input type="text" id="nama" name="nama" value="<?php echo $nama; ?>" required>
        
        <label>Jumlah</label>
        <input type="text" id="jumlah" name="jumlah" value="<?php echo $jumlah; ?>" required>
        <label>Satuan</label>
        <input type="text" id="satuan" name="satuan" value="<?php echo $satuan; ?>" required>
        <label>Harga</label>
        <input type="text" id="harga" name="harga" value="<?php echo $harga; ?>" required>	
        
        <div style="padding-top:20px">
           <button class="btn btn-primary" id="simpan" type="submit"><?php echo $button; ?> Barang</button>
           
        </div>
	</form>
      </div>
  </div>


   