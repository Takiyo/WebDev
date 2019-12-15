<script type="text/javascript" src="<?php echo base_url();?>public/assets/DataTables/media/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/assets/DataTables/media/js/jquery.dataTables.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/DataTables/media/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/DataTables/media/css/dataTables.bootstrap.css">
        
<div class="span9">
            <h3 class="page-title">Data Administrator</h3>
            
<div class="btn-toolbar">
    <button class="btn btn-primary export"><a style="color:white" href="<?php echo base_url();?>index.php/chome/tambahadmin">Tambah Admin</a></button>
  <div class="btn-group">
  </div>
</div>

<div class="well">

		<table class="table table-striped table-bordered data">
			<thead>
				<tr>			
					<th>ID</th>
					<th>Username</th>
					<th>Password</th>
					<th>Action</th>
                                        
				</tr>
			</thead> 
			<tbody>
                             <?php foreach ($admin as $adm){ ?> 
				<tr>				
					<td><?php echo $adm->id; ?></td>
					<td><?php echo $adm->user; ?></td>
					<td><?php echo $adm->pass; ?></td>
                                        <td align="center">
                                        <a href="<?php echo base_url();?>index.php/chome/editadmin/<?php echo $adm->id; ?>">
                                        <input type="button" value="Edit" class="tombol small gray"></a>
                                        <a href="<?php echo base_url(); ?>index.php/cadmin/delete/<?php echo $adm->id; ?>" onclick="return confirm('Anda yakin Ingin menghapus Data ?')">
                                        <input type="button" value="Hapus" class="tombol small gray"></a>
                                        </td>
				</tr>
                             <?php } ?>
			</tbody>
		</table>


</div>
 <script type="text/javascript">
	$(document).ready(function(){
		$('.data').DataTable();
	});
</script>
		
</div>


