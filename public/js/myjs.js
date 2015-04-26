$(document).ready(function(){
    //console.log("myjs is linked properly");

   $(".content").hover(function(){
       $("#click_here").toggle(500);
   });

    $("a").click(function(event){
        if(this.hash)
        {
            var hash = this.hash.substr(1);
            var $toElement = $("a[name=" + hash + "]");
            var toPosition = $toElement.position().top;
            $("body,html").animate({
                scrollTop : toPosition

            },2000,"easeOutExpo");

            //console.log(toPosition);
            return false;
        }

        if(location.hash)
        {
            var hash = location.hash;
            window.scroll(0,0);
            console.log(hash);
            $("a[name=" + hash + "]").click();
        }
    })

    $("#name_input").focus(function(){
        $("#help_block").toggle(200);
    });

    //$('form').submit( function (event) {
    //    //alert();
    //   event.preventDefault();
    //    var url = $(this).attr('action');
    //    var data = $(this).serialize();
    //    var image = $(this).parent().siblings().find("#image");
    //    var answer = $(this).parent().siblings().find("#answer");
    //
    //    console.log($(image).attr('class'));
    //    $.ajax({
    //        url : url,
    //        type : "put",
    //        data : data,
    //        success : function(data){
    //            data = $.parseJSON(data);
    //            $(image).empty();
    //            $(image).append("<a href='' <img class='img img-responsive img-thumbnail' src='http://localhost/campusguru/public/" + data.imageUrl + "'>");
    //            $(answer).append("<p>" + data.answer +"</p>")
    //            //$(image).html(data.image_url);
    //            console.log(data);
    //        },
    //        error: function(xhr,status,msg){
    //            alert("ERROR: "+ xhr.responseText);
    //        }
    //    })
    //});

    /**
     * like counter
     */
    $('body').on("click","#likeBtn", function (event) {
        event.preventDefault();
        var url = $(this).attr("href");
        var badge = $(this).find("#likeCount");
        $.ajax({
            url : url,
            type : "GET",
            success : function(data)
            {
                $(badge).html(data);
            },
            error : function(xhr,status,msg)
            {
                alert("ERROR: " + xhr.responseText);
            }
        })
    });
    /**
     * dislike counter
     */
    $('body').on("click","#dislikeBtn", function (event) {
        event.preventDefault();
        var url = $(this).attr("href");
        var badge = $(this).find("#dislikeCount");

        $.ajax({
            url : url,
            type : "GET",
            success : function(data)
            {
                $(badge).html(data);
            },
            error : function(xhr,status,msg)
            {
                alert("ERROR: " + xhr.responseText);
            }
        })
    });

    /*
    Complain & Confession Report Abuse Ajax Delete
     */
    $("body").on("click", "#report_abuse", function (event) {
        event.preventDefault();
        var url = $(this).attr("href");
        var parent = $(this).parents("li");
        //console.log($(parent).attr("class"));

        $.ajax({
            url : url,
            type : "GET",
            success : function(data){
                console.log(data.message);
                alert(data.message);
                $(parent).remove();
            },
            error : function(xhr,status,msg){
                console.log("ERROR: "+ xhr.responseText);
            }
        });
    });


    /*
    Fade the message span
     */
    $("#message").fadeOut(5000);
});