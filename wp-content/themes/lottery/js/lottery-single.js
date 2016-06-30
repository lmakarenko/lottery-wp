$(function(){
    
    var taskTimeoutId, id_adv, tasks_id,
        tasks_statuses, task_types = ['social','cpa'],
        task_status_q = {'social':{},'cpa':{}};
    
    (function init(){
        parse_tasks_data();
        status_updater();
    })();
    
    function status_updater(){
        
        if (taskTimeoutId) {
            clearTimeout(taskTimeoutId);
	}
        
        $.ajax({
            type:'post',
            url:'/wp-admin/admin-ajax.php',
            data: {
                action: 'get_tasks_status',
                id_adv: id_adv,
            },
            dataType: 'json',
            success: function(d){
                if(d.statuses){
                  tasks_statuses = d.statuses;
                  console.log(tasks_statuses);
                  console.log(task_status_q);
                  check_statuses();
                  //update_statuses();
                  if(0 < task_status_q.length){
                    //taskTimeoutId = setTimeout(status_updater, 16000);
                  }
                }
            }
        });
    }
    
    function parse_tasks_data(){
        id_adv = $('#id-adv').val();
        var adv_id_a = id_adv.split(',');
        for(var i=0;i<adv_id_a.length;++i){
            var adv_id = adv_id_a[i];
            $('.task-c[data-adv-id="' + adv_id + '"]').each(function(){
               var task_type = $(this).attr('data-task-type'),
                   task_id = $(this).attr('data-task-id');
               if(!task_status_q[task_type][adv_id]){
                   task_status_q[task_type][adv_id] = [];
               }
               task_status_q[task_type][adv_id].push(task_id); 
            });
        }
    }
    
    function is_status_complete(status){
        if('finished' == status || 'paid' == status){
            return true;
        } else {
            return false;
        }
    }
    
    function get_task_btn_cls(task_status){
        var cls = 'loading';
        switch(task_status){
            case 'started':
                cls = 'started';
            break;
            case 'paid':
            case 'finished':
                cls = 'finished';
            break;
            case 'error':
            case 'not paid':
            case 'not_paid':
            break;
            default: break;
        }
        return cls;
    }
    
    function set_task_status_v(task_type, task_id, task_status){
        console.log('set v ' + task_type + ' ' + task_id);
        var e = $('ul#lottery-task-list > li[data-task-type="'+task_type+'"][data-task-id="'+task_id+'"]').first(),
            btn_cls_ = get_task_btn_cls(task_status);
        e.find('.lottery-task-btn').hide();
        e.find('.lottery-task-btn-'+btn_cls_).first().show();
    }
    
    function update_task_status(task_type, adv_id, task_id){
        if(!task_type){
            return false;
        }
        var task_status, k;
        if(adv_id){
            if(task_id){
                task_status = tasks_statuses[task_type][adv_id][task_id]['task_status'];
                set_task_status_v(task_type, task_id, task_status);
            } else {
                var task_id;
                for(k=0;k<task_status_q[task_type][adv_id].length;++k){
                    task_id = task_status_q[task_type][adv_id][k];
                    set_task_status_v(task_type, task_id, 'start');
                }
            }
        } else{
            console.log('update all of type ' + task_type);
            var adv_id, task_id;
            for(adv_id in task_status_q[task_type]){
                for(k=0;k<task_status_q[task_type][adv_id].length;++k){
                    task_id = task_status_q[task_type][adv_id][k];
                    set_task_status_v(task_type, task_id, 'start');
                }
            }
        }
    }
    
    function check_statuses(){
        var j, k, task_type, adv_id, task_id;
        for(j=0;j<task_types.length;++j){
            task_type = task_types[j];
            if(!task_status_q[task_type]){
                console.log('no ' + task_type);
                continue;
            }
            if(tasks_statuses[task_type]){
                for(adv_id in task_status_q[task_type]){
                    if(!task_status_q[task_type][adv_id]){
                        continue;
                    }
                    if(tasks_statuses[task_type][adv_id]){
                        for(k=0;k<task_status_q[task_type][adv_id].length;++k){
                            task_id = task_status_q[task_type][adv_id][k];
                            if(tasks_statuses[task_type][adv_id][task_id]){
                                update_task_status(task_type, adv_id, task_id);
                            }
                        }
                    } else {
                        // set status to all of current type and current adv
                        console.log('all of type ' + task_type+' and adv '+adv_id);
                        update_task_status(task_type,adv_id);
                    }
                }
            } else {
                // set status to all of current type
                console.log('all of type ' + task_type);
                update_task_status(task_type);
            }
        }
        /*
        for(var k=0;k<tasks_id.length;++k){
            var task_id = tasks_id[k],
                i, task_type,
                id_adv_a = $('.newPost[data-id="' + post_id + '"]').attr('data-adv').split(',');
            for(i=0;i<id_adv_a.length;++i){
                if(typeof tasks_statuses['soc'] !== 'undefined'
                        && tasks_statuses['soc'][ id_adv_a[i] ]){                   
                    task_type = 'soc';
                } else if(typeof tasks_statuses['cpa'] !== 'undefined'
                        && tasks_statuses['cpa'][ id_adv_a[i] ]){
                    task_type = 'cpa';
                } else {
                    task_status_map[task_id] = false;
                    continue;
                }
                for(task_id in tasks_statuses[task_type][ id_adv_a[i] ]){
                    if('paid' == tasks_statuses[task_type][ id_adv_a[i] ][task_id]['task_status'] ||
                        'finish' == tasks_statuses[task_type][ id_adv_a[i] ][task_id]['task_status']){
                        posts_statuses[post_id] = true;
                    } else {
                        posts_statuses[post_id] = false;
                    }
                }
            }
        }
        */
    }
    
});
