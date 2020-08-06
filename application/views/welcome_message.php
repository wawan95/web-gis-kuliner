<script type="text/javascript">
		var centreGot = false;
	</script>
   
<div class="content-wrapper">
    <section class="content">
	      <div class="bounce animated"> 
         <!-- <h2><#?php date_default_timezone_set("Asia/Jakarta"); 
                $b = time();
                $hour = date("G",$b); 

                if ($hour>=0 && $hour<=11)   
                {
                echo "Selamat Pagi ";
                }
                elseif ($hour >=12 && $hour<=14)
                {
                echo "Selamat Siang ";
                }
                elseif ($hour >=15 && $hour<=17)
                {
                echo "Selamat Sore ";
                }
                elseif ($hour >=17 && $hour<=18)
                {
                echo "Selamat Petang ";
                }
                elseif ($hour >=19 && $hour<=23)
                {
                echo "Selamat Malam ";
                }?>
  <?= $this->session->userdata('nama');?></h2> --></div>
<div class="row">
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
<!--           -->
           <div class="small-box bg-green"> 
            <div class="inner">
              <h3><?php echo $admin->num_rows(); ?></h3>

              <p>Pengelola</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-contact"></i>
            </div>
            <a href="<?php echo base_url(); ?>admin" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        <!-- </div> -->
      </div>

        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
<!--          <div class="bounceIn animated">  -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $kategori->num_rows(); ?></h3>

              <p>Kategori</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-list"></i>
            </div>
            <a href="<?php echo base_url(); ?>kategori" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        <!-- </div> -->
       </div>

      <div class="col-lg-4 col-xs-6">
          <!-- small box -->
         <!-- div class="bounceIn animated"> --> 
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $kuliner->num_rows(); ?></h3>

              <p>Kuliner</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="<?php echo base_url(); ?>kuliner" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        <!-- </div> -->
       </div>

<div class="fadeIn animated"> 
       <div class="col-sm-12">
       <?php echo $map['html']; ?>
       <div id="directionsDiv"></div>
   	  </div>
</div>  
</div> 	
    </section>
</div>

