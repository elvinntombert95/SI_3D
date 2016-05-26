/* PARALLAX */
	/*$(window).scroll(function(e){
    	parallax();
	 });
		
	 function parallax(){
		var scrolled = $(window).scrollTop(); 
	 	$('#roche_fond').css('bottom', +(scrolled * 0.5) + 'px');
	    $('#fumee').css('bottom', +(scrolled * 0.5) + 'px');
	 	$('#roche1').css('bottom', -(scrolled * 0) + 'px');
	 }*/

/* SCROLL DE LA NAVIGATION A SECTION */
	$(document).ready(function() {
		$('.js-scrollTo').on('click', function() { // Au clic sur un élément
			var page = $(this).attr('href'); // Page cible
			var speed = 750; // Durée de l'animation (en ms)
			$('html, body').animate( { scrollTop: $(page).offset().top }, speed ); // Go
			return false;
		});
	});


// SCROLL BACK TO TOP

	$(document).ready(function(){
    	// Condition d'affichage du bouton
	    $(window).scroll(function(){
	        if ($(this).scrollTop() > 500){ // Si le scroll dépasse 500px d'hauteur
 	            $('.toTop').fadeIn();
	        }
	        else{
	            $('.toTop').fadeOut();
	        }
	    });
	    // Evenement au clic
	    $('.toTop').click(function(){
	        $('html, body').animate({scrollTop : 0},800);
	        return false;
	    });
	});