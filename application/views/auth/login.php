<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Skripsi</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->

<!--     <#link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/style.css"> -->
        <link rel="stylesheet" href="<?php echo base_url();?>/assets/backend/bower_components/bootstrap/dist/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/bower_components/font-awesome/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/bower_components/Ionicons/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/dist/css/AdminLTE.min.css">
        <!-- iCheck -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/plugins/iCheck/square/blue.css">

        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/animate.css">
<style type="text/css">
	body { 
 background: url(<?php echo base_url(); ?>assets/backgroundk.jpg) no-repeat center center fixed; 
 -webkit-background-size: cover;
 -moz-background-size: cover;
 -o-background-size: cover;
 background-size: cover;
}
/*memberi style pada class panel default*/
.panel-default {
 opacity: 0.9;
 margin-top:180px;
}
.form-group.last {
 margin-bottom:0px;
}
</style>
<!-- 
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script> -->
        
        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    </head>
    <body >

        <div class="login-box">
        <div class="fadeInUp animated">
            <div class="login-logo">
                <b style="color: orange">Admin SIGKU </b>
            </div>
         </div>   
            <!-- /.login-logo -->
        <div class="fadeInDown animated">
            <div class="login-box-body">
                <?php
                $status_login = $this->session->userdata('status_login');
                if (empty($status_login)) {
                    $message = "Silahkan login untuk masuk ke aplikasi";
                } else {
                    $message = $status_login;
                }
                ?>
                <p class="login-box-msg"><?php echo $message; ?></p>

                <?php echo form_open('auth/cheklogin'); ?>
                
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" name="username" placeholder="Username" autocomplete="off">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" name="password" placeholder="Password" autocomplete="off">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>

                <div class="row">
                    <div class="col-xs-12">
                        <button type="submit" class="btn btn-primary btn-block btn-flat"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</button>
                    </div>

                </div>

                </form>




            </div>
            <!-- /.login-box-body -->
        </div>
        </div>
        <!-- /.login-box -->

        <!-- jQuery 3 -->
        <script src="<?php echo base_url(); ?>assets/backend/bower_components/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="<?php echo base_url(); ?>/assets/backend/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- iCheck -->
        <script src="<?php echo base_url(); ?>/assets/backend/plugins/iCheck/icheck.min.js"></script>
        <script>
            $(function () {
                $('input').iCheck({
                    checkboxClass: 'icheckbox_square-blue',
                    radioClass: 'iradio_square-blue',
                    increaseArea: '20%' // optional
                });
            });
        </script>
    </body>
</html>
