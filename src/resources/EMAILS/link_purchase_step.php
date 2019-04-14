<html>
    <head>
        <meta name="viewport" content="width=device-width" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>ZURBemails</title>
        <link href="http://localhost/doorig/src/assets/css/email.css" rel="stylesheet"/>
    </head>
    <body bgcolor="#FFFFFF">

<!--        <table class="head-wrap" bgcolor="#999999">
            <tr>
                <td></td>
                <td class="header container">
                    <div class="content">
                        <table bgcolor="#999999">
                            <tr>
                                <td><img src="https://placehold.it/200x50/" /></td>
                                <td align="right"><h6 class="collapse">Hero</h6></td>
                            </tr>
                        </table>
                    </div>
                </td>
                <td></td>
            </tr>
        </table>-->

        <table class="body-wrap">
            <tr>
                <td></td>
                <td class="container" bgcolor="#FFFFFF">
                    <div class="content">
                        <table>
                            <tr>
                                <td>
                                    <h3>Olá, <?php echo "José";//$_GET["username"]; ?>:</h3>
                                    <!--<p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.</p>-->

                                    <!--<p><img src="https://placehold.it/600x300" /></p>-->

                                    <p class="callout">
                                        Você acaba de fazer o segundo passo para se cadastrar na plataforma <a href="https://doorig.com/">DOORIG &raquo;</a>, parabéns!
                                    </p>
                                    <p>Seu email cadastrado no nosso sistema é: <strong><?php echo "josergm86@gmail.com";//$_GET["useremail"]; ?></strong></p>
                                    <h3></h3>
                                    <p>Por favor, utilize o seguinte código de 4 dígitos para continuar o seu cadastro:</p>
                                    <h3><?php echo "2121";//$_GET["verification_code"]; ?></h3>
                                    
                                    <a class="btn">Click Me!</a>
                                    <br/>
                                    <br/>
                                    
                                    
                                    

                                    <p>Se tiver qualquer dúvida, por favor nos escreva!</p>
                                    <p>Obrigado por usar os nossos serviços,</p>
                                    <p>DOORIG SYSTEM</p>
                                    
                                    

                                    <table class="social" width="100%">
                                        <tr>
                                            <td>

                                                <table align="left" class="column">
                                                    <tr>
                                                        <td>
                                                            <h5 class="">Connect with Us:</h5>
                                                            <p class=""><a href="#" class="soc-btn fb">Facebook</a> <a href="#" class="soc-btn tw">Twitter</a> <a href="#" class="soc-btn gp">Google+</a></p>
                                                        </td>
                                                    </tr>
                                                </table>

                                                <table align="left" class="column">
                                                    <tr>
                                                        <td >
                                                            <h5 class="">Contact Info:</h5>
                                                            <p>Phone: <strong>408.341.0600</strong><br />
                                                                Email: <strong><a href="emailto:conFact@doorig.com">contact@doorig.com</a></strong></p>
                                                        </td>
                                                    </tr>
                                                </table>
                                                <span class="clear"></span>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </div>
                </td>
                <td></td>
            </tr>
        </table>

        <table class="footer-wrap">
            <tr>
                <td></td>
                <td class="container">

                    <div class="content">
                        <table>
                            <tr>
                                <td align="center">
                                    <p>
                                        <a href="#">Terms</a> |
                                        <a href="#">Privacy</a> |
                                        <a href="#"><unsubscribe>Unsubscribe</unsubscribe></a>
                                    </p>
                                </td>
                            </tr>
                        </table>
                    </div>
                </td>
                <td></td>
            </tr>
        </table>
    </body>
</html>