
(function ($) {
    "use strict";

    /*==================================================================
    [ Focus Contact2 ]*/
    $('.input100').each(function(){
        $(this).on('blur', function(){
            if($(this).val().trim() != "") {
                $(this).addClass('has-val');
            }
            else {
                $(this).removeClass('has-val');
            }
        })    
    })

    /*==================================================================
    [ Validate ]*/
    var input = $('.validate-input .input100');

    $('.validate-form').on('submit',function(){
        var check = true;

        for(var i=0; i<input.length; i++) {
            if(validate(input[i]) == false){
                showValidate(input[i]);
                check=false;
            }
        }

        return check;
    });


    $('.validate-form .input100').each(function(){
        $(this).focus(function(){
           hideValidate(this);
        });
    });

    function validate (input) {
        if($(input).attr('type') == 'email' || $(input).attr('name') == 'email') {
            if($(input).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
                return false;
            }
        }
        else {
            if($(input).val().trim() == ''){
                return false;
            }
        }
    }

    function showValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).addClass('alert-validate');
    }

    function hideValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).removeClass('alert-validate');
    }




    // SENDING JSON
    $('#sign-in-form').submit(function(e){

        e.preventDefault();

        var form = $('#sign-in-form').serialize();
        var url = $('#sign-in-form').attr('action');

        if($("input[name='email']").val() == ''){

            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Email is required!'
            });

            return;
       }

       if($("input[name='pass']").val() == ''){

            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Password is required!'
            });

            return;
       }


    // sending AJAX
    var send = $.ajax({
        type: "POST",
        url: url,
        data: form,
        dataType: 'json',
        beforeSend: function(){
            Swal.showLoading();
        }
    }).done((data) => {

        window.location = $('meta[name=base_url]').attr("content") + "citizen/home";
       

    }).fail((data) => {

       
        if(data.status == 500){

            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: "Internal Service Error. Please try again later."
            });

            return;
        }

        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: data.responseJSON.message
        });

    });
        

    });
    

})(jQuery);