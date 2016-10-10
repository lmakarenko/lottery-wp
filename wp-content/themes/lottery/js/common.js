function paramsAdd(data, k, v){
    if(data instanceof Object){
        data[k] = v;
    } else {
        if('' != $.trim(data)){
            data += '&' + k + '=' + v;
        } else {
            data = k + '=' + v;
        }
    }
    return data;
}

function bsAjaxDialog(url, title, buttons, params) {
    
    var params = params || {}, did = "bs_dialog_"+Math.floor(Math.random() * (1000 - 1) + 1);

    var dialogdiv = document.createElement("DIV");

    dialogdiv.id=did;
    document.getElementsByTagName('body')[0].appendChild(dialogdiv);

    var btn = '';

    if (buttons!==undefined) {

            for (name in buttons) {
                    btn +='<button class="btn btn-primary" onclick="'+buttons[name].replace(/"/g,"'")+'">'+name+'</button>';
            }
    }

    $('#'+did)
            .attr('class',"modal hide fade")
            .attr('tabindex',"-1")
            .attr("role","dialog")
            .attr("aria-labelledby", "myModalLabel")
            .attr("aria-hidden","true")
            .append('<div class="modal-header"><button type="button" class="close" onclick="bsDialogDestroy(\''+did+'\')" aria-hidden="true">×</button><h3 id="myModalLabel">'+title+'</h3></div>')
            .append('<div class="modal-body"></div>')
            .append('<div class="modal-footer">'+btn+'<button class="btn" onclick="bsDialogDestroy(\''+did+'\')">Закрыть</button></div>');
            // data-dismiss="modal"
    
    $.get(url, params, function(d){
        $("#"+did + ' .modal-body').html(d);
        $.each($("#"+did+" .modal-body script"),function(k,v) {eval($(v).text());}); /// запускаем скрипты из контента
        $("#"+did).modal('show');
        $('.modal-backdrop').on('click', function(e){
            bsDialogDestroy(did);
        });
    }, 'html');

    return did;
}

function bsDialogDestroy(did) {
    $("#"+did).modal("hide");
    $("#"+did).remove();
}
