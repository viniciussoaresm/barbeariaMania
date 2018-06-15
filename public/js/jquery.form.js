jQuery(document).ready(function() {
    "use strict";
    $('#submit').on('click', function() {

        var action = $('#contactform').attr('action');

        $("#message").fadeOut(200, function() {
            $('#message').hide();

            $('#submit')
                .attr('disabled', 'disabled');

            $.post(action, {
                    name: $('#name').val(),
                    email: $('#email').val(),
                    phone: $('#phone').val(),
                    comments: $('#comments').val()
                },
                function(data) {
                    document.getElementById('message').innerHTML = data;
                    $('#message').fadeIn(200);
                    $('.hide').hide(0);
                    $('#submit').removeAttr('disabled');

                }
            );

        });

        return false;

    });


    $('#submitLogin').on('click', function() {
        var action = $('#loginform').attr('action');

        $("#message").fadeOut(200, function() {
            $('#message').hide();

            $('#submitLogin')
                .attr('disabled', 'disabled');

            $.post(action, {
                    email: $('#email').val(),
                    password: $('#password').val()
                },
                function(data) {

                    if(data.result){
                        window.location.replace(data.redirect);
                    }

                    document.getElementById('message').innerHTML = data.message;
                    $('#message').fadeIn(200);
                    $('.hide').hide(0);
                    $('#submit').removeAttr('disabled');
                }
            );

        });
        return false;
    }); 

    $('#generateTicket').on('click', function() {


        var clientId = $(this).attr('user-id');


        $.ajax({
              method: "POST",
              url: "/ticket/generate",
              data: { client: clientId}
             }).done(function( data ) {
                      alert(data.message);
            });
            window.location.reload();
        });

});