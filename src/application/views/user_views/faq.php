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
        <link rel="stylesheet" href="<?php echo base_url() . 'assets/' ?>css/style.css"<?php echo '?' . $SCRIPT_VERSION; ?>>
        <link rel="stylesheet" href="<?php echo base_url() . 'assets/' ?>css/wizard.css">
        <link rel="stylesheet" href="<?php echo base_url() . 'assets/' ?>css/accordion.css">
        <link rel="stylesheet" href="<?php echo base_url() . 'assets/' ?>css/mycss.css">
        <!-- Minified Bootstrap 3 CSS-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">        
        <!-- Responsive stylesheet -->
        <link href="<?php echo base_url() . 'assets/' ?>plugins/revolution/css/navigation.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="<?php echo base_url() . 'assets/' ?>css/responsive.css">        
        <!-- Favicon -->
        <link rel="icon" type="image/png" href="<?php echo base_url() . 'assets/' ?>images/favicon/favicon.png" sizes="16x16">        
        <script src='https://www.google.com/recaptcha/api.js'></script>
        <script type="text/javascript">
            var base_url = "<?php echo base_url(); ?>";
        </script>
    </head>

    <body>
        <div class="boxed_wrapper">

            <!-- Start Preloader -->
            <div class="loader-container">
                <div class="progress-circle float loader-shadow">
                    <div class="progress-item">
                        <img src="<?php echo base_url() . 'assets/' ?>images/resources/logo-header.png" width="65%" height="80%" alt="logo">
                    </div>
                </div>
            </div>
            <!-- End Preloader -->

            <!--Start header area-->
            <header class="header-area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-sm-12 col-xs-12">
                            <div class="logo">
                                <a href="<?php echo base_url() ?>">
                                    <img src="<?php echo base_url() . 'assets/' ?>images/resources/logo-header.png" alt="Awesome Logo">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-9 col-sm-12 col-xs-12  non-show-in-moviles">
                            <div class="header-contact-info">
                                <ul>
                                    <li>
                                        <div class="iocn-holder">
                                            <span class="flaticon-pin"></span>
                                        </div>
                                        <div class="text-holder">
                                            <h6>Cel. Moreira César, 160</h6>
                                            <p>Icaraí, Niterói - RJ, 24230-061</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="iocn-holder">
                                            <span class="flaticon-clock"></span>
                                        </div>
                                        <div class="text-holder">
                                            <h6>Seg - Sab | 09.00 - 18.00</h6>
                                            <p>GTM -03</p>
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
                                            <li class="dropdown"><a href="<?php echo base_url() ?>">HOME</a></li>
                                            <li class="dropdown"><a href="<?php echo base_url().'index.php/welcome/faqs_view'?>">FAQs</a></li>
                                            <li class="dropdown"><a href="<?php echo base_url() ?>#lnk_how_function">COMO FUNCIONA</a></li>
                                            <li class="dropdown"><a href="<?php echo base_url() ?>#lnk_contact_us">CONTATO</a></li>
                                            <li id="0" class="dropdown show-in-moviles">
                                                <a href="<?php echo base_url().'index.php/signin/login_view#lnk_login_section'?>">
                                                    ENTRAR 
                                                    <i class="fa fa-user" aria-hidden="true"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </nav>
                                <!--End mainmenu-->
                            </div>
                            <div class="col-md-4 col-sm-12 col-xs-12">
                                <div class="free-consulation-button pull-right">
                                    <a class="thm-btn bg-clr1" href="<?php echo base_url().'index.php/signin/login_view#lnk_login_section'?>">ENTRAR <i class="fa fa-user" aria-hidden="true"></i></a>    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--End mainmenu area--> 

            <!--Page Title-->
            <section class="page-title n-on-show-in-moviles" style="background: url(<?php echo base_url() . 'assets/' ?>images/slides/sign-in-1.jpg); background-size:100%">
                <div class="container text-center">
                    <h2></h2>       
                    <ul class="title-manu">
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                    </ul>         
                </div>
            </section>
            <!--End Page Title--> 

            <section class="faq">
                <div class="container">
                    <div class="accordion-option">
                        <h3 class="title">Perguntas mais frequentes</h3>
                        <a id="collapse_all" href="javascript:void(0)" class="toggle-accordion active" accordion-id="#accordion"></a>
                    </div>
                    <div class="clearfix"></div>
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                        <!-- FAQ1 -->
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse1" aria-expanded="true" aria-controls="collapse1">
                                        Como realizo o cadastro?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                <div class="panel-body text-justify">
                                    <ul style="list-style-type:disc;">
                                        A plataforma DOORIG está baseada em módulos. Primeiro, você deve <a href="<?php echo base_url().'index.php/signin/signin_view#lnk_sigin_section';?>">cadastrar</a> uma conta pessoal geral em DOORIG informando seu email pessoal e senha, entre outros dados.
                                        Seguidamente é requisitado verificar seu email ou telefone. Ao concluir essa validação, será direcionado ao Dashboard do cliente, onde encontrará acesso aos diferentes módulos. 
                                        Essa conta geral será usada por você para fazer login (usando o email e senha) na plataforma e administrar os módulos que contrate.
                                        A criação da conta é GRÁTIS, nenhuma cobrança é realizada. 
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- FAQ2 -->
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingTwo">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse2" aria-expanded="true" aria-controls="collapse2">
                                        O que posso fazer no Dashboard?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse2" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
                                <div class="panel-body text-justify">
                                    Uma vez finalizado o <a href="<?php echo base_url().'index.php/signin/signin_view#lnk_sigin_section';?>">cadastro</a> da sua conta geral, ou ter 
                                    feito o <a href="<?php echo base_url().'index.php/signin/login_view#lnk_login_section'?>">login</a>, você é direcionado para o Dashboard.
                                    O Dashboard é um painel para que você administre informações gerais da sua conta de administração, e acesse aos módulos do sistema. Os módulos podem ter já sido contradatos por você, ou em espera de serem contrados, segundo sua demanda.
                                </div>
                            </div>
                        </div>
                        
                        <!-- FAQ3 -->
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingTwo">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse3" aria-expanded="true" aria-controls="collapse3">
                                        Quando devo começar a pagar e informar meus dados de pagamento?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse3" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
                                <div class="panel-body text-justify">
                                    A criação da conta de administração em DOORIG é GRÁTIS, nenhuma cobrança é realizada. Você tem alguns dias te teste GRATIS em alguns módulos. Para continuar usando a ferramenta depois desses dias de teste GRÁTIS, você precisará informar os dados de pagamento, e cobranças serão realizadas em dependência dos módulos contratados.
                                    <br><br> Os dados de pagamento são requisitados somente  a través do painel de Pagamento no seu Dashboard. Esses dados são enviados usando o protocolo SSL de envio seguro de dados com criptografia de ponta. Os dados NÃO são armazendaos em DOORIG, são enviados direitamente à gestora de pagamento que irá processar-os e que está legalmente habilitada para isso.
                                </div>
                            </div>
                        </div>
                        
                        <!-- FAQ4 -->
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingTwo">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse4" aria-expanded="true" aria-controls="collapse4">
                                        Como aumentar a visibilidade da minha marca?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse4" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
                                <div class="panel-body text-justify">
                                    A visibilidade da sua marca depende da interação que esta tem com outros perfis no Instagram.
                                    A captação de novos seguidores reais e segmentados segundo suas necessidades constitui a principal forma
                                    de aumentar sua vissibilidade.
                                    <br><br>Isso pode ser feito a través do módulo Visibilidade, que pode ser acessado somente desde o seu Dashboard.
                                    Primeiro você deve contratar o módulo, informando as credenciais da sua marca, e selecionando a velocidade com
                                    a qual quer que sua marca seja apresentada. 
                                    As velocidades dos planos do módulo de Visibilidade se diferenciam na taxa em que seu perfil é apresentado por 
                                    dia para outros perfis de Instagram, e valores serão cobrados em depêndecia da velocidade escolhida,
                                    somente depois dos dias de teste GRÁTIS)
                                    <br><br>Uma vez feito isso, você será redirecionado para o painel de administração do módulo Visibilidade. Nesse painel você deve configurar
                                    Perfis de referência, Geolocalizações e Hashtags realcionados com a sua marca. A nossa ferramenta irá seguir os seguidores dessse perfis 
                                    de referência, geolocalizações e hashtags,  e uma considerável parte considerável desses perfis seguirão sua marca de volta. Isso possibilita aumentar a quantidade de seguidores da sua marca e maior interação futura com as suas postagens.
                                </div>
                            </div>
                        </div> 
                        
                        <!-- FAQ5 -->
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingThree">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse5" aria-expanded="true" aria-controls="collapse5">
                                        Qué devo fazer quando tenho que Verificar a conta da minha marca?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse5" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
                                <div class="panel-body text-justify">
                                    Não se preocupe, a verificação da conta é uma medida de segurança e autenticação, normalmente você só precisará fazer uma vez, e é bem rápido, leva poucos segundos.
                                    Acesse o módulo Visibilidade e clique no botão para selecionar onde quer receber o código de verificação. A nossa ferramenta solicitará ao Instagram que envie um código para seu email ou telefone (cadastrado no Instagram). Continue o processo e adicione o código que for enviado. Finalmente sua marca ficará ativa no módulo de Visibilidade.
                                </div>
                            </div>
                        </div>
                        
                        <!-- FAQ6 -->
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingThree">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse6" aria-expanded="true" aria-controls="collapse6">
                                        O que significa UNFOLLOW TOTAL / UNFOLLOW NORMAL?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse6" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
                                <div class="panel-body text-justify">
                                    Unfollow normal é a maneira natural como a ferramenta trabalha, ou seja, deixando de seguir diariamente os perfis que foram seguidos nos dias anteriores. O unfollow total é um método simples que disponibilizamos para nossos clientes diminuírem a lista de pessoas que seguem no instagram. Com essa opção ativada, a ferramenta foca apenas em desseguir TODOS os perfis que o cliente segue, deixando de captar novos seguidores até que seja desativada.
                                </div>
                            </div>
                        </div>
                        
                        <!-- FAQ7 -->
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingThree">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse7" aria-expanded="true" aria-controls="collapse7">
                                        O que significa SEGUIR SEMPRE e NUNCA SEGUIR?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse7" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
                                <div class="panel-body text-justify">
                                    SEGUIR SEMPRE: A Doorig nunca deixará de seguir perfis adicionados nesta lista.
                                    NUNCA SEGUIR: Os perfis que adicionar nesta lista nunca serão seguidos pela Doorig.
                                </div>
                            </div>
                        </div>
                        
                        <!-- FAQ8 -->
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingThree">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse8" aria-expanded="true" aria-controls="collapse8">
                                        Tenho privacidade com meus dados do cartão?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse8" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
                                <div class="panel-body text-justify">
                                    Nosso sistema é 100% criptografado e protegido. A Doorig tem o compromisso com a privacidade e a segurança de seus clientes durante todo o processo de navegação pelo site. Os dados cadastrais dos clientes não são vendidos, trocados ou divulgados para terceiros, exceto quando essas informações são necessárias para o processo de cobrança.
                                    Para que estes dados permaneçam intactos, nós desaconselhamos expressamente a divulgação de sua senha a terceiros, mesmo a amigos e parentes. 
                                </div>
                            </div>
                        </div>
                        
                        <!-- FAQ9 -->
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingThree">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse9" aria-expanded="true" aria-controls="collapse9">
                                        O que fazer quando troco o nome de usuário e/ou senha da minha marca no Instagram?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse9" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
                                <div class="panel-body text-justify">
                                    Você só precisa acessar ao módulo Visibilidade na nossa plataforma <a href="www.doorig.com">DOORIG</a>, selecionar a opção de Atualizar marca no menu de controle do usuário logado (esquina superior direita) e colocar seu usuário e senha originais do Instagram, ou até colocar uma marca nova.
                                    Lembre-se de usar a mesma senha do seu instagram!
                                </div>
                            </div>
                        </div>
                        
                        <!-- FAQ10 -->
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingThree">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse10" aria-expanded="true" aria-controls="collapse10">
                                        Quantos seguidores por plano eu posso ganhar diariamente?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse10" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
                                <div class="panel-body text-justify">
                                    A Doorig é uma ferramenta de performance que capta seguidores reais, qualificados e segmentados para seu Instagram de acordo com a velocidade escolhida para assinar.
                                    <br>O que definirá seu desempenho serão as escolhas que fará para seus perfis de referência, localizações e a velocidade de sua assinatura. Outros fatores como o tipo de perfil que possui, frequência de uso, qualidade da postagem entre outros, também irão contar. Lembre-se que você irá interagir com pessoas reais, por isso deve fazer o máximo para encontrar pessoas que tenham algo a ver com você.
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
            <!--End service-->


            <?php echo $footer; ?>
            <?php echo $modals; ?>

            <!--Scroll to top-->
            <div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-angle-up"></span></div>
            <!-- main jQuery -->
            <script src="<?php echo base_url() . 'assets/' ?>js/jquery.min.js"></script>            
            <!-- bootstrap -->
            <script src="<?php echo base_url() . 'assets/' ?>js/bootstrap.min.js"></script>            
            <!-- count to -->
            <script src="<?php echo base_url() . 'assets/' ?>js/jquery.countTo.js"></script>            
            <!-- validate -->
            <script src="<?php echo base_url() . 'assets/' ?>js/validation.js"></script>            
            <!-- owl carousel -->
            <script src="<?php echo base_url() . 'assets/' ?>js/owl.carousel.min.js"></script>            
            <!-- mixit up -->
            <script src="<?php echo base_url() . 'assets/' ?>js/jquery.mixitup.min.js"></script>            
            <!-- fancy box -->
            <script src="<?php echo base_url() . 'assets/' ?>js/jquery.fancybox.pack.js"></script>
            <script src="<?php echo base_url() . 'assets/' ?>js/jquery.appear.js"></script>            
            <!-- isotope script-->
            <script src="<?php echo base_url() . 'assets/' ?>js/isotope.js"></script>
            <script src="<?php echo base_url() . 'assets/' ?>js/lightbox.js"></script>
            <script src="<?php echo base_url() . 'assets/' ?>js/jquery.magnific-popup.min.js"></script>            
            <!-- Bootstrap select picker js -->
            <script src="<?php echo base_url() . 'assets/' ?>bootstrap-sl-1.12.1/bootstrap-select.js"></script>
            <!-- Bootstrap bootstrap touchspin js -->
            <script src="<?php echo base_url() . 'assets/' ?>jquery-ui-1.11.4/jquery-ui.js"></script>

            <!--Revolution Slider-->
            <script src="<?php echo base_url() . 'assets/' ?>plugins/revolution/js/jquery.themepunch.revolution.min.js"></script>
            <script src="<?php echo base_url() . 'assets/' ?>plugins/revolution/js/jquery.themepunch.tools.min.js"></script>
            <script src="<?php echo base_url() . 'assets/' ?>plugins/revolution/js/extensions/revolution.extension.actions.min.js"></script>
            <script src="<?php echo base_url() . 'assets/' ?>plugins/revolution/js/extensions/revolution.extension.carousel.min.js"></script>
            <script src="<?php echo base_url() . 'assets/' ?>plugins/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
            <script src="<?php echo base_url() . 'assets/' ?>plugins/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
            <script src="<?php echo base_url() . 'assets/' ?>plugins/revolution/js/extensions/revolution.extension.migration.min.js"></script>
            <script src="<?php echo base_url() . 'assets/' ?>plugins/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
            <script src="<?php echo base_url() . 'assets/' ?>plugins/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
            <script src="<?php echo base_url() . 'assets/' ?>plugins/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
            <script src="<?php echo base_url() . 'assets/' ?>plugins/revolution/js/extensions/revolution.extension.video.min.js"></script>
            <script src="<?php echo base_url() . 'assets/' ?>js/main-slider-script.js"></script>

            <!-- thm custom script -->
            <script src="<?php echo base_url() . 'assets/' ?>js/custom.js"></script>

            <!-- system scripts -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
            <script src="<?php echo base_url() . 'assets/' ?>js/doorig/PT/internalization.js"<?php echo '?' . $SCRIPT_VERSION; ?>></script>
            <script src="<?php echo base_url() . 'assets/' ?>js/doorig/mask.js"<?php echo '?' . $SCRIPT_VERSION; ?>></script>
            <script src="<?php echo base_url() . 'assets/' ?>js/doorig/basics.js"<?php echo '?' . $SCRIPT_VERSION; ?>></script>
            <script src="<?php echo base_url() . 'assets/' ?>js/doorig/signin.js"<?php echo '?' . $SCRIPT_VERSION; ?>></script>
            <script src="<?php echo base_url() . 'assets/' ?>js/doorig/accordion.js"<?php echo '?' . $SCRIPT_VERSION; ?>></script>
        </div>
    </body>
</html>