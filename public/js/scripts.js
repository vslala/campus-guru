
$(document).ready(function(){/* jQuery toggle layout */

    base_url = "http://localhost/campusguru/public/";
    // Ajax Status Post
    /* Status Post */
    $("#status_form").submit(function (event) {
        event.preventDefault();

        var url = $(this).attr("action");
        var data = $(this).serialize();
        var statusSection = $("#status_section");
        $(statusSection).html("<img src='http://www.ajaxload.info/images/exemples/25.gif' >");
        //var imgLocation = "http://localhost/campusguru/public/";
        console.log(data);
        $.ajax({
            url : url,
            type : "PUT",
            data : data,
            success : function(data){
                console.log(data);
                data = $.parseJSON(data);
                console.log(data[0]['username']);
                $(statusSection).empty();
                for(var i=0; i < data.length; i++)
                {

                    $(statusSection).append(
                        '<ul class="nav nav-pills list-inline">' +
                        '<li>' +
                        '<a href="{{ route("profileVisit", ['+ data[i]['username'] +']) }}">' +
                        '<img src="'+ data[i]['image_url'] +'" alt="'+ data[i]['image_name'] +'" class="img img-thumbnail img-responsive", style="height: 100px;"],) !!}' +
                        '</a> ' +
                        '</li>' +
                        '<li style="margin-top: 2%;">' +
                        '<span style="font-family: cursive,Lobster; font-weight: bold; color: #843534;">'+ data[i]['status'] +'</span>' +
                        '<br>' +
                        '<div class="help-block">created at: ' + data[i]['created_at'] +''+
                    '</li>' +
                    '</ul>' +
                    '<hr>'
                );
                }

            },
            error : function(xhr, status, msg){
                console.log("ERROR: " + xhr.responseText());
            }
        });
    });

    // Random jokes generator
    $("#quote").append("<img src='http://www.ajaxload.info/images/exemples/25.gif' >");
    setInterval(function(){
        $("#quote").append("<img src='http://www.ajaxload.info/images/exemples/25.gif' >");
        $.ajax({
            url: "http://api.icndb.com/jokes/random",
            type: "GET",
            success: function (data) {

                //data = $.parseJSON(data);
                $("#quote").html(data.value['joke'] + "<br>" + "<span class='help-block'>#" + data.value['id'] + "</span><br>");
                //console.log(data.value['id']);
            }
        });
    }, 20000);

    // Top 5 Questions with images ajax
    setInterval(function(){
        var list_of_questions = $("#list_of_questions");
        $(list_of_questions).html("<img src='http://www.ajaxload.info/images/exemples/25.gif' >");
        var url = $("#fetchQuestionUrl").val();

        $.ajax({
            url : url,
            type : "GET",
            success : function(data){
                data = $.parseJSON(data);
                $(list_of_questions).empty();
                $.each(data, function (key,value) {
                    $(list_of_questions).append("<a style='font-family: cursive,Lobster; " +
                    "font-weight: bold; color: #843534;' class='list-group-item' " +
                    "href='"+ base_url +"/user/show/question/"+ value.id +"'>" +
                    "<img class='img img-responsive img-thumbnail' " +
                    "style='width: 50px;' " +
                    "src='"+base_url+value.image_url+"'>"+ value.title +"" +
                    "<span class='glyphicon glyphicon-question-sign'></span>" +
                    "</a>");
                    //console.log(value.id + ":" + value.title);
                });

            },
            error : function(xhr,status,msg){
                alert("ERROR: We are working on it!");
            }
        });
    }, 60000);

    // Top 5 Discussions with images ajax
    setInterval(function(){
        var list_of_discussions = $("#list_of_discussions");
        $(list_of_discussions).html("<img src='http://www.ajaxload.info/images/exemples/25.gif' >");
        var url = $("#fetchDiscussionUrl").val();

        $.ajax({
            url : url,
            type : "GET",
            success : function(data){
                data = $.parseJSON(data);
                $(list_of_discussions).empty();
                $.each(data, function (key,value) {
                    $(list_of_discussions).append("<a style='font-family: cursive,Lobster; " +
                    "font-weight: bold; color: #843534;' class='list-group-item' " +
                    "href='"+ base_url +"/user/show/question/"+ value.id +"'>" +
                    "<img class='img img-responsive img-thumbnail' " +
                    "style='width: 50px;' " +
                    "src='"+base_url+value.image_url+"'>"+ value.title +"" +
                    "<span class='glyphicon glyphicon-question-sign'></span>" +
                    "</a>");
                    //console.log(value.id + ":" + value.title);
                });

            },
            error : function(xhr,status,msg){
                alert("ERROR: We are working on it!");
            }
        });
    }, 60000);


});


