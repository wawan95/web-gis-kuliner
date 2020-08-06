<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-primary box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">INPUT DATA ADMIN</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">
            
<table class='table table-bordered'> 
      
    <!--     <input type="hidden" name="<#?=$this->security->get_csrf_token_name();?>" value="<#?=$this->security->get_csrf_hash();?>" style="display: none"> -->
	    <tr><td width='200'>Nama <?php echo form_error('nama') ?></td><td><input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" /></td></tr>
	    <tr><td width='200'>Username <?php echo form_error('username') ?></td><td><input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $username; ?>" /></td></tr>
 		<?php
                    if ($this->uri->segment(2) == 'create') {
                        ?>

                        <tr><td width='200'>Password <?php echo form_error('password') ?></td><td><input type="password" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo $password; ?>" /></td></tr>
                        <?php
                    } else{
                    ?>
	    <tr><td width='200'>Password <?php echo form_error('password') ?></td><td><input type="text" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo $password; ?>" /></td>
	    </tr>
	    <?php } ?>
	    <tr><td></td><td><input type="hidden" name="id_admin" value="<?php echo $id_admin; ?>" /> 
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('admin') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>
</div>