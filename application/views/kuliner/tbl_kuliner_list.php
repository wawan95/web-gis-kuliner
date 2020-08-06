<div class="content-wrapper">
   <div class="fadeIn animated"> 
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary box-solid">
    
                    <div class="box-header">
                        <h3 class="box-title">KELOLA DATA KULINER</h3>
                    </div>
        
        <div class="box-body table-responsive">
            <div class='row'>
            <div class='col-md-9'>
            <div style="padding-bottom: 10px;"'>
        <?php echo anchor(site_url('kuliner/create'), '<i class="fa fa-plus" aria-hidden="true"></i> Tambah Data', 'class="btn btn-warning btn-sm"'); ?></div>
            </div>
            <div class='col-md-3'>
            <form action="<?php echo site_url('kuliner/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('kuliner'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
            </div>
        
   
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <thead class="bg-primary">
                <tr>
                    <th>No</th>
            		<th>Nama</th>
            		<th>Kategori</th>
                    <th>Alamat</th>
            		<th>Images</th>
            		<th>Keterangan</th>
            		<th>Lat</th>
            		<th>Lng</th>
            		<th>Action</th>
                </tr>
            </thead><?php
             $dir='assets/foto/';
            foreach ($kuliner_data as $kuliner)
            {
                ?>
                <tr>
			<td width="10px"><?php echo ++$start ?></td>
			<td><?php echo $kuliner->nama_kuliner ?></td>
			<td><?php echo $kuliner->nama_kategori ?></td>
            <td><?php echo $kuliner->alamat ?></td>
			<!-- <td><#?php echo $kuliner->images ?></td> -->
            <td width="10px"><img src="<?=base_url()?><?= $dir.$kuliner->images ?>"  width="120px" height="120px"></td> 
<!--             <td><#?php echo $kuliner->images ?></td> -->
			<td><?php echo $kuliner->keterangan ?></td>
			<td><?php echo $kuliner->lat ?></td>
			<td><?php echo $kuliner->lng ?></td>
			<td style="text-align:center" width="100px">
				<?php 
				// echo anchor(site_url('kuliner/read/'.$kuliner->id_kuliner),'<i class="fa fa-eye" aria-hidden="true"></i>','class="btn btn-danger btn-sm"'); 
				// echo '  '; 
				echo anchor(site_url('kuliner/update/'.$kuliner->id_kuliner),'<i class="fa fa-pencil-square-o" aria-hidden="true"></i>','class="btn btn-warning btn-sm"'); 
				echo '  '; 
				echo anchor(site_url('kuliner/delete/'.$kuliner->id_kuliner),'<i class="fa fa-trash-o" aria-hidden="true"></i>','class="btn btn-danger btn-sm" Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                
	    </div>
            <div class="col-md-6 text-right">

                <?php echo $pagination ?>
            </div>
        </div>
        </div>
                    </div>
            </div></div>
            </div>
    </section>
</div>
</div>
