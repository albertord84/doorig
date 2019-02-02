$(document).ready(function(){ 
    
    //----------------LOG IN FUNCTIONS------------------------------
    $("#login_btn").click(function () {
        var email = validate_element("$email", "^[a-zA-Z0-9\._-]+@([a-zA-Z0-9-]{2,}[.])*[a-zA-Z]{2,}$");
        var password = validate_not_empty("#password");
        if(email && password){
            $.ajax({
                url : base_url+'index.php/signin/do_login',
                data :{ 
                        'email':$("#email").val(),
                        'password':$("#password").val(),
                    },
                type : 'POST',
                dataType : 'json',
                success : function(response){
                    if(response['success']){
                        url = base_url.replace("/doorig/", "/dashboard/");
                        $(location).attr('href', url+"?access_token="+response['access_token']);
                    } else
                        modal_alert_message(response['message']);
                    //l.stop();
                },
                error : function(xhr, status) {
                    modal_alert_message(T('Erro enviando a mensagem, tente depois...'));
                    //l.stop();
                    $("#subscription_email").val("");
                }
            });
        }
        else
            modal_alert_message('Erro nos dados fornecidos.');
        return false;
    });
    
    $("#request_recovery_pass_btn").click(function () {
        var email = validate_element("$email", "^[a-zA-Z0-9\._-]+@([a-zA-Z0-9-]{2,}[.])*[a-zA-Z]{2,}$");
        if(email){
            $.ajax({
                url : base_url+'index.php/signin/do_login',
                data :{ 
                        'email':$("#email").val(),
                        'password':$("#password").val(),
                    },
                type : 'POST',
                dataType : 'json',
                success : function(response){
                    if(response['success']){
                        url = base_url.replace("/doorig/", "/dashboard/");
                        $(location).attr('href', url+"?access_token="+response['access_token']);
                    } else
                        modal_alert_message(response['message']);
                    //l.stop();
                },
                error : function(xhr, status) {
                    modal_alert_message(T('Erro enviando a mensagem, tente depois...'));
                    //l.stop();
                    $("#subscription_email").val("");
                }
            });
        }
        else
            modal_alert_message('Erro nos dados fornecidos.');
        return false;
    });
    
    $("#lnk-forget-pass").click(function () {                   
        $('.form-login').css({'display':'none','visibility': 'hidden','opacity': '0','transition':'visibility 0s, opacity 0.5s linear'});  
        $('.form-forget-pass').css({'display':'block','visibility': 'visible', 'opacity': '1'});            
        return 0;
    });
    
    $("#lnk-back-to-login").click(function () {                
        $('.form-forget-pass').css({'display':'none','visibility': 'hidden','opacity': '0','transition':'visibility 0s, opacity 0.5s linear'});  
        $('.form-login').css({'display':'block','visibility': 'visible', 'opacity': '1'});            
        return 0;
    });
    
    $('.form-forget-pass').height($('.form-login').height());   
    
    
 }); 