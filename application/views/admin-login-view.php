<!DOCTYPE html>
<html lang="en">
<head>
  <title>Mini Project </title>
  <style>
	      .member-container-inside .app-logo {
      margin-bottom: -15px;
      }
      .member-container-inside {
      position: relative;
      width: 400px;
      top:-57px;
      margin: 0 auto;
      padding: 0 0 11px 0;
      /* background: rgba(0,0,0,0.7); */
      background: #f1ebeb3d;
      box-shadow: 0 0 5px #222222;
      -webkit-box-shadow: 0 0 5px #222222;
      -moz-box-shadow: 0 0 5px #222222;
      -ms-box-shadow: 0 0 5px #222222;
      -o-box-shadow: 0 0 5px #222222;
      border-top: 30px   linear-gradient(to right, rgb(241, 39, 17), rgb(245, 175, 25));
    }
    .member-container-inside h4 {
      background: #fff;
      color: #ffffff;
      padding: 10px;
      text-align: center;
      font-size: 16px;
      margin-bottom: 20px;
      position: relative;
      top: 26px;
	  visibility: hidden;
    }
    .TaskTrackingloginRow{
      background: #eeeeee80;
      height: 383px;
      position: relative;
      top: 20px;
      box-shadow: 0 0 5px -3px;
    }
   
    .display-3{
      text-align: center;
      margin-top: 3.5%;
      font-size: 51px;
      font-weight: bold;
      color: #ce4913;
      letter-spacing: 3px;
      word-spacing: 9px;
      font-family: Georgia;
    }
    .TaskTrackingloginCol{
      background: #fff;
      padding: 147px 0;
    }

      .app-logo img{
    position: relative;
    width: 20%;
    top: -45px;
    }

	</style>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>


    <body>
	<!-- Preloader -->
	<div class="wrapper" style="margin-top:20px">
	    <div class="container-fluid">
	    	 
		  <div class="row TaskTrackingloginRow"> 		  	
		   <div class="col-md-6 TaskTrackingloginCol text-center">		  
		       <h2 class="display-3">
			      Login System
			   </h2>
		   </div>


		   <div class="col-md-6" style="margin-top:70px">
		   <div class="member-container">
		     <div class="member-container-inside">
			<h4></h4>
			<div class="app-logo">
			  <img src="<?php echo base_url('assets/img/logo.png');?>" style="width: 20%;" alt="LOGO" />	
       	    
			</div> 

			<?php if($this->session->flashdata('error')) { ?>
		   <div class="alert-danger">
		   	<?=$this->session->flashdata('error');?>
		   </div>
		  <?php } ?>
      
      <?php echo br(1);?>
		
			
	<?php echo form_open('Admin/dologin', array('id'=>'form_submit', 'method'=>'post'));?>
		<div class="form-group">
			<?php echo form_input(array('type'=>'text','name'=>'name', 'id'=>'name', 'placeholder'=>'Please enter your name','class'=>'form-control','value'=>set_value('name')));?>
			<?php echo form_error('name', '<div style="color:red">','</div>');?>
			<span id="name_error" style="display:none"></span>
		</div>

	<div class="form-group">
		<?php echo form_input(array('name'=>'password', 'id'=>'password','placeholder'=>'Please enter your password', 'value'=>set_value('password'), 'class'=>'form-control', 'type'=>'text'));?>
		<?php echo form_error('password', '<div style="color:red">','</div>');?>
		</div>
	<span id="password_error" style="display:none"></span>
  <?php echo br(1);?>
    <?php echo form_input(array('name'=>'submit', 'id'=>'btn_submit', 'value'=>'Login', 'class'=>'btn btn-danger', 'type'=>'submit'));?>
  <?php echo form_close(); ?>

				
			</div><!-- member-container-inside -->
			</div><!-- member-container -->
		   </div>
		  </div>
		</div>
	    
	    
	</div>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#btn_submit').click(function(){
				var name = $('#name').val().trim();
				var password = $('#password').val().trim();
				if(name=='') {
					$('#name_error').html('Please enter your name').css({'color':'red', 'font-size':'10px'}).show();
					return false;
					} else {
            $('#name_error').html('');
          }

					if(password=='') {
					$('#password_error').html('Please enter your password').css({'color':'red', 'font-size':'10px'}).show();
					return false;
					} else {
            $('#password_error').html('');
          }
			});
		});
	</script>