jQuery(document).ready(function($) {
	//Show menu
	$('#navIcon').click(function() {
		$(this).toggleClass('open');
		$('#mainMenu').toggle();
		$('.screen-overlay').toggle();
	});
	
	$('.hero-copy').delay(400).animate({'opacity':'1'},500);
	$('.content-panel').delay(750).animate({'opacity':'1'},500);

	//Fix z-index youtube video embedding
	$('iframe').each(function() {
	  var url = $(this).attr("src");
	  if (url.indexOf("?") > 0) {
		$(this).attr({
		  "src" : url + "&wmode=transparent",
		  "wmode" : "opaque"
		});
	  }
	  else {
		$(this).attr({
		  "src" : url + "?wmode=transparent",
		  "wmode" : "opaque"
		});
	  }
	});
});