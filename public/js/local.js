function ModalWindow() {
    var window = $('#modal_form');

    if ((window).is(':visible')) {
        $(window).animate({opacity: 0, top: '45%'}, 200,
            function () {
                $(this).css('display', 'none');
                $('#overlay').fadeOut(400);
            }
        );
    } else {
        $('#overlay').fadeIn(400, function(){
            $(window).css('display', 'block').animate({opacity: 1, top: '50%'}, 200);
        });
    }
}

$(document).ready(function() {
    $('a#askhelp').click( function(event){
        event.preventDefault();
        ModalWindow();
    });

    $('#modal_close, #overlay').click( function(){
        ModalWindow();
    });

    $('#helpform').submit(function(event){
        var frm = $('#helpform');
        event.preventDefault();

        var data = {};
        var Form = this;

        $.each(this, function(i, v){
            var input = $(v);
            data[input.attr("name")] = input.val();
            delete data["undefined"];
        });

        $.ajax({
            type: frm.attr('method'),
            url: frm.attr('action'),
            data : data,
            success : function(callback){
                if(typeof callback == 'object') {
                    $('#error').empty();
                    if(callback.name) $('#error').append(callback.name);
                    if(callback.phone) $('#error').append(callback.phone);
                } else {
                    console.log('close modal window and send msg to owner');
                    ModalWindow();
                }
            }
        });
    });
});
