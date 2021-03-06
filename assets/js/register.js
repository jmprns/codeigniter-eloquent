$( "#register-form" ).submit(function(e) {

    e.preventDefault();

    var form = $('#register-form').serialize();
    var url = $('meta[name=base_url]').attr("content");


    var checker = $('#register-form').serializeArray();
    var errors = 0;

    checker.forEach((val) => {if(val.value == ''){errors += 1;}});

    if(errors >= 2){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Certain fields are required.'
        });
        return;
    }

    if($("input[name='password']").val() !== $("input[name='cpassword']").val()){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Password mismatch'
        });
        return;
    }



    // sending AJAX
    var send = $.ajax({
        type: "POST",
        url: url + 'citizen/register',
        data: form,
        dataType: 'json',
        beforeSend: function(){
            Swal.showLoading();
        }
    }).done((data) => {
        Swal.fire({
            title: data.title,
            text: data.message,
            icon: 'success',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            allowOutsideClick: false,
            confirmButtonText: 'Return Home'
          }).then((result) => {
            if (result.value) {
              window.location = url + "citizen/signin";
            }
          })

    }).fail((data) => {

       
        if(data.status == 500){

            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: "Internal Service Error. Please try again later."
            });

            return;
        }else if(data.status == 406){
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: "YOu submitted a wrong information. Please check your form try again later."
            });

            return;
        }else{
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: "Something went wrong. Please try again later."
            });
        }

        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: data.responseJSON.message
        });

    });


});