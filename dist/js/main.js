$(document).ready(function(){

    // hide our element on page load
    $('.intro-inner').css('opacity', 0);
    $('.gallery-title').css('opacity', 0);
    $('.about-inner').css('opacity', 0);
    $('.locations').css('opacity', 0);
    $('.contact').css('opacity', 0);
    $('.intro-inner').waypoint(function() {
        $('.intro-inner').addClass('fadeInLeft');
    }, { offset: '70%' });
    $('.gallery-title').waypoint(function() {
        $('.gallery-title').addClass('fadeInRight');
    }, { offset: '60%' });
    $('.about-inner').waypoint(function() {
        $('.about-inner').addClass('fadeInUp');
    }, { offset: '75%' });
    $('.locations').waypoint(function() {
        $('.locations').addClass('fadeInUp');
    }, { offset: '80%' });
    $('.contact').waypoint(function() {
        $('.contact').addClass('fadeInUp');
    }, { offset: '80%' });
});