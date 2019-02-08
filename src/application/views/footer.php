<!--modal alert message-->
<div id="modal_alert_message" class="modal" style="margin-top:15%" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><i class="fa fa-warning" style="color:red"></i> Alerta</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p id="alert_message_text" style="color:black"></p>
            </div>
            <div class="modal-footer">
                <button id="accept_modal_alert_message" type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--modal success message-->
<div id="modal_success_message" class="modal" style="margin-top:15%" tabindex="-2" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><i class="fa fa-check" style="color:green"></i> Sucesso</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p id="success_message_text" style="color:black"></p>
            </div>
            <div class="modal-footer">
                <button id="accept_modal_success_message" type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>




<!--Start footer area-->  
<footer class="footer-area">
    <div class="container">
        <div class="row">
            <!--Start single footer widget-->
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12"></div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="single-footer-widget pd-bottom">
                    <div class="footer-logo">
                        <a href="#lnk_home_start">
                            <img src="<?php echo base_url().'assets/'?>images/resources/logo-footer-white.png" width="65%" height="80%" alt="Awesome Footer Logo">
                        </a>
                    </div>
                    <div class="our-info">
                        <p>Soluções tecnológicas para aumentar sua vissibilidade.</p>
                        <p>Coronel Moreira César, 160, Icaraí, Niterói - RJ, 24230-061.</p>
                        <p>CNPJ - 999.9999.9999.99</p>
                    </div>
                    <ul class="footer-social-links" style="margin-left: 20%">
                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="https://www.instagram.com/doorigisyoursolution/" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>
            <!--End single footer widget-->


            <!--Start single footer widget-->
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="single-footer-widget pd-top pd-left">
                     <div class="title">
                        <h5>Notícias e promoções?</h5>
                    </div>
                    <p>Subscreva-se e receba nossas notícias e novidades em primeira mão!</p>
                    <form name="subscription_form" class="default-form contact-form" method="post">
                        <div class="form-group">
                            <input id="subscription_email" type="email" name="email" placeholder="Seu email">
                        </div>
                        <div class="form-group">
                            <button id="subscription_btn" type="button" class="thm-btn bg-clr4">Subscrever</button>
                        </div>
                    </form>               
                </div>
            </div>
            <!--End single footer widget-->
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12"></div>
        </div>
    </div>
</footer>   
<!--End footer area-->

<!--Start footer bottom area-->
<section class="footer-bottom-area">
    <div class="container">
        <div class="copyright-text text-center">
            <p>DOORIG - TODOS OS DIREITOS RESERVADOS</p> 
        </div> 
    </div>  
</section>
<!--End footer bottom area-->