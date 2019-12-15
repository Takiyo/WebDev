        <?php 
        $id   = '';
        $titel   = 'Tambah';
        $aksi   = 'tambah';
        $button   = 'Simpan';
        $user = '';
        $pass = '';
        if (!empty($admin)) { 
        foreach ($admin as $row):
        $id = $row->id;    
        $user = $row->user;
        $pass = $row->pass;
        $titel   = 'Perbarui';
        $aksi   = 'perbarui';
        $button   = 'Perbarui';
        endforeach;
        }
        ?> 
<div class="span9">
       <h3 class="page-title"><?php echo $titel; ?> Admin</h3>
       
<div class="well">
    <form id="user" method="post" action="<?php echo base_url();?>index.php/cadmin/<?php echo $aksi; ?>">
       
        
        <label>Nama User</label>
        <input type="hidden" id="id" name="id" value="<?php echo $id; ?>">
        <input type="text" id="nama" name="user" value="<?php echo $user; ?>" required>
        <label>Password</label>
        <input type="password" id="pass" name="pass" value="<?php echo $pass; ?>" required>		
        <div style="padding-top:20px">
           <button class="btn btn-primary" id="simpan" type="submit"><?php echo $button; ?> Admin</button>
           
        </div>
	</form>
      </div>
  </div>


   