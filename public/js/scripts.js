
$(document).ready(function(){/* jQuery toggle layout */

    base_url = "http://localhost/campusguru/public/";
    load_img = '<img src="http://www.ajaxload.info/images/exemples/25.gif" >';
    // Ajax Status Post
    /* Status Post */
    $("#status_form").submit(function (event) {
        event.preventDefault();
        var url = $(this).attr("action");
        var data = $(this).serialize();
        if(data == "" || data == null){ return; }
        var updateLikeStatusLink = $("#statusLike").attr("href");
        var updateDislikeStatusLink = $("#statusDislike").attr("href");
        var statusSection = $("#status_section");
        $(statusSection).html(load_img);
        //var imgLocation = "http://localhost/campusguru/public/";
        console.log(data);
        $.ajax({
            url : url,
            type : "PUT",
            data : data,
            success : function(data){
                //console.log(data);
                data = $.parseJSON(data);
                console.log(data);
                //console.log(data[0]['username']);
                $(statusSection).empty();
                for(var i=0; i < data.length; i++)
                {
                    if(data[i]['likeCount'] == null)
                    {
                        data[i]['likeCount'] = 0;
                    }
                    if(data[i]['dislikeCount'] == null || data[i]['dislikeCount'] == '')
                    {
                        data[i]['dislikeCount'] == 0;
                    }
                    $(statusSection).append(
                        '<ul class="nav nav-pills list-inline">' +
                        '<li>' +
                        '<a href="'+ base_url +'/user/profile/visit/'+ data[i]['username'] +'">' +
                        '<img src="'+ data[i]['image_url'] +'" alt="'+ data[i]['image_name'] +'" class="img img-thumbnail img-responsive", style="height: 100px;"],) !!}' +
                        '</a> ' +
                        '</li>' +
                        '<li style="margin-top: 2%;">' +
                        '<span style="font-family: cursive,Lobster; font-weight: bold; color: #843534;">'+ data[i]['status'] +'</span>' +
                        '<br>' +
                        '<div class="help-block">created at: ' + data[i]['created_at'] +''+
                    '</li>' +
                        '<br>' +
                        '<li>' +
                        '<ul class="list-inline">' +
                        '<a href="'+ updateLikeStatusLink +'class="inline" id="statusLike">' +
                        '<span class="badge">'+ data[i]['likeCount'] +'</span>' +
                        '<span class="glyphicon glyphicon-thumbs-up"></span>' +
                        '</a>' +
                        '<a href="'+ updateDislikeStatusLink +'class="inline" id="statusDislike">' +
                        '<span class="badge">'+ data[i]['dislikeCount'] +'</span>' +
                        '<span class="glyphicon glyphicon-thumbs-down"></span>' +
                        '</a>' +
                        '</ul>' +
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
    $("#quote").append(load_img);
    setInterval(function(){
        $("#quote").append(load_img);
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
        $(list_of_questions).html(load_img);
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
        $(list_of_discussions).html(load_img);
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
                    "<span class='glyphicon glyphicon-cloud'></span>" +
                    "</a>");
                    //console.log(value.id + ":" + value.title);
                });

            },
            error : function(xhr,status,msg){
                alert("ERROR: We are working on it!");
            }
        });
    }, 60000);

    /*
    status like count incrementer
     */
    $("body").on("click", "#statusLike", function (event) {
        event.preventDefault();
        var url = $(this).attr('href');
        var badge = $(this).find('.badge');
        console.log(url);

        $.ajax({
            url : url,
            type : "GET",
            success : function(data){
                $(badge).html(data);
                console.log(data);
            },
            error : function(xhr,status,msg){
                alert("ERROR: "+ xhr.responseText);
            }
        });
    });

    /*
     status dislike count incrementer
     */
    $("body").on("click", "#statusDislike", function (event) {
        event.preventDefault();
        var url = $(this).attr('href');
        var badge = $(this).find('.badge');
        console.log(url);

        $.ajax({
            url : url,
            type : "GET",
            success : function(data){
                $(badge).html(data);
                console.log(data);
            },
            error : function(xhr,status,msg){
                alert("ERROR: "+ xhr.responseText);
            }
        });
    });

    /*
    Most Liked Status Fetch
     */
    setInterval(function () {
        var mostLikedStatus = $("#most_liked_status");
        var url = $("#mostLikedStatusUrl").val();
        $(mostLikedStatus).html(load_img);
        $.ajax({
            url : url,
            type : "GET",
            success : function(data){
                data = $.parseJSON(data);
                $(mostLikedStatus).html(data[0]['status'] + '<br>' + '' +
                '<a class="active btn btn-primary btn-sm"><span class="badge">'+ data[0]['likeCount'] +'</span></a>' +
                '' +
                    '  |  ' +
                    '<a class="active btn btn-danger btn-sm"><span class="badge badge-primary">'+ data[0]['dislikeCount'] +'</span></a>' +
                    ''
                );
            },
            error : function(xhr, status, msg){
                console.log("ERROR: "+ xhr.responseText);
            }
        });
    }, 60000);

    /*
     Most Liked Display Picture Fetch
     */
    setInterval(function () {
        var mostLikedImage = $("#most_liked_picture");
        var url = $("#mostLikedImageUrl").val();
        console.log(url);
        $(mostLikedImage).html(load_img);
        $.ajax({
            url : url,
            type : "GET",
            success : function(data){
                data = $.parseJSON(data);
                $(mostLikedImage).html('<img src="'+ base_url+ data[0].image_url +'" class="img img-responsive img-thumbnail" />    <br>' +
                    '<a class="active btn btn-primary btn-sm"><span class="badge">'+ data[0].likeCount +'</span></a>'
                );
            },
            error : function(xhr, status, msg){
                console.log("ERROR: "+ xhr.responseText);
            }
        });
    }, 60000);

    /*
    Search VIA username at the _top-nav
     */
    $("#srch-term").keyup(function(){
        $("#submitBtn").click();
    });
    $("#searchForm").submit(function(event){
        event.preventDefault();
        var searchResult = $("#search_result");
        var url = $(this).attr("action");
        var data = $(this).serialize();
        //if(data == "" || data == null){
        //    return;
        //}
        console.log(url);

        $.ajax({
            url : url,
            type : "PUT",
            data : data,
            success : function(data){
                data = $.parseJSON(data);
                if(data == null || data.length <= 0)
                {
                    $(searchResult).next().remove();
                } else {
                    $.each(data, function (key, value) {
                        $(searchResult).html('<a style="text-decoration: none;" href="'+ base_url +'user/profile/visit/'+ value.username +'">' +
                            '<li class="list-group-item">' +
                            '<span class="glyphicon glyphicon-user"></span>' +
                            '<span style="font-family: cursive, Lobster;' +
                            'font-weight: bolder; font-size: large; color: black;">' +
                            value.username+
                            '</span>' +
                            '</li>' +
                            '</a>'
                        );
                    })

                }


            },
            error : function(xhr,status,msg){
                console.log("ERROR: "+ xhr.responseText);
            }
        });

        return false;
    });

    /*
    Fade message div
     */
    $("#message_div").fadeOut(5000);
    ///*
    //Send message form ajax
    // */
    //$("#message_form").submit(function(event){
    //    event.preventDefault();
    //    var url = $(this).attr("action");
    //    var data = $(this).serialize();
    //
    //    $.ajax({
    //        url : url,
    //        data : data,
    //        type : "POST",
    //        success : function (data){
    //            window.location.reload();
    //        },
    //        error : function(xhr,status,msg){
    //            alert("ERROR: "+ xhr.responseText);
    //        }
    //    });
    //});

    /*
    Form Validation plugin from jquery for User Registeration Form
     */
    $('#reg_form').validate({
        rules: {
            name: {
              required : true
            },
            username: {
                required: true
            },
            email: {
                required: true,
                email: true
            },
            password: {
                required: true
            },
            branch: {
                required: true
            },
            college: {
                required: true,
                minlength: 3
            }
        },
        highlight: function(element) {
            $(element).closest('.form-group').addClass('has-error');
        },
        unhighlight: function(element) {
            $(element).closest('.form-group').removeClass('has-error');
        },
        errorElement: 'span',
        errorClass: 'help-block',
        errorPlacement: function(error, element) {
            if(element.parent('.input-group').length) {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        }


    });

    /*
     Form Validation plugin from jquery for Ask Question Form
     */
    $('#ask_question').validate({
        rules: {
            title: {
                required : true,
                minlength : 10
            },
            tags: {
                required: true,
                minlength : 3
            },
            content: {
                required: true,
                minlength: 20,
                maxlength: 3000
            }
        },
        highlight: function(element) {
            $(element).closest('.form-group').addClass('has-error');
        },
        unhighlight: function(element) {
            $(element).closest('.form-group').removeClass('has-error');
        },
        errorElement: 'span',
        errorClass: 'help-block',
        errorPlacement: function(error, element) {
            if(element.parent('.input-group').length) {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        }


    });




});
/*
 Form Validation plugin from jquery for Status Form
 */
var validateStatusForm = $('#status_form').validate({
    rules: {
        status: {
            required : true
        }
    },
    highlight: function(element) {
        $(element).closest('.form-group').addClass('has-error');
    },
    unhighlight: function(element) {
        $(element).closest('.form-group').removeClass('has-error');
    },
    errorElement: 'span',
    errorClass: 'help-block',
    errorPlacement: function(error, element) {
        if(element.parent('.input-group').length) {
            error.insertAfter(element.parent());
        } else {
            error.insertAfter(element);
        }
    }


});

