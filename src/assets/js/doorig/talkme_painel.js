$(document).ready(function(){
    $("#contact_btn").click(function(){
        //$(this).children("i").css({"display":"none","visibility":"hidden"}); return false;
        email=validate_element('#contact_email',email_regular_expression);
        name=validate_not_empty('#contact_name');
        message=validate_not_empty('#contact_message');
          if(name && email && message){
            var btn =this; spinner_start(btn);
            $.ajax({
                url : base_url+'index.php/welcome/contact_us',
                data :{ 'username':$("#contact_name").val(),
                        'company':$("#contact_job").val(),
                        'email':$("#contact_email").val(),
                        'phone':$("#contact_phone").val(),
                        'message':$("#contact_message").val()
                    },
                type : 'POST',
                dataType : 'json',
                success : function(response){
                    spinner_stop(btn);
                    if(response.code===0){
                        modal_success_message(response['message']);                        
                    } else
                        modal_alert_message(response['message']);    
                    $("#contact_name").val("");
                    $("#contact_job").val("");
                    $("#contact_email").val("");
                    $("#contact_phone").val("");
                    $("#contact_message").val(""); 
                },
                error : function(xhr, status) {
                    spinner_stop(btn);
                    modal_alert_message(T('Erro enviando a mensagem, tente depois...'));
                    $("#contact_name").val("");
                    $("#contact_job").val("");
                    $("#contact_email").val("");
                    $("#contact_phone").val("");
                    $("#contact_message").val("");
                }                
            });
        } else{
            modal_alert_message(T('Alguns dados incorretos'));            
        }                             
    });        
              
    $('#contact_form').keypress(function (e) {
        if (e.which == 13) {
            $("#contact_btn").click();
            return false;
        }
    });       
    
 }); 
