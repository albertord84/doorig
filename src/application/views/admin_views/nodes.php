<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
	<title>Maior visibilidade no Instagram</title>	
        <!-- responsive meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1">	
        <!-- For IE -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge">	
        <!-- master stylesheet -->
	<link rel="stylesheet" href="<?php echo base_url().'assets/'?>css/style.css"<?php echo '?'.$SCRIPT_VERSION;?>>
	<link rel="stylesheet" href="<?php echo base_url().'assets/'?>css/mycss.css"<?php echo '?'.$SCRIPT_VERSION;?>>
	<link rel="stylesheet" href="<?php echo base_url().'assets/'?>css/wizard.css">
        <!-- Minified Bootstrap 3 CSS-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">        
        <!-- Responsive stylesheet -->
        <link href="<?php echo base_url().'assets/'?>plugins/revolution/css/navigation.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="<?php echo base_url().'assets/'?>css/responsive.css">        
        <!-- Favicon -->
        <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url().'assets/'?>images/favicon/apple-touch-icon.html">
        <link rel="icon" type="image/png" href="<?php echo base_url().'assets/'?>images/favicon/favicon.png" sizes="16x16">        
        <script src='https://www.google.com/recaptcha/api.js'></script>
        <script type="text/javascript"> 
            var base_url = "<?php echo base_url();?>";
        </script>
    </head>

    <body>
        <div class="boxed_wrapper">

            <!-- Start Preloader -->
              <div class="loader-container">
                <div class="progress-circle float loader-shadow">
                  <div class="progress-item">
                    <img src="<?php echo base_url().'assets/'?>images/resources/logo-header.png" width="65%" height="80%" alt="logo">
                  </div>
                </div>
              </div>
            <!-- End Preloader -->

            <!--Start header area-->
            <header class="header-area n-on-show-in-moviles">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-sm-12 col-xs-12">
                            <div class="logo">
                                <a href="<?php echo base_url()?>">
                                    <img src="<?php echo base_url().'assets/'?>images/resources/logo-header.png" alt="Awesome Logo">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-9 col-sm-12 col-xs-12">
                            <div class="header-contact-info">
                                <ul>                                    
                                    <li>                                        
                                        <div class="text-holder">
                                            <h1>ADMIN</h1>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>           
                    </div>
                </div>
            </header>  
            <!--End header area--> 

            <!--Start mainmenu area-->
            <section class="mainmenu-area stick">
                <div class="container">
                    <div class="mainmenu-bg">
                        <div class="row">
                            <div class="col-md-8 col-sm-12 col-xs-12">
                                <!--Start mainmenu-->
                                <nav class="main-menu">
                                    <div class="navbar-header">     
                                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                        </button>
                                    </div>
                                    <div class="navbar-collapse collapse clearfix">
                                        <ul class="navigation clearfix">
                                            <li class="dropdown"><a href="<?php echo base_url()?>">Voltar</a></li>
                                            <li class="dropdown"><a href="<?php echo base_url()."index.php/admin/nodes"?>">Nodos</a></li>
                                            <li class="dropdown"><a href="<?php echo base_url()."index.php/admin/clients"?>">Clientes</a></li>
                                        </ul>
                                    </div>
                                </nav>
                                <!--End mainmenu-->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--End mainmenu area--> 

            <!--Start service-->
            <section>
              <div class="container">
                <?php
                  foreach ($node_list as $n) {
                    $html = sprintf(
                      '<div class="col-md-4 col-md-12 col-xs-12 node-box ">
                          <h3>Nodo <span id="node_name">%s</span></h3><br>
                          <div class="text-justify">
                            <h5>URL: <span id="url_node_dashboard">%s</span><br>
                            <h5>IP: <span id="url_node_ip">%s</span></h5>
                          </div>
                          <div class="text-center">
                            <button id="btn_node_access" class="btn btn-info">Acessar nodo</button>
                          </div>
                        </div>', $n->name, $n->description, $n->IP);
                    echo $html;                  
                  }
                ?>         
              </div>
            </section>
            <!--End service-->

            <?php echo $footer_admin;?>
            <?php echo $modals;?>

            <!--Scroll to top-->
            <div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-angle-up"></span></div>
            <!-- main jQuery -->
            <script src="<?php echo base_url().'assets/'?>js/jquery.min.js"></script>            
            <!-- bootstrap -->
            <script src="<?php echo base_url().'assets/'?>js/bootstrap.min.js"></script>            
            <!-- count to -->
            <script src="<?php echo base_url().'assets/'?>js/jquery.countTo.js"></script>            
            <!-- validate -->
            <script src="<?php echo base_url().'assets/'?>js/validation.js"></script>            
            <!-- owl carousel -->
            <script src="<?php echo base_url().'assets/'?>js/owl.carousel.min.js"></script>            
            <!-- mixit up -->
            <script src="<?php echo base_url().'assets/'?>js/jquery.mixitup.min.js"></script>            
            <!-- fancy box -->
            <script src="<?php echo base_url().'assets/'?>js/jquery.fancybox.pack.js"></script>
            <script src="<?php echo base_url().'assets/'?>js/jquery.appear.js"></script>            
            <!-- isotope script-->
            <script src="<?php echo base_url().'assets/'?>js/isotope.js"></script>
            <script src="<?php echo base_url().'assets/'?>js/lightbox.js"></script>
            <script src="<?php echo base_url().'assets/'?>js/jquery.magnific-popup.min.js"></script>            
            <!-- Bootstrap select picker js -->
            <script src="<?php echo base_url().'assets/'?>bootstrap-sl-1.12.1/bootstrap-select.js"></script>
            <!-- Bootstrap bootstrap touchspin js -->
            <script src="<?php echo base_url().'assets/'?>jquery-ui-1.11.4/jquery-ui.js"></script>

            <!--Revolution Slider-->
            <script src="<?php echo base_url().'assets/'?>plugins/revolution/js/jquery.themepunch.revolution.min.js"></script>
            <script src="<?php echo base_url().'assets/'?>plugins/revolution/js/jquery.themepunch.tools.min.js"></script>
            <script src="<?php echo base_url().'assets/'?>plugins/revolution/js/extensions/revolution.extension.actions.min.js"></script>
            <script src="<?php echo base_url().'assets/'?>plugins/revolution/js/extensions/revolution.extension.carousel.min.js"></script>
            <script src="<?php echo base_url().'assets/'?>plugins/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
            <script src="<?php echo base_url().'assets/'?>plugins/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
            <script src="<?php echo base_url().'assets/'?>plugins/revolution/js/extensions/revolution.extension.migration.min.js"></script>
            <script src="<?php echo base_url().'assets/'?>plugins/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
            <script src="<?php echo base_url().'assets/'?>plugins/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
            <script src="<?php echo base_url().'assets/'?>plugins/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
            <script src="<?php echo base_url().'assets/'?>plugins/revolution/js/extensions/revolution.extension.video.min.js"></script>
            <script src="<?php echo base_url().'assets/'?>js/main-slider-script.js"></script>

            <!-- thm custom script -->
            <script src="<?php echo base_url().'assets/'?>js/custom.js"></script>

            <!-- system scripts -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
            <script src="<?php echo base_url().'assets/'?>js/doorig/PT/internalization.js"<?php echo '?'.$SCRIPT_VERSION;?>></script>
            <script src="<?php echo base_url().'assets/'?>js/doorig/mask.js"<?php echo '?'.$SCRIPT_VERSION;?>></script>
            <script src="<?php echo base_url().'assets/'?>js/doorig/basics.js"<?php echo '?'.$SCRIPT_VERSION;?>></script>
            <script src="<?php echo base_url().'assets/'?>js/doorig/admin.js"<?php echo '?'.$SCRIPT_VERSION;?>></script>
        </div>
    </body>
</html>