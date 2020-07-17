$('#checkboxOthers').change(function(){

    var checker = $('#checkboxOthers').is(':checked'); 

    if(checker == true){
        $("#otherTextarea").css("display","block");
    }else{
        $("#otherTextarea").css("display","none");
    }

});


$( "#pl-form" ).submit(function(e) {

    e.preventDefault();

    var form = $('#pl-form').serialize();
    var url = $('#pl-form').attr('action');


    var checker = $('#pl-form').serializeArray();

    console.log(checker);


    var checkerPurpose = checker.map(name => name.name);
    var checkerPurpose2 = checkerPurpose.includes("purpose[]");

    if(checkerPurpose2 == false){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Please select at least one purpose of travel!'
        });
        return;
    }

    // sending AJAX
    var send = $.ajax({
        type: "POST",
        url: url + 'citizen/travel/create',
        data: form,
        dataType: 'json',
        beforeSend: function(){

            // add whirl traditional
            $("#div-form").addClass("whirl traditional");
            
        }
    }).done((data) => {

        var travelId = data.data.travel_id;

        Swal.fire({
            title: data.title,
            text: data.message,
            icon: 'success',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Go to next page',
            allowOutsideClick: false
          }).then((result) => {
            if (result.value) {
            //   redirect

                window.location = $('meta[name=base_url]').attr("content") + "citizen/travel/" + travelId + "/show";

            }
          });

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

    }).always(()=>{
         // remove whirl traditional
         $("#div-form").removeClass("whirl traditional");
    });

    


});