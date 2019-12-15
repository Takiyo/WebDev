<script type="text/javascript" src="<?php echo base_url();?>public/assets/DataTables/media/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>public/assets/DataTables/media/js/jquery.dataTables.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/DataTables/media/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/assets/DataTables/media/css/dataTables.bootstrap.css">
        
<div class="span9">
            <h3 class="page-title">Data Barang</h3>
            
<div class="btn-toolbar">
    <button class="btn btn-primary export"><a style="color:white" href="<?php echo base_url();?>index.php/chome/tambahbarang">Tambah Barang</a></button>
  <div class="btn-group">
  </div>
</div>

<div class="well">

		<table class="table table-striped table-bordered data">
			<thead>
				<tr>			
					<th>ID</th>
					<th>Kode Barang</th>
					<th>Nama Barang</th>
					<th>Jumlah</th>
					<th>Satuan</th>
					<th>Harga</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
			        <?php foreach ($barang as $b){ ?> 
				<tr>				
					<td><?php echo $b->id; ?></td>
					<td><?php echo $b->kode; ?></td>
					<td><?php echo $b->nama; ?></td>
					<td><?php echo $b->jumlah; ?></td>
					<td><?php echo $b->satuan; ?></td>
					<td><?php echo $b->harga; ?></td>
                                        <td align="center">
                                        <a href="<?php echo base_url();?>index.php/chome/editbarang/<?php echo $b->id; ?>">
                                        <input type="button" value="Edit" class="tombol small gray"></a>
                                        <a href="<?php echo base_url(); ?>index.php/cbarang/delete/<?php echo $b->id; ?>" onclick="return confirm('Anda yakin Ingin menghapus Data ?')">
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


