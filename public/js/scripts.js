
$(document).ready(function(){/* jQuery toggle layout */


    // Ajax Status Post
    /* Status Post */
    $("#status_form").submit(function (event) {
        event.preventDefault();
        var url = $(this).attr("action");
        var data = $(this).serialize();

        console.log(data);
        $.ajax({
            url : url,
            type : "PUT",
            data : data,
            success : function(data){
                alert(data);
                console.log(data);
                //data = $.parseJSON(data);
                //$("#status_section").append($.each(data, function (key,value) {
                //    '<ul class="nav nav-pills list-inline">' +
                //    '<li>' +
                //    '<a href="{{ route("profileVisit", ['+ value.username +']) }}">' +
                //    '{!! Html::image('+ value.image_url +','+ value.image_name +' ["class"=>"img img-thumbnail img-responsive", "style"=>"height: 100px;"],) !!}' +
                //    '</a> ' +
                //    '</li>' +
                //    '<li style="margin-top: 2%;">' +
                //    '<span style="font-family: cursive,Lobster; font-weight: bold; color: #843534;">'+ value.status +'</span>' +
                //    '<br>' +
                //    '<div class="help-block">created at: ' + value.created_at +''
                //    '</li>' +
                //    '</ul>' +
                //    '<hr>'
                //}));
            },
            error : function(xhr, status, msg){
                console.log("ERROR: " + xhr.responseText());
            }
        });
    });

});


