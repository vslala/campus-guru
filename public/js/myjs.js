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



});