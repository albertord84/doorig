$(document).ready(function(){
    
    function init(){
        $("#name").val("Jose Ramon");
        $("#email").val("josergm86@gmail.com");
        $("#phone").val("(21) 96591-3089");
        $("#password").val("cba");
        $("#password-rep").val("cba");
    }
    init();
    
    //----------------SIGN IN FUNCTIONS------------------------------    
    $("#btn-sigin-steep-1").click(function () {
        if(js_validate_datas_sigin_steep_1()){
            $.ajax({
                url : base_url+'index.php/signin/signin_step1',
                data :{ 'name':$("#name").val(),
                        'email':$("#email").val(),
                        'phone':$("#phone").val(),
                        'password':$("#password").val(),
                        'password-rep':$("#password-rep").val()
                    },
                type : 'POST',
                dataType : 'json',
                success : function(response){
                    if(response.code===0){
                        $('.sigin-painel-steep-1').css({'display':'none','visibility': 'hidden','opacity': '0','transition':'visibility 0s, opacity 0.5s linear'});  
                        $('.sigin-painel-steep-2').css({'display':'block','visibility': 'visible', 'opacity': '1'});            
                    } else
                        modal_alert_message(response.message);
                    //l.stop();                    
                },
                error : function(xhr, status) {
                    modal_alert_message(T('Erro enviando a mensagem, tente depois...'));
                    //l.stop();                                    
                }
            });
        }
    });
    
    function js_validate_datas_sigin_steep_1(){//data validation        
        var nome = validate_element("#name", complete_name_regular_expression);
        var email = validate_element("#email", email_regular_expression);
        var password = validate_not_empty("#password");
        var password_rep = validate_equals("#password","#password-rep");        
        var user_term = $("#user-term").is(':checked'); 
        if(nome && email && phone && password)
            if(password_rep)
                if(user_term)
                    return true;
                else
                    modal_alert_message('Deve ler e concordar com os Termos de Uso.');
            else
                modal_alert_message('As senhas não coincidem.');        
        else
            modal_alert_message('Erro nos dados fornecidos, por favor, confira.');
        return false;
    }
       
    
    $("#btn-sigin-steep-2a").click(function () {
        $.ajax({
            url : base_url+'index.php/signin/request_secure_code_by_email',
            data :{},
            type : 'POST',
            dataType : 'json',
            success : function(response){
                if(response.code===0){
                    $('.sigin-painel-steep-2').css({'display':'none','visibility': 'hidden','opacity': '0','transition':'visibility 0s, opacity 0.5s linear'});  
                    $('.sigin-painel-steep-3').css({'display':'block','visibility': 'visible', 'opacity': '1'});            
                } else
                    modal_alert_message(response.message);
                //l.stop();                    
            },
            error : function(xhr, status) {
                modal_alert_message(T('Erro enviando a mensagem, tente depois...'));
                //l.stop();                                    
            }
        });
    });
    
    $("#btn-sigin-steep-2b").click(function () {
        $.ajax({
            url : base_url+'index.php/signin/request_secure_code_by_sms',
            data :{},
            type : 'POST',
            dataType : 'json',
            success : function(response){
                if(response.code===0){
                    $('.sigin-painel-steep-2').css({'display':'none','visibility': 'hidden','opacity': '0','transition':'visibility 0s, opacity 0.5s linear'});  
                    $('.sigin-painel-steep-3').css({'display':'block','visibility': 'visible', 'opacity': '1'});            
                } else
                    modal_alert_message(response.message);
                //l.stop();                    
            },
            error : function(xhr, status) {
                modal_alert_message(T('Erro enviando a mensagem, tente depois...'));
                //l.stop();                                    
            }
        });
    });
    
    $("#btn-sigin-steep-3").click(function () {
        var verification_code = validate_element("#verification_code", verification_code_regular_expression);
        if(verification_code){
            $.ajax({
                url : base_url+'index.php/signin/confirm_secure_code',
                data :{
                    'verification_code':$("#verification_code").val()
                },
                type : 'POST',
                dataType : 'json',
                success : function(response){
                    if(response.code===0){
                        $(location).attr('href', 'http://stackoverflow.com')
                        alert(response.LoginToken);
                    } else
                        modal_alert_message(response.message);
                    //l.stop();                    
                },
                error : function(xhr, status) {
                    modal_alert_message(T('Erro enviando a mensagem, tente depois...'));
                    //l.stop();                                    
                }
            });
        }else{
            modal_alert_message('Código de validação inválido');
        }        
    });

    $("#subscription_btn").click(function(){
        email=validate_element('#subscription_email', email_regular_expression);
        if(email){
            //var l = Ladda.create(this);  l.start(); l.start();
            $.ajax({
                url : base_url+'index.php/welcome/subscription',
                data :{ 
                        'subscription_email':$("#subscription_email").val(),
                    },
                type : 'POST',
                dataType : 'json',
                success : function(response){
                    if(response.code===0){                        
                        modal_success_message(response['message']);                        
                        $("#subscription_email").val("");
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
        } else{
            modal_alert_message(T('Alguns dados incorretos'));            
        }                             
    });        
        
    $('.sigin-painel-steep-2').height($('.sigin-painel-steep-1').height());
    $('.sigin-painel-steep-3').height($('.sigin-painel-steep-1').height());
    $('.sigin-painel-steep-4').height($('.sigin-painel-steep-1').height());
    $('.sigin-painel-steep-2').width($('.sigin-painel-steep-1').width());
    $('.sigin-painel-steep-3').width($('.sigin-painel-steep-1').width());
    $('.sigin-painel-steep-4').width($('.sigin-painel-steep-1').width());
    
    
    
    //----------------LOGIN FUNCTIONS------------------------------
    $("#login_btn").click(function () {
        var email = validate_element("#login_email", email_regular_expression);
        var password = validate_not_empty("#login_pass");
        if(email && password){
            $.ajax({
                url : base_url+'index.php/signin/do_login',
                data :{ 
                        'email':$("#login_email").val(),
                        'password':$("#login_pass").val(),
                    },
                type : 'POST',
                dataType : 'json',
                success : function(response){
                    if(response.code===0){
                        $(location).attr('href', URL_DASHBOARD+"?access_token="+response['access_token']);
                    } else
                        modal_alert_message(response['message']);
                    //l.stop();
                },
                error : function(xhr, status) {
                    modal_alert_message(T('Erro enviando a mensagem, tente depois...'));
                    //l.stop();
                }
            });
        }
        else
            modal_alert_message('Erro nos dados fornecidos.');
        return false;
    });
    
    $("#request_recovery_pass_btn").click(function () {
        var email = validate_element("#recovery_email", email_regular_expression);
        if(email){
            $.ajax({
                url : base_url+'index.php/signin/',
                data :{ 
                        'email':$("#recovery_email").val()
                    },
                type : 'POST',
                dataType : 'json',
                success : function(response){
                    if(response.code===0){
                        modal_success_message(response.message);
                    } else
                        modal_alert_message(response.message);
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
