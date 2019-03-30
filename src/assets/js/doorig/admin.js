$(document).ready(function(){
    //----------------LOGIN FUNCTIONS------------------------------
    $("#filter_btn").click(function () {
        $.ajax({
            url : base_url+'index.php/admin/run_filter',
            data :{ 
                    'token':$("#token").val(),
                    'init_date':$("#init_date").val(),
                    'end_date':$("#end_date").val(),
                    'status':$("#status").val(),                    
                },
            type : 'POST',
            dataType : 'json',
            success : function(response){
                //spinner_stop(btn);
                if(response.code===0){
                    $("#list_container").html(JSON.stringify(response.array_object));
                    //modal_alert_message("Todo ok!!!"); 
                    //$(location).attr('href', response.DashboardUrl+"welcome/index/"+response.LoginToken);
                } else
                    modal_alert_message(response.message);                    
            },
            error : function(xhr, status) {
                //spinner_stop(btn);
                modal_alert_message(T('Erro enviando a mensagem, tente depois...'));                    
            }
        });



        /*if(email && password){
            var btn =this; spinner_start(btn);
            $.ajax({
                url : base_url+'index.php/signin/do_login',
                data :{ 
                        'email':$("#login_email").val(),
                        'password':$("#login_pass").val(),
                    },
                type : 'POST',
                dataType : 'json',
                success : function(response){
                    spinner_stop(btn);
                    if(response.code===0){
                        $(location).attr('href', response.DashboardUrl+"welcome/index/"+response.LoginToken);
                    } else
                        modal_alert_message(response.message);                    
                },
                error : function(xhr, status) {
                    spinner_stop(btn);
                    modal_alert_message(T('Erro enviando a mensagem, tente depois...'));                    
                }
            });
        }
        else
            modal_alert_message('Erro nos dados fornecidos.');*/
        return false;
    });
       
 }); 
