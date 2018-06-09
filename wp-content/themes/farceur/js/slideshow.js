/*!
 * Slideshow
 * Authors: Steven Letter
 * Theme: farceur
 * Version: 1.1.0
 */
jQuery(document).ready(function($){
    $('#home-slideshow img').hide();
	$('#home-slideshow img.spacer').show();
	$('#home-slideshow :nth-child(2)').show();
    setInterval(function(){
      $('#home-slideshow img.wacky:eq(0)').fadeOut(1200)
         .next('img.wacky').fadeIn(1200)
         .end().appendTo('#home-slideshow');}, 
      4000);
});