
$(document).ready(function(){
    //----------------?------------------------------
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
              // loadData with custom filter
              $("#staticgrid").jsGrid({
                data: response.array_object
              });
              $("#staticgrid").jsGrid("refresh");
            } 
            else
              modal_alert_message(response.message);                    
          },
          error : function(xhr, status) {
            spinner_stop(btn);
            modal_alert_message(T('Erro enviando a mensagem, tente depois...'));                    
          }
      });
      return false;
    }); 
 }); 
 
 !function(document, window, $) {
   $("#staticgrid").jsGrid({
        height: "500px",
        width: "100%",
        sorting: !0,
        paging: !0,
        fields: [{
            name: "id",
            type: "text",
            visible: false
        },{
            name: "name",
            type: "text",
            title: "Cliente",
            width: 100
        }, {
            name: "email",
            type: "number",
            title: "Email",
            width: 100
        }, {
            name: "Address",
            type: "text",
            width: 200
        }, /*{
            name: "Country",
            type: "select",
            //items: db.countries,
            valueField: "Id",
            textField: "Name"
        },*/ {
            name: "Married",
            type: "checkbox",
            title: "Is Married"
        }]
    });

 }(document, window, jQuery);
 
