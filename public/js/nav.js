$(document).ready(function () {
    $('.navbar-toggler').on('click', function () {
  
      $('.icon-anim').toggleClass('open');
    });

    $('.nav-item.dropdown').on('click', function(){
      $('.nav-item.dropdown').addClass( "show" )
      console.log('ciao');
    })
  });
  