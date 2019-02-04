$(document).ready(function(){
    
    //----------------SIGN IN FUNCTIONS------------------------------    
    $("#btn-sigin-steep-1").click(function () {
        if(js_validate_datas_sigin_steep_1())
            if(send_datas_sigin_steep_1()){            
                $('.sigin-painel-steep-1').css({'display':'none','visibility': 'hidden','opacity': '0','transition':'visibility 0s, opacity 0.5s linear'});  
                $('.sigin-painel-steep-2').css({'display':'block','visibility': 'visible', 'opacity': '1'});            
            }
    });
    
    function js_validate_datas_sigin_steep_1(){
        //data validation
        var nome = validate_element("#name", "^[a-zA-Z0-9áÁéÉíÍóÓúÚàÀèÈìÌòÒùÙãÃõÕâÂêÊôÔûÛñ\._]{2,150}$");
        var email = validate_element("$email", "^[a-zA-Z0-9\._-]+@([a-zA-Z0-9-]{2,}[.])*[a-zA-Z]{2,}$");
        var phone = validate_element("#phone", "^[0-9]{8,20}$");
        var password = validate_not_empty("#password");
        var password_rep = validate_not_empty("#password-rep");
        if(nome && email && phone && password && password_rep)
            if(password === password_rep)
                return true;
            else
                modal_alert_message('As senhas não coincidem.');
        else
            modal_alert_message('Erro nos dados fornecidos, por favor, confira.');
        return false;
    }
    
    function send_datas_sigin_steep_1(){
        return true;
    }
    
    $("#btn-sigin-steep-2a").click(function () {
        if(js_validate_datas_sigin_steep_1())
            if(send_datas_sigin_steep_1()){            
                $('.sigin-painel-steep-2').css({'display':'none','visibility': 'hidden','opacity': '0','transition':'visibility 0s, opacity 0.5s linear'});  
                $('.sigin-painel-steep-3').css({'display':'block','visibility': 'visible', 'opacity': '1'});            
            }
    });
    
    $("#btn-sigin-steep-2b").click(function () {
        if(js_validate_datas_sigin_steep_1())
            if(send_datas_sigin_steep_1()){            
                $('.sigin-painel-steep-2').css({'display':'none','visibility': 'hidden','opacity': '0','transition':'visibility 0s, opacity 0.5s linear'});  
                $('.sigin-painel-steep-3').css({'display':'block','visibility': 'visible', 'opacity': '1'});            
            }
    });
    
    $("#btn-sigin-steep-3").click(function () {
        if(js_validate_datas_sigin_steep_1())
            if(send_datas_sigin_steep_1()){            
                $('.sigin-painel-steep-3').css({'display':'none','visibility': 'hidden','opacity': '0','transition':'visibility 0s, opacity 0.5s linear'});  
                $('.sigin-painel-steep-4').css({'display':'block','visibility': 'visible', 'opacity': '1'});            
            }
    });        
        
    $('.sigin-painel-steep-2').height($('.sigin-painel-steep-1').height());
    $('.sigin-painel-steep-3').height($('.sigin-painel-steep-1').height());
    $('.sigin-painel-steep-4').height($('.sigin-painel-steep-1').height());
    $('.sigin-painel-steep-2').width($('.sigin-painel-steep-1').width());
    $('.sigin-painel-steep-3').width($('.sigin-painel-steep-1').width());
    $('.sigin-painel-steep-4').width($('.sigin-painel-steep-1').width());
    
 }); 