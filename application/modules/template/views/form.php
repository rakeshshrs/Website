<html>
    <head>
    <title><?php echo $title; ?></title>
            <meta name="viewport" content="width=device-width, initial-scale=1.0"> 

<link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet"> 
<link href="<?php echo base_url();?>assets/css/webpage.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/datepicker/jquery-ui-1.10.4.custom.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery.js"></script>
<script src="<?php echo base_url();?>assets/datepicker/jquery-ui-1.10.4.custom.min.js"></script>
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
    <div class="wrapper">
      <div class="container">
      <div class="row">
        <div class="header">
            <nav class="navbar navbar-inverse">
        <div class="navbar-logo">
            <img src="<?php echo base_url('assets/images/logo.png');?>"/>
        </div>
        
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
        </div>
    <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
        <li><a href="<?php echo base_url(); ?>">HOME</a></li>
        <li><a href="<?php echo base_url('page/about-us');?>">ABOUT US</a></li>
        <li><a href="<?php echo base_url('item'); ?>">MENU</a></li>
        <li><a href="<?php echo base_url('review');?>">REVIEWS</a></li>
        <li><a href="<?php echo base_url('page/contact');?>">CONTACT US</a></li>
        </ul>
    </div>
    </nav>
    </div> <!-- end header fluid -->
    </div>

  

    <div class="slide_content">
    <div class="row">
    <div class="content">
         <?php
            $this->load->view($module.'/'.$view_file);
        ?>
    </div>
    </div>
    </div> <!-- end slide_content-->

      <div class="footer">
        <div class="row">
            <div class="col-md-12 copyright">
            Copyright <?php echo date('Y'); ?>
            </div>
            
        </div>
    </div>

    </div> <!-- end container -->
</div> <!-- end wrapper -->
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
     <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</body>
</html>