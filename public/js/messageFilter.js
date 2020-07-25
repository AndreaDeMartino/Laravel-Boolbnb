$(document).ready(function(){
   /**************************
      Messages Filter
   **************************/

   // Hide Messages
   $('.message-card').hide();

   // Show Messages Buttons by clicking Incoming Button
   $('.incoming').on('click', function(){
      $('.inbox__btns').show();
      $('.message-card').hide();
   });

   // Show Message by clicking his Button
   $('.message-btn').on('click', function(){
      $('.inbox__btns').hide();
      var panel = $(this).attr('data-message');
      $('.message-card').hide();
      $('.message-card[data-message="' + panel + '"]').show();
   });

   // Close Message and Show Messages Buttons
   $('.close-message').on('click', function(){
      $('.close-message').parent().hide();
      $('.inbox__btns').show();
   });
   
}); // End document ready