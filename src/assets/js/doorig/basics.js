$(document).ready(function(){  
    
    function validate_element(element_selector,pattern){
        if(!$(element_selector).val().match(pattern)){
            $(element_selector).css("border", "1px solid red");
            return false;
        } else{
            $(element_selector).css("border", "1px solid gray");
            return true;
        }
    } 
        
    function validate_not_empty(element_selector){
        if($(element_selector).val().trim()==""){
            $(element_selector).css("border", "1px solid red");
            return false;
        } else{
            $(element_selector).css("border", "1px solid gray");
            return true;
        }
    }
    
    function modal_alert_message(text_message){
        $('#modal_alert_message').modal('show');
        $('#alert_message_text').text(text_message);        
    }
    
    $("#accept_modal_alert_message").click(function () {
        $('#modal_alert_message').modal('hide');
    });
    
    function modal_success_message(text_message){
        $('#modal_success_message').modal('show');
        $('#success_message_text').text(text_message);        
    }
    
    $("#accept_modal_success_message").click(function () {
        $('#modal_success_message').modal('hide');
    });
    
 }); 