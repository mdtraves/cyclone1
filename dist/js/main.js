$(document).ready(function(){

    // hide our element on page load
    $('.intro-inner').css('opacity', 0);
    $('.gallery-box').css('opacity', 0);
    $('.about-inner').css('opacity', 0);
    $('.locations').css('opacity', 0);
    $('.contact').css('opacity', 0);
    $('.intro-inner').waypoint(function() {
        $('.intro-inner').addClass('fadeInLeft');
    }, { offset: '70%' });
    $('.gallery-box').waypoint(function() {
        $('.gallery-box').addClass('fadeInRight');
    }, { offset: '70%' });
    $('.about-inner').waypoint(function() {
        $('.about-inner').addClass('fadeInUp');
    }, { offset: '75%' });
    $('.locations').waypoint(function() {
        $('.locations').addClass('fadeInUp');
    }, { offset: '95%' });
    $('.contact').waypoint(function() {
        $('.contact').addClass('fadeInUp');
    }, { offset: '95%' });

    $(".about-us-p").hide();
    $(".clicker").click(function() {
        $(this).next('.about-us-p').slideToggle();
    });
    $.ajaxSetup({ cache: true });
    $.getScript('https://connect.facebook.net/en_US/sdk.js', function(){
        FB.init({
            appId: '{328652457541955}',
            version: 'v2.7' // or v2.1, v2.2, v2.3, ...
        });
        $('#loginbutton,#feedbutton').removeAttr('disabled');
        FB.getLoginStatus(updateStatusCallback);
    });
    if(!$(".col-sm-6").hasClass('.Cover')){
        $(".Cover").hide();
    }

});