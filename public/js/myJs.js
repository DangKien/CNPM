$(document).ready(function () {
    $('.icon-chiso').click(function () {
        $('#chi-so').modal('show');
    });

    $('.icon-diung').click(function () {
        $('#di-ung').modal('show');
    });

    $('.lankham').click(function (event)
    {
        $(this).toggleClass('panel-info fix-color-phr');
        //$('.panel .timeline-label').toggleClass('changed');
        $(this).parent().parent().parent().children('.timeline-label').toggleClass('changed');

    });

    var maxheight = 0;
    $('.department-detail').each(function ()
    {
        var height = $(this).height();
        if (maxheight < height)
        {
            maxheight = height;
        }
    });
    $('.department-detail').height(maxheight);

    $('.datepicker').datepicker();
    $('#sandbox-container input').datepicker({
        language: "vi"
    });
     
});

function confirmSuccess(type, message, icon ,container , timeOut){
    icon = icon || 'fa fa-check';
    container = container || 'floating';
    timeOut = timeOut || 3000;
    $.niftyNoty({
                type: type,
                icon : icon,
                message :  message,
                container : container ,
                timer : timeOut
            });
}

function confirmDelete(size, message, func){
    bootbox.confirm({ 
        size: size,
        message: message, 
        callback: func
      });
}
