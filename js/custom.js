"use-strict";

document.addEventListener('DOMContentLoaded', function() {
  console.log('DOMContentLoaded');
  const $draggables = document.querySelectorAll('#social div[draggable="true"]');
  console.log($draggables);
  for (const $dragItem of $draggables) {
    $dragItem.addEventListener('dragstart', function(e) {
      console.log('dragging item');

    })
  }

});

/*
jQuery(document).ready(function($) {
	//Show menu
	var menuItems = $('#mainMenu ul a');

	$('#navIcon').click(function() {
		openMenu();
		menuItems[0].focus();
	});
	$('#navIcon').on('keyup', function(e) {
		if ( e.which === 13 || e.which === 32 || e.which === 40 ) {
			openMenu();
			menuItems[0].focus();
		}
		if ( e.which === 38 ) { // up arrow
			openMenu();
			menuItems[menuItems.length - 1].focus();
		}
	});

	//Menu item keyboard navigation
	$('#mainMenu li a').on('keyup', function(e) {
		if ( e.which === 36 ) { // home
			menuItems[0].focus();
		}
	});
	$('#mainMenu li a').on('keyup', function(e) {
		if ( e.which === 35 ) { // end
			menuItems[menuItems.length - 1].focus();
		}
	});
	$('#mainMenu li a').on('keyup', function(e) {
		if ( e.which === 38 ) { // up arrow
			if ( this === menuItems[0] ) {
				menuItems[menuItems.length - 1].focus();
			} else {
				$(this).parent().prev().children().focus();
			}
		}
	});
	$('#mainMenu li a').on('keyup', function(e) {
		if ( e.which === 40 ) { // down arrow
			if ( this === menuItems[menuItems.length - 1] ) {
				menuItems[0].focus();
			} else {
				$(this).parent().next().children().focus();
			}
		}
	});

	//Hide menu
	$('#mainMenu li a, #navIcon.open').on('keyup', function(e) {
		if ( e.which === 27 ) {
			closeMenu();
			menuItems[0].focus();
		}
	});

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

	function openMenu() {
		$('#navIcon').toggleClass('open');
		$('#mainMenu').toggle();
		$('.screen-overlay').toggle();
	}
	function closeMenu() {
		$('#navIcon').removeClass('open');
		$('#mainMenu').toggle();
		$('.screen-overlay').toggle();

		$('#navIcon').focus();
	}
});
*/