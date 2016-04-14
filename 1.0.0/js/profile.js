/**
 * Created by Zerzolar on 9.4.2016 г..
 */
$(document).ready(function(){


    // enable and disable profile editing

    $('.profile-edit-options').hide();  // everything regarding changing acc info
    $('.profile-form-section').css( "height" , "0"); //set default height of the form main elements
    $('.profile-edit-save-pic').hide(); //  btn for saving new profile pic

    $('#profile-info-edit-enable-btn').click(function(){
        $('.profile-edit-options').show();
        $('.profile-form-section').animate( { height: "100%"} , 300 );
        $(this).hide();
    });

    $('#profile-stop-editing').click( closeOptions );

    function closeOptions() {
        $('.profile-form-section').animate( { height: "0"} , 300 , function() {

            $('.profile-edit-options').hide();
            $('#profile-info-edit-enable-btn').show();
            $('.profile-edit-save-pic').hide();
            $('.profile-form-input').val('');
            $('.profile-input-err-msg').html('');
        });
        $('.profile-profilePic-img img').attr('src' , $('.profile-pic-menu').attr('src'));
    }

    $('.profile-pic-edit-btn').hover(function(){
        $(this).html('Change photo');
    });
    $('.profile-pic-edit-btn').mouseout(function(){
        $(this).html('<i class="fa fa-pencil"></i>');
    });


    //profile editing logic
    // profile pic 

    $('.profile-pic-edit-btn').click(function() {
        $('#profile-form-upload-pic').click();
    });

    $("#profile-form-upload-pic").change(function(){
        readURL(this);
        $('.profile-edit-save-pic').show();
    });

    function readURL(input) {

        if (input.files && input.files[0]) {

            var reader = new FileReader();

            reader.onload = function (e) {
                $('.profile-profilePic-img img').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $('.profile-edit-save-pic').click(function () {

        // validate file input -----------------------------------
        $('#profile-form-submit').click();

    });



    var activeElement; // user for saving elements


    //username cha
    // nge validations


    var userNameErr = true;

    $('#profile-form-username-change-filed').on("keyup", function(){

        activeElement = $(this);
        if(activeElement.val().length == 0 )
        {
            activeElement.next().html('<p class="profile-form-input-validation_msg">Must fill!</p>');
            disableButton("#profile-form-change-username");
            userNameErr = true;
        }
        else
        {
            $.ajax({
                url: "/php/usernameValidation.php",
                type: "POST",
                data: { username: activeElement.val()},
                success: function(response) {

                    if( response == "Ok!"  )
                    {
                        activeElement.next().html(' <img src="../Pictures/tick.png" alt="" class="profile-form-input-validation_icon">');
                        enableButton("#profile-form-change-username");
                        userNameErr = false;
                    }
                    else
                    {
                        disableButton("#profile-form-change-username");
                        userNameErr = true;

                        if(response == "invalid-input")
                        {
                            activeElement.next().html('<p class="profile-form-input-validation_msg">Invalid characters!</p>');
                        }
                        else if(response == "too-short")
                        {
                            activeElement.next().html('<p class="profile-form-input-validation_msg">Too short!</p>');
                        }
                        else if(response == "too-long")
                        {
                            activeElement.next().html('<p class="profile-form-input-validation_msg">Too long!</p>');
                        }
                        else if(response == "taken")
                        {
                            activeElement.next().html('<p class="profile-form-input-validation_msg">Taken!</p>');
                        }
                        else if(response == "no-letters")
                        {
                            activeElement.next().html('<p class="profile-form-input-validation_msg">Must include letters!</p>');
                        }
                        else if(response == "thatsyou")
                        {
                            activeElement.next().html('<p class="profile-form-input-validation_msg">Your new username should be NEW !!!</p>');
                        }

                    }
                }
            });
        }
    });

    //username change

    $('#profile-form-change-username').click(function() {

        if( userNameErr == false ){

            activeElement = $('#profile-form-username-change-filed').val();

            $.ajax({
                url: "/php/usernameChange.php",
                type: "POST",
                data: { username: activeElement},
                success: function(response) {

                    if( response == "error") {
                        $('#profile-form-username-change-filed').next().html('<p class="profile-form-input-validation_msg">Sorry, something happened , please try again!</p>');  // server side error
                    }
                    else
                    {
                        closeOptions();

                        $('#profile-info-username-field').html(activeElement); // show the new username
                        $('#profile-form-username-change-filed').val('');  // clear username input filed
                        $('#profile-form-username-change-filed').next().html('');  //clear the msg field

                    }

                }
            });


        }
    });


    // password validation

    var passErr = true;
    var rePassErr =true;
    var newEneteredPassword = '';


        $('#profile-form-enter-new-password').on("keyup", function() {

        activeElement = $(this);
        newEneteredPassword = activeElement.val();

        var re = /^\w+$/;
        passErr = true;

        var security = 0;
        if (activeElement.val().length == 0)
        {
            activeElement.next().html('<p class="profile-form-input-validation_msg">Must fill!</p>');
        }
        else if( !re.test(activeElement.val()) )
        {
            activeElement.next().html(' <p class="profile-form-input-validation_msg">Invalid characters!</p>');
        }
        else if (activeElement.val().length < 5) {
            activeElement.next().html('<p class="profile-form-input-validation_msg">Too short!</p>');
        }
        else if(activeElement.val().length > 21)
        {
            activeElement.next().html('<p class="profile-form-input-validation_msg">Too long!</p>');
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
                activeElement.next().html('<img src="../Pictures/tick.png" alt="" class="profile-form-input-validation_icon"> ');
                passErr = false;
            }
            else if (security == 2) {
                activeElement.next().html('<p class="profile-form-input-validation_msg">Medium!</p>');
                passErr = false;
            }
            else {
                activeElement.next().html('<p class="profile-form-input-validation_msg">Low!</p>');
            }
        }

            enableDisablePassChange ();

    });


    $('#profile-form-repeat-new-password').on("keyup", function(){

        activeElement = $(this);
        rePassErr = true

        if(activeElement.val().length == 0)
        {
            activeElement.next().html('<p class="profile-form-input-validation_msg">Must fill!</p>');
        }
        else
        {
            if(passErr == true )
            {
                activeElement.next().html(' <img src="../Pictures/no.png" alt="" class="profile-form-input-validation_icon">');
            }
            else if( activeElement.val() == newEneteredPassword )
            {
                activeElement.next().html(' <img src="../Pictures/tick.png" alt="" class="profile-form-input-validation_icon">');
                rePassErr = false;
            }
            else
            {
                activeElement.next().html('  <img src="../Pictures/no.png" alt="" class="profile-form-input-validation_icon">');
            }
        }

        enableDisablePassChange ();

    });

    function enableDisablePassChange () {

        if( passErr == false && rePassErr == false ) {
            enableButton('#profile-form-change-password');
        }
        else
        {
            disableButton('#profile-form-change-password')
        }

    }

    $('#profile-form-change-password').click(function() {

        if( passErr == false && rePassErr ==false ){

            var pass = $('#profile-form-enter-password').val();

            if( pass == '' ){
                $('#profile-form-enter-password').next().html('<p class="profile-form-input-validation_msg">Enter your password before tying to change it!</p>')
            }
            else
            {
                $.ajax({
                    url: "/php/passwordChange.php",
                    type: "POST",
                    data: { password: pass,
                            newPassword : newEneteredPassword },
                    success: function(response) {

                        if(response == "wrongPass"){
                            $('#profile-form-enter-password').next().html('<p class="profile-form-input-validation_msg">Wrong password!</p>');
                        }
                        else if(response == "samePass"){
                            $('#profile-form-enter-password').next().html('<p class="profile-form-input-validation_msg">Your new password can\'t be the same!</p>');
                        }
                        else if (response == "success") {
                            closeOptions();
                        }
                        else
                        {

                            alert(response);
                        }

                    }
                });
            }

        }

        $('#profile-form-enter-password').on("keyup" , function() {
            $(this).next().html('');                                             // clears enter password msg box after a change
        });



    });

    //change name

    var emailErr = true;

    $('#profile-form-email-change-filed').on("keyup" , function() {

        activeElement = $(this);
        var re = /\S+@\S+\.\S+/;
        emailErr = true;
        disableButton('#profile-form-change-email');

        if(activeElement.val() == 0)
        {
            activeElement.next().html('<p class="profile-form-input-validation_msg">Must fill!</p>');
        }
        else if( re.test(activeElement.val()) )
        {
            activeElement.next().html(' <img src="../Pictures/tick.png" alt="" class="profile-form-input-validation_icon">');
            emailErr = false;
            enableButton('#profile-form-change-email');
        }
        else
        {
            activeElement.next().html(' <img src="../Pictures/no.png" alt="" class="profile-form-input-validation_icon">');
        }

    });

    $('#profile-form-change-email').click(function() {


        if(emailErr == false)
        {

            alert('yes');

            var email = $('#profile-form-email-change-filed').val();

            $.ajax({
                url: "/php/emailChange.php",
                type: "POST",
                data: { email: email },
                success: function(response) {

                    if(response == "sameEmail")
                    {
                        $('#profile-form-change-email').next().html('<p class="profile-form-input-validation_msg">Your new email can\'t be the sanme!</p>');
                    }
                    else
                    {
                        closeOptions();
                        $('#profile-info-email-field').html("Email: " + email);

                    }

                },
                error: function(jqXHR, textStatus, errorThrown){
                    alert(textStatus + " " + errorThrown);
                }

            });
            
        }

    });


    //name change

    var nameErr = true;

    $('#profile-form-name-change-filed').on("keyup" , function() {

        activeElement = $(this);

        disableButton('#profile-form-change-name');

        var re = /^\w+\s\w+$/;
        if(activeElement.val() == 0)
        {
            activeElement.next().html('<p class="profile-form-input-validation_msg">Must fill!</p>');
        }
        else if(activeElement.val().length < 5)
        {
            activeElement.next().html('<p class="profile-form-input-validation_msg">Too short!</p>');
        }
        else if(activeElement.val().length > 21)
        {
            activeElement.next().html('<p class="profile-form-input-validation_msg">Too long!</p>');
        }
        else
        {
            if(re.test(activeElement.val()))
            {
                activeElement.next().html(' <img src="../Pictures/tick.png" alt="" class="profile-form-input-validation_icon">');
                nameErr = false;
                enableButton('#profile-form-change-name');
            }
            else
            {
                activeElement.next().html(' <p class="profile-form-input-validation_msg">Invalid characters!</p>');

            }
        }

    });




    // enable button

    function enableButton(btnID) {

        $(btnID).css("background-color" , "black" );
        $(btnID).css("cursor" , "pointer" );
        $(btnID).hover(function(){
            $(btnID).css("background-color" , "#363738" )
        });
        $(btnID).mouseout(function(){
            $(btnID).css("background-color" , "black" );
        });

    }

    //disable button

    function disableButton(btnID) {
        $(btnID).css("background-color" , "#363738" );
        $(btnID).css("cursor" , "not-allowed" );
        $(btnID).hover(function(){
            $(btnID).css("background-color" , "#363738" )
        });
    }

});