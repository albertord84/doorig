$(document).ready(function(){   
    
    
    $('.sigin-painel-steep-2').height($('.sigin-painel-steep-1').height());
    $('.sigin-painel-steep-3').height($('.sigin-painel-steep-1').height());
    $('.sigin-painel-steep-4').height($('.sigin-painel-steep-1').height());
    $('.sigin-painel-steep-2').width($('.sigin-painel-steep-1').width());
    $('.sigin-painel-steep-3').width($('.sigin-painel-steep-1').width());
    $('.sigin-painel-steep-4').width($('.sigin-painel-steep-1').width());
    
    $("#btn-sigin-steep-1").click(function () {
        if(js_validate_datas_sigin_steep_1())
            if(send_datas_sigin_steep_1()){            
                $('.sigin-painel-steep-1').css({'display':'none','visibility': 'hidden','opacity': '0','transition':'visibility 0s, opacity 0.5s linear'});  
                $('.sigin-painel-steep-2').css({'display':'block','visibility': 'visible', 'opacity': '1'});            
            }
    });
    
    function js_validate_datas_sigin_steep_1(){
        //data validation
        var nome = validate_element("[name='nome']", "^[a-zA-Z0-9áÁéÉíÍóÓúÚàÀèÈìÌòÒùÙãÃõÕâÂêÊôÔûÛñ\._]{2,150}$");
        var email = validate_element("[name='email']", "^[a-zA-Z0-9\._-]+@([a-zA-Z0-9-]{2,}[.])*[a-zA-Z]{2,}$");
        var phone = validate_element("[name='phone']", "^[0-9]{8,20}$");
        var password = validate_element("[name='password']", "^[0-9]{6,50}$");
        var password_rep = validate_element("[name='password-rep']", "^[0-9]{6,50}$");
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
    
    
    function validate_element(element_selector,pattern){
        if(!$(element_selector).val().match(pattern)){
            $(element_selector).css("border", "1px solid red");
            return false;
        } else{
            $(element_selector).css("border", "1px solid gray");
            return true;
        }
    }
    
    function modal_alert_message(text_message){
        alert(text_message);
        //$('#modal_alert_message').modal('show');
        //$('#message_text').text(text_message);
    }
    
    $("#accept_modal_alert_message").click(function () {
        $('#modal_alert_message').modal('hide');
    });

    
    
 }); 