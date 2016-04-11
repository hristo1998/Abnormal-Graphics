/**
 * Created by Zerzolar on 9.4.2016 г..
 */
$(document).ready(function(){


    // enable and disable profile editing

    $('.profile-edit-options').hide();
    $('.profile-info-edit-field').hide();

    $('#profile-enable-editing-btn').click(function(){
        $(this).hide();
        $('.profile-edit-options').toggle();
    });

    $('#profile-stop-editing').click(function(){
        $('.profile-edit-options').hide();
        $('#profile-enable-editing-btn').toggle();
        $('.profile-profilePic-img img').attr('src', $('.profile-pic-menu').attr('src'));
    });

    $('.profile-pic-edit-btn').hover(function(){
        $(this).html('Change photo');
    });
    $('.profile-pic-edit-btn').mouseout(function(){
        $(this).html('<i class="fa fa-pencil"></i>');
    });


    //profile editing logic

    $('.profile-pic-edit-btn').click(function() {
        $('#profile-form-upload-pic').click();
    });

    $("#profile-form-upload-pic").change(function(){
        readURL(this);
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

});