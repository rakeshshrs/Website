<html>
	<head>
		<title><?php echo $title; ?></title>
			<meta name="viewport" content="width=device-width, initial-scale=1.0"> 

<link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet"> 
<link href="<?php echo base_url();?>assets/css/adminpage.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/datepicker/jquery-ui-1.10.4.custom.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery.js"></script>
<script src="<?php echo base_url();?>assets/datepicker/jquery-ui-1.10.4.custom.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/calculator.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/ckeditor/ckeditor.js"></script>
<script type="text/javascript">
$(function() {
$( ".datepicker" ).datepicker({
			dateFormat: "yy-mm-dd"
			});
});
</script>

<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script> 
	</head>
	<body>
		<div class="container-fluid">
			<div class="page-wrapper">
				<div class="wrapper">
					<div class="header">
						<div class="menu">
						<a href="<?php echo base_url();?>admin/home"><i class="fa fa-home"></i>
 Home</a>
						<a href="<?php echo base_url();?>admin/logout"><i class="fa fa-sign-out"></i>
 Logout </a>
						</div>
					</div>
				</div>
				<div class="content_wrapper">
				<div class="col-md-3 sidebar">
				<?php
					$this->load->view('template/sidebar');
				?>
				</div>
				<div class="col-md-9 content">		
				<?php
					$this->load->view($module.'/'.$view_file);
				?>
				</div>
				</div>
			</div>
		</div>
	</body>
</html>