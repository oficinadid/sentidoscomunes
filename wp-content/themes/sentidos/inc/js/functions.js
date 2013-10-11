var $j = jQuery.noConflict();


$j(document).ready(function() {

	$j(function() {
	    var unslider = $j('.slider').unslider({
	    	speed: 800,
	    	delay: 10000,
			dots: true,               //  Display dot navigation
			fluid: false              //  Support responsive design. May break non-responsive designs
	    })

	    $j('.slider-arrow').click(function() {
	        var fn = this.className.split(' ')[1]
	        unslider.data('unslider')[fn]()
	    })
	})


	if ($j('#single').hasClass('category-reportajes-graficos')) {
		$j('body').addClass('category-reportajes-graficos')
	};


    $j('.search-toggle a').on('click', function(){
		$j('#search_form').toggleClass('hidden');
		$j('body').toggleClass('searching');
		$j(this).toggleClass('pressed');
		return false;
	})

	$j('.edition article').on('click', function(){
		var link = $j(this).find('.img').attr('href')
		location.href = link
		return false;
	})

	function expandirMenu() {
		$j(this).parent().addClass('open');
		$j(this).parent().find('ul').addClass('open');
		$j(this).addClass('open');
		return false
	}
	function contraerMenu() {
		$j(this).parent().removeClass('open')
		$j(this).parent().find('ul').removeClass('open')
		$j(this).removeClass('open')
		return false
	}

	$j(".this_week").hoverIntent(expandirMenu,contraerMenu);

	

if (  $j('#single.category-entrevistas .meta').is(':visible') ) {

	var top = ($j('#single.category-entrevistas .meta').offset().top)-150

	$j(window).scroll(function(){
		if ($j(this).scrollTop() > top){
			$j('#single.category-entrevistas .meta').addClass('fixed');
		}else{
			$j('#single.category-entrevistas .meta').removeClass('fixed');
		}
	})

}


// Contratulations
	var keys=[];var konami='38,38,40,40,37,39,37,39,66,65';
	


	function getUrlVars()
	{
	    var vars = [], hash;
	    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
	    for(var i = 0; i < hashes.length; i++)
	    {
	        hash = hashes[i].split('=');
	        vars.push(hash[0]);
	        vars[hash[0]] = hash[1];
	    }
	    return vars;
	}

	var search = getUrlVars()["s"];
	var btn = getUrlVars()["submit"];
	if ( search != '' && btn == 'Buscar') {
		$j('#search_form').removeClass('hidden')
	};


	$j('#via-publica figure').on('mouseenter', function(){
		$j('#via-publica figure').removeClass('open')
		$j('#via-publica figure').find('figcaption').removeClass('open')

		console.log('in')
		var position = $j(this).position()
			position = (( position.top + $j(this).height() )+'px')

		$j(this).addClass('open')
		$j(this).find('figcaption').css("top", position).addClass('open')
	})

	$j('#via-publica figure').on('mouseleave', function(){
		$j(this).removeClass('open')
		$j(this).find('figcaption').removeClass('open')	
	})

	$j('.popup').click(function(event) {
	    var width  = 575,
	        height = 400,
	        left   = ($j(window).width()  - width)  / 2,
	        top    = ($j(window).height() - height) / 2,
	        url    = this.href,
	        opts   = 'status=1' +
	                 ',width='  + width  +
	                 ',height=' + height +
	                 ',top='    + top    +
	                 ',left='   + left;
	    
	    window.open(url, 'twitter', opts);
	 
	    return false;
	  });

});
