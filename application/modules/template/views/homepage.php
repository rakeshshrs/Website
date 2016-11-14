<html>
    <head>
            <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<?php foreach($qrs as $r):?>
        <title><?php echo $r->heading; ?></title>
        <meta name="Description" content="<?php echo $r->meta_desc;?>"/>
        <meta name="Keywords" content="<?php echo $r->meta_keyword;?>"/>
        <?php endforeach; ?>
<link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet"> 
<link href="<?php echo base_url();?>assets/css/webpage.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/datepicker/jquery-ui-1.10.4.custom.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery.js"></script>
<script src="<?php echo base_url();?>assets/datepicker/jquery-ui-1.10.4.custom.min.js"></script>
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
      <?php include('components/header.php');?>
      <?php include('components/slide.php');?>
      <?php include('components/home-section.php');?>
      <?php include('components/footer.php');?>
    </div> <!-- end wrapper -->
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  </body>
</html>