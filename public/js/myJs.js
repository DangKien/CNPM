function remove(obj) {
    var files = $(obj).attr('data');
    for(var i = 0 ; i < fileList.length; i++) {
       if(files == fileList[i].name) {
            fileList.splice(i,1);
            break;
        }
    }
    $(obj).parent().remove();
}

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

