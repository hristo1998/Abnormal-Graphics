/**
 * Created by Zerzolar on 12.3.2016 г..
 */

$(document).ready( function(){

    $('#login-form').hide();
    $('#sign-in-form').hide();
    $('#darker-bg').hide();

    $('#login-button').click(function(){
        $('#darker-bg').show();
        $('#login-form').css({top : '-40'});
        $('#login-form').show();
        $('#login-form').animate({top:"30%"}, 400);
    });

    $('#sign-in-button').click(function(){
        $('#darker-bg').show();
        $('#sign-in-form').css({top : '-50'});
        $('#sign-in-form').show();
        $('#sign-in-form').animate({top:"30%"}, 400);
    });

    $('#darker-bg').click(function(){
        $('#darker-bg').hide();
        $('#login-form').stop(true,true).css({top:"-40%"});
        $('#login-form').hide();
        $('#sign-in-form').stop(true,true).css({top:"-50%"});
        $('#sign-in-form').hide();
    });

    $(window).keydown(function(event){
        if(event.keyCode == 27){
            $('#darker-bg').hide();
            $('#login-form').stop(true,true).css({top:"-40%"});
            $('#login-form').hide();
            $('#sign-in-form').stop(true,true).css({top:"-50%"});
            $('#sign-in-form').hide();
        }
    });

    $('.log-in-link').click(function(){
        $('#sign-in-form').css({top:"-50%"});
        $('#sign-in-form').hide();
        $('#login-form').css({top:"30%"});
        $('#login-form').show();
    });

    $('.sign-in-link').click(function(){
        $('#login-form').css({top:"-40%"});
        $('#login-form').hide();
        $('#sign-in-form').css({top:"30%"});
        $('#sign-in-form').show();
    });

    //side jokes

    $('.terms-and-policies-link').click(function(){
        alert("Just kidding.... go on :D");
    });

    $('#forgotten-password').click(function(){
        alert("That's your problem :P");
    });


    //sign in validations

    var userNameErr = true;
    var passErr = true;
    var rePassErr = true;
    var emailErr = true;
    var nameErr = true;
    var lastNAmeErr = true;
    var activeElement;

    $('.username').on("keyup", function(){

        activeElement = $(this);
        if(activeElement.val().length == 0 )
        {
            activeElement.next().html('<p class="validation_msg">Must fill!</p>');
            userNameErr = true;
        }
        else
        {
            $.ajax({
                url: "/php/signInValidations.php",
                type: "POST",
                data: { username: activeElement.val()},
                success: function(response) {

                    if( response == "Ok!"  )
                    {
                        activeElement.next().html(' <img src="../Pictures/tick.png" alt="" class="validation_icon">');
                        userNameErr = false;
                    }
                    else
                    {
                        userNameErr = true;

                        if(response == "invalid-input")
                        {
                            activeElement.next().html('<p class="validation_msg">Invalid characters!</p>');
                        }
                        else if(response == "too-short")
                        {
                            activeElement.next().html('<p class="validation_msg">Too short!</p>');
                        }
                        else if(response == "too-long")
                        {
                            activeElement.next().html('<p class="validation_msg">Too long!</p>');
                        }
                        else if(response == "taken")
                        {
                            activeElement.next().html('<p class="validation_msg">Taken!</p>');
                        }
                        else if(response == "no-letters")
                        {
                            activeElement.next().html('<p class="validation_msg">Must include letters!</p>');
                        }

                    }
                }
            });
        }
    });



    $('.password').on("keyup", function() {

        activeElement = $(this);
        var re = /^\w+$/;
        passErr = true;

        var security = 0;
        if (activeElement.val().length == 0)
        {
            activeElement.next().html('<p class="validation_msg">Must fill!</p>');
        }
        else if( !re.test(activeElement.val()) )
        {
            activeElement.next().html(' <p class="validation_msg">Invalid characters!</p>');
        }
        else if (activeElement.val().length < 5) {
            activeElement.next().html('<p class="validation_msg">Too short!</p>');
        }
        else if(activeElement.val().length > 21)
        {
            activeElement.next().html('<p class="validation_msg">Too long!</p>');
        }
        else {

            var nums = /[0-9]/;
            if (nums.test(activeElement.val())) {
                security++;
            }

            var lowerCase = /[a-z]/;
            if (lowerCase.test(activeElement.val())) {
                security++;
            }

            var higherCase = /[A-Z]/;
            if (higherCase.test(activeElement.val())) {
                security++;
            }


            if (security == 3) {
                activeElement.next().html(' <img src="../Pictures/tick.png" alt="" class="validation_icon">');
                passErr = false;
            }
            else if (security == 2) {
                activeElement.next().html('<p class="validation_msg">Medium!</p>');
                passErr = false;
            }
            else {
                activeElement.next().html('<p class="validation_msg">Low!</p>');
            }
        }

    });


    $('.repeat_password').on("keyup", function(){

        activeElement = $(this);
        rePassErr = true

        if(activeElement.val().length == 0)
        {
            activeElement.next().html('<p class="validation_msg">Must fill!</p>');
        }
        else
        {
            if(passErr == true )
            {
                activeElement.next().html(' <img src="../Pictures/no.png" alt="" class="validation_icon">');
            }
            else if( activeElement.val() == $('.password').val())
            {
                activeElement.next().html(' <img src="../Pictures/tick.png" alt="" class="validation_icon">');
                rePassErr = false;
            }
            else
            {
                activeElement.next().html(' <img src="../Pictures/no.png" alt="" class="validation_icon">');
            }
        }

    });


    $('#email').on("keyup" , function(){

        activeElement = $(this);
        var re = /\S+@\S+\.\S+/;
        emailErr = true;

        if(activeElement.val() == 0)
        {
            activeElement.next().html('<p class="validation_msg">Must fill!</p>');
        }
        else if( re.test(activeElement.val()) )
        {
            activeElement.next().html(' <img src="../Pictures/tick.png" alt="" class="validation_icon">');
            emailErr = false;
        }
        else
        {
            activeElement.next().html(' <img src="../Pictures/no.png" alt="" class="validation_icon">');
        }

    });

    $('.firstName').on("keyup" , function(){

        activeElement = $(this);
        nameErr = true;

        var re = /^\w+$/;
        if(activeElement.val() == 0)
        {
            activeElement.next().html('<p class="validation_msg">Must fill!</p>');
        }
        else if(activeElement.val().length > 21)
        {
            activeElement.next().html('<p class="validation_msg">Too long!</p>');
        }
        else
        {
            if(re.test(activeElement.val()))
            {
                activeElement.next().html(' <img src="../Pictures/tick.png" alt="" class="validation_icon">');
                nameErr = false;
            }
            else
            {
                activeElement.next().html(' <p class="validation_msg">Invalid characters!</p>');

            }
        }


    });

    $('.lastName').on("keyup" , function(){

        activeElement = $(this);
        lastNAmeErr = true;

        var re = /^\w+$/;
        if(activeElement.val() == 0)
        {
            activeElement.next().html('<p class="validation_msg">Must fill!</p>');
        }
        else if(activeElement.val().length > 21)
        {
            activeElement.next().html('<p class="validation_msg">Too long!</p>');
        }
        else
        {
            if(re.test(activeElement.val()))
            {
                activeElement.next().html(' <img src="../Pictures/tick.png" alt="" class="validation_icon">');
                lastNAmeErr = false;
            }
            else
            {
                activeElement.next().html(' <p class="validation_msg">Invalid characters!</p>');

            }
        }

    });

    setInterval(function(){

        $('#sign-in-form .submit').prop('disabled', true);
        $('#sign-in-form .submit').css({cursor : "not-allowed"});

        if( userNameErr==false && passErr==false && rePassErr==false && emailErr==false && nameErr==false && lastNAmeErr==false )
        {
            $('#sign-in-form .submit').prop('disabled', false);
            $('#sign-in-form .submit').css({cursor : "pointer"});
        }





    },1000)

});