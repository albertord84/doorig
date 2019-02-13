<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Confirmação de conta!</title>
    </head>
    <body>
        <div style="width: 640px; font-family: Arial, Helvetica, sans-serif; font-size: 11px;">
            <h1>DOORIG Redefinição de senha!</h1>
            <!--  <div align="center">
                <a href="https://github.com/PHPMailer/PHPMailer/"><img src="images/phpmailer.png" height="90" width="340" alt="PHPMailer rocks"></a>
              </div>-->
            <p>Olá, <strong><?php echo $_GET["username"]; ?></strong>:</p>
            <p>Por favor, utilize o seguinte link para redefinir a sua senha:</p>
            <h1><strong><?php echo $_GET["link_recovery_password"]; ?></strong></h1>
            
            <p>Se tiver qualquer dúvida, por favor nos escreva!</p>
            <p>Obrigado por usar os nossos serviços,</p>
            <p>DOORIG SYSTEM</p>
        </div>
    </body>
</html>
