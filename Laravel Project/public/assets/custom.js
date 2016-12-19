

$(document).ready(function() {

    /*
     Navigation js
     */

    $('.menu ul li.drop-down > a').on('click', function (e) {
        e.preventDefault();
        $(this.nextElementSibling).slideToggle(300);
    });

    

    /*
    user status
     */
    
    $('a.btn-user-status').click(function (e) {
        e.preventDefault();
        var $this= $(this);
        var id = $this.data('id');
        var actionType=$this.text();
        var data={};
        data.id=id;
        data._token=csrf;
        if(actionType=='Disable'){
            data.action='disable';

        }else if(actionType=='Enable'){
            data.action='enable';

        }


        $.ajax({
           url:baseURL+'/admin/status',
            data:data,
            type:'post',
            dataType:'json',
            success:function(data){
                console.log('success');

                if(data.status=='success'){

                    if(data.type=="disable"){
                        $this.text('Enable');
                    }else if(data.type=='enable'){
                        $this.text('Disable');

                    }

                }
            },
            error:function (xhr) {
                console.log('error');
                console.log(xhr);
            }

        });
    });


});