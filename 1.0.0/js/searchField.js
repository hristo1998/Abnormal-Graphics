/**
 * Created by Zerzolar on 24.4.2016 г..
 */

$(document).ready(function() {

    $('.search-field-container').hide();
    $('.nav-search-results-container').hide();
    var searchShown = false;


    $('.search-btn').click(function() {

        if(searchShown == true){
            $('nav').animate({ padding: "auto 0 auto 10%" }, 500);
            $('.toolbox').animate({ width: "37%"},500);
            $('.search-field-container').animate({width: "20%"},100 ,function() {
                $('.search-field-container').toggle();
            });
            $('.nav-search-results-container').hide();
            searchShown =false;
        }
        else
        {
            $('nav').animate({ padding: "auto 0 auto 0" }, 500);
            $('.toolbox').animate({ width: "45%"},500);
            $('.search-field-container').animate({width: "67%"},400).toggle();
            searchShown =true;
        }



    });

    $(window).keydown(function (event) {
        if (event.keyCode == 27) {
            $('nav').animate({ padding: "auto 0 auto 10%" }, 500);
            $('.toolbox').animate({ width: "37%"},500);
            $('.search-field-container').animate({width: "20%"},100,function() {
                $('.search-field-container').hide();
                $('.nav-search-results-container').hide();
                $('#nav-search-field').val("");
            });
            searchShown =false;
        }
    });


    $(document).on('click', function (event) {
        if (!$(event.target).closest('.toolbox').length) {
            $('nav').animate({ padding: "auto 0 auto 10%" }, 500);
            $('.toolbox').animate({ width: "37%"},500);
            $('.search-field-container').animate({width: "20%"},100,function() {
                $('.search-field-container').hide();
                $('.nav-search-results-container').hide();
            });

            searchShown =false;
        }
    });


    $('#nav-search-field').on("keyup" , function() {

        var activeElement = $(this).val();
        var resultUsersContainer = document.getElementById('nav-search-results-user-profiles');
        var resultArticlesContainer = document.getElementById('nav-search-results-articles');

        if( activeElement == "") {

            $('.nav-search-results-container').hide();

        }
        else
        {
            $('.nav-search-results-container').show();

            var re = /^\w+$/;
            if ( !re.test(activeElement) ) {
                $('.nav-search-results-user-profiles').html(' <div class="nav-search-no-results">No results :/</div>');
                $('.nav-search-results-articles').html(' <div class="nav-search-no-results">No results :/</div>');
            }
            else
            {
                $.ajax({
                    url: "/php/search.php",
                    type: "POST",
                    data: { search: activeElement  },
                    success: function(response) {

                        var searchResult = response.split("][");

                        //display the users first

                        resultUsersContainer.innerHTML = "";

                        if ( searchResult[0] == "noresults" )
                        {
                            $('.nav-search-results-user-profiles').html(' <div class="nav-search-no-results">No results :/</div>');
                        }
                        else
                        {
                            var users = searchResult[0].split("|");

                            for( var i=0 ; i<users.length ; i++ ){
                                var userInfo = users[i].split(":");

                                //userInfo[0] = boldMatch(userInfo[0],activeElement);     -------------------------------------------------------------------------------------- future development

                                resultUsersContainer.innerHTML = resultUsersContainer.innerHTML +
                                        '<div class="nav-search-profile-result-container">' +
                                        '<div class="nav-search-profile-result-pic">'+
                                        '<img src="Pictures/ProfilePictures/'+ userInfo[2] +'" alt="">' +
                                        '</div>' +
                                        '<div class="nav-search-profile-info-result">'+
                                        '<div class="nav-search-profile-info-result-username">' +
                                        userInfo[0] +
                                        '</div>' +
                                        '<div class="nav-search-profile-info-result-name">' +
                                        userInfo[1] +
                                        '</div>' +
                                        '</div>' +
                                        '</div>'
                                ;

                            }
                        }



                        // display the articles

                        resultArticlesContainer.innerHTML = "";

                        if (searchResult[1] =="noresults"){
                            $('.nav-search-results-articles').html(' <div class="nav-search-no-results">No results :/</div>');
                        }




                    },
                    error: function(jqXHR, textStatus, errorThrown){
                        alert(textStatus + " " + errorThrown);
                    }
                });

            }

        }

    });

    $('#nav-search-results-user-profiles').on( "click" , ".nav-search-profile-result-container" ,function() {

        var activeElement = $(this).html();

        var reg = /username">([a-zA-Z0-9]+)/;
        var match = reg.exec(activeElement);
        var searchedUser = match[1];
        $('#nav-hidden-search-field').val(searchedUser);

        $('#nav-search-hidden-submit-form').submit();

    });



    function boldMatch(string , search) {  //bolds the match

        var firstIndex = string.indexOf(search);
        var secondIndex = firstIndex + search.length;


        var firstSlice;
        var secondSlice;
        var thirdSlice;

        if ( firstIndex >0 ){



            firstSlice = string.slice(0,firstIndex-1);
            secondSlice = string.slice(firstIndex,secondIndex-1);
            thirdSlice = string.slice(secondIndex);

            return firstSlice + " " + secondSlice + " " + thirdSlice;

            //return string.slice(0,firstIndex-1) + "<span class=\"bold\">" + string.slice(firstIndex,secondIndex-1) + "</span>" + string.slice(secondIndex,string.length);
        }
        else if (firstIndex == 0){


            secondSlice = string.slice(firstIndex,secondIndex-1);
            thirdSlice = string.slice(secondIndex);

            return secondSlice + " " + thirdSlice;
        }

    }






});

