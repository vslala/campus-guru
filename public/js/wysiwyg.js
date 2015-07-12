$(document).ready(function(){
    $('#text_editor').wrap("<div id='wrapper' class='wrapper'></div>");
    $('#wrapper').prepend('<div class="button-group">'+
                        '<button id="bold_btn" type="button" onclick="iBold()" class="btn btn-default"><span class="glyphicon glyphicon-bold"></span></button>'+
                        '<button id="italic_btn" type="button" onclick="iItalic()" class="btn btn-default"><span class="glyphicon glyphicon-italic"></span></button>'+
                        '<button id="u_btn" type="button" onclick="iUnderline()" class="btn btn-default"><b><u>U</u></b></button>'+
                        '<button id="color_btn" type="button" onclick="iColor()" class="btn btn-default"><span class="glyphicon glyphicon-text-color"></span></button>'+
                        '<button id="font_btn" type="button" onclick="iFontSize()" class="btn btn-default"><b>Font Size</b></button>'+
                        '<button id="create_link_btn" type="button" onclick="createLink()" class="btn btn-default"><b>Create Link</b></button>'+
                        '<button id="unlink_btn" type="button" onclick="iUnlink()" class="btn btn-default"><b>Unlink</b></button>'+
                        '<button id="insert_image_btn" type="button" onclick="insertImage()" class="btn btn-default"><span class="glyphicon glyphicon-picture"></span></button>'+
                        '<button id="Preview" type="button" onclick="parseText()" class="btn btn-default">Preview</button>'+
                        '<button id="source_btn" type="button" onclick="getIframeLink()" class="btn btn-default"><span class="glyphicon glyphicon-play"></span> Source</button>'+
                    '</div>');
    $('#wrapper').append('<iframe id="richTextField" class="iframe"></iframe>');
    $('#wrapper').append('<div class="output-div" id="output_div"><b>Preview Window</b></div>');

    ////When the source button is clicked
    //$('body').on('click', "#source_btn", function(event){
    //    event.preventDefault();
    //
    //    $("#text_editor").toggle();
    //    parseTextFromIFrameAndSetTextInTextArea();
    //});
    ////When textarea is brought to the focus and to bind the real time text to iframe
    //$('#text_editor').focus(function(){
    //    var $this = $(this);
    //
    //    $this.keyup(function(){
    //        $('#richTextField').contents().find('body').html($this.val());
    //    });
    //});
    ////When something is being written in iframe will be inserted to textarea real time.
    //$('body', $('#richTextField').contents()).keyup(function(){
    //    var text = $('#richTextField').contents().find('body').html();
    //    $('#text_editor').val(text);
    //})
})

window.onload = function() {
    iframe = document.getElementById('richTextField');
    iframe.contentWindow.document.designMode = "on";
};

function iBold(){
	var iframe = document.getElementById('richTextField');
    iframe.contentWindow.document.execCommand('bold',false,null);
}

function iItalic(){
    iframe.contentWindow.document.execCommand('italic', false, null);
}

function iUnderline(){
    iframe.contentWindow.document.execCommand('underline', false, null);
}

function iColor(){
    var color = prompt("FONT COLOR: Enter the name of the color or the hexadecimal code for it.",' ');
    iframe.contentWindow.document.execCommand('foreColor', false, color);
}

function iFontSize(){
    var size = prompt("FONT SIZE: Enter the font size between (1-7)");
    iframe.contentWindow.document.execCommand('fontSize', false, size);
}

function insertImage(){
    var img = prompt("IMAGE URL: Enter the location for the image", 'http://');
    iframe.contentWindow.document.execCommand('insertImage', false, img);
}

function createLink(){
    var link = prompt("Enter the url to create a link", 'http://');
    iframe.contentWindow.document.execCommand('CreateLink', false, link);
}

function iUnlink(){
    iframe.contentWindow.document.execCommand('Unlink', false, null);
}

function parseText(){
    var text = document.getElementById('richTextField').contentWindow.document.body.innerHTML;
    $('#text_editor').val(text);
    $('#output_div').html(text);
}

function parseTextFromIFrameAndSetTextInTextArea(){
    var text = document.getElementById('richTextField').contentWindow.document.body.innerHTML;
    document.getElementById('text_editor').value = text;
}

function parseTextFromIFrameBodyAndSetItToTextArea(){
    var text = $('#richTextField').contents().find('body').html();
    alert(text);
}

function getIframeLink(){
    var videoLink = prompt("Enter the url for the You tube video.");
    videoLink = videoLink.split("/");
    videoLink = videoLink[videoLink.length - 1];
    var h = 315;
    var w = 560;
    var xiframe = '<iframe width="'+w+'" height="'+h+'" src="https://www.youtube.com/embed/'+ videoLink +'" frameborder="0" allowfullscreen></iframe>';
    var bodyIframe = $('#richTextField').contents().find('body');
    var bodyText = bodyIframe.html();
    bodyText += '<br>'+xiframe;
    bodyIframe.html(bodyText);
}