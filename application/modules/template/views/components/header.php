<div id="top" class="header">     
    <div id="content_container">
        <div id="header">
            <div class="container">
                <div class="logo">
                    <a href="">
                      <h1>RAKESH ELECTRICALS</h1>
                    </a>
                     <div class="headerContact">
                      <h3><strong><i class="fa fa-phone" aria-hidden="true"></i> +977-9841605949</strong></h3>
                      <h4><strong><i class="fa fa-envelope-o" aria-hidden="true"></i> info@rakeshelectricals.com</strong></h4>
                    </div>
                <div class="clear"></div>
                </div> <!--end of logo-->
            </div>
    
        <div class="container">
            <div class="row">
                <div class="main_nav">     
                    <ul class="topnav">
                        <li><a class="active" href="<?php echo base_url(); ?>">Home</a></li>
                        <?php foreach($nav as $n): ?>
                            <li><a href="<?php echo base_url('category/'.$n->slug); ?>"><?php echo $n->heading; ?></a></li>
                        <?php endforeach; ?>
                        <li class="icon">
                        <a href="javascript:void(0);" style="font-size:15px;" onclick="myFunction()"><i class="fa fa-align-justify" aria-hidden="true"></i>
                        </a></li>
                    </ul>
                    <div class="clr"></div>
                </div> <!-- end main nav -->   
            </div>
        </div>
    </div> <!-- end header-->
    
    <script>
    function myFunction() {
        document.getElementsByClassName("topnav")[0].classList.toggle("responsive");
    }
    </script>

    </div>
</div>