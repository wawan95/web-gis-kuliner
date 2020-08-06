<div class="content-wrapper">
   <div class="zoomIn animated">     
    <section class="content">
        <div class="box box-primary box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">INPUT DATA KULINER</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
            
<table class='table table-bordered'>        
   	    <tr>
	    	<td width='200'>Nama Kuliner <?php echo form_error('nama_kuliner') ?></td><td><input type="text" class="form-control" name="nama_kuliner" id="nama_kuliner" placeholder="Nama Kuliner" value="<?php echo $nama_kuliner; ?>" /></td>
	    </tr>
	    <tr><td width='200'>Kategori <?php echo form_error('id_kategori') ?></td>
	    	<td>
	    		<?php echo cmb_dinamis('id_kategori','tbl_kategori','nama_kategori','id_kategori',$id_kategori)?></td></tr>

        <tr>
		    <tr>
	    	<td width='200'>Alamat <?php echo form_error('alamat') ?></td><td><input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" value="<?php echo $alamat; ?>" /></td>
	    </tr>

<!-- 			<div class="form-group <#?php echo form_error('pg_foto') ? 'error' : ''; ?>">
				<#?php echo form_label('Foto', 'pegawai_pg_foto', array('class' => 'control-label col-md-2 col-md-2') ); ?>
				<div class='col-md-10'>
					<input id='pegawai_pg_foto' type='file' name='pegawai_pg_foto' maxlength="100" value="<#?php echo set_value('pegawai_pg_foto', isset($pegawai['pg_foto']) ? $pegawai['pg_foto'] : ''); ?>" />
					<span class='help-inline'><#?php echo form_error('pg_foto'); ?></span>
				</div>
			</div>
 -->
 <tr><td width='200'>Images <?php echo form_error('images') ?></td><td> <input type="file" name="images" value="<?php echo $images; ?>"></td></tr>
      <!--   <td width='200'>Images <#?php echo form_error('images') ?></td> -->
	<!-- <td><input type="file"  name="images" id="images" value="<#?php echo($images)?>"  /><span class='help-inline'><#?php echo form_error('images'); ?></span></td> -->
        <!-- 	<td> <textarea class="form-control" rows="3" name="images" id="images" placeholder="Images"><#?php echo $images; ?></textarea></td></tr> -->
	    
        <tr>
        	<td width='200'>Keterangan <?php echo form_error('keterangan') ?></td><td> <textarea class="form-control" rows="3" name="keterangan" id="keterangan" placeholder="Keterangan"><?php echo $keterangan; ?></textarea></td>
        </tr>
	    
	    <tr><td width='200'>Latitude <?php echo form_error('lat') ?></td><td><input type="text" class="form-control" name="lat" id="lat" placeholder="Latitude" value="<?php echo $lat; ?>" />
	    </td></tr>
	    
	    <tr><td width='200'>Longitude <?php echo form_error('lng') ?></td><td><input type="text" class="form-control" name="lng" id="lng" placeholder="Longitude" value="<?php echo $lng; ?>" /></td></tr>
	    
	    <tr><td></td><td><input type="hidden" name="id_kuliner" value="<?php echo $id_kuliner; ?>" /> 
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('kuliner') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	    <?php echo $map['html']; ?>

<!-- <div class="col-sm-12">
       <#?php echo $map['html']; ?>
   </div> -->
	</table></form>        

</div>
</div>
</div>