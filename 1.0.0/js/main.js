/**
 * Created by Zerzolar on 8.4.2016 г..
 */
$(document).ready( function() {

    $('#login-button').click(function () {
        $('#darker-bg').show();
        $('#login-form').show();
        $('#profile-dropdown').hide();
    });

    $('#sign-in-button').click(function () {
        $('#darker-bg').show();
        $('#sign-in-form').show();
        $('#profile-dropdown').hide();
    });

    $('#darker-bg').click(function () {
        $('#darker-bg').hide();
        $('#login-form').hide();
        $('#sign-in-form').hide();
    });

    $(window).keydown(function (event) {
        if (event.keyCode == 27) {
            $('#darker-bg').hide();
            $('#login-form').hide();
            $('#sign-in-form').hide();
        }
    });

    $('.log-in-link').click(function () {
        $('#sign-in-form').hide();
        $('#login-form').show();
    });

    $('.sign-in-link').click(function () {
        $('#login-form').hide();
        $('#sign-in-form').show();
    });


    //dropdown menu

    $(document).on('click', function (event) {
        if (!$(event.target).closest('.toolbox').length) {
            $('#profile-dropdown').hide();
        }
    })

    $('.profile-btn').click(function () {
        $('#profile-dropdown').toggle();
        $('.user-message').hide();
    });


    //side jokes

    $('.terms-and-policies-link').click(function () {
        alert("Just kidding.... go on :D");
    });

    $('#forgotten-password').click(function () {
        alert("That's your problem :P");
    });


});