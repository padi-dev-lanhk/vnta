			<div class="wrap_footer">
				<?php	echo apply_filters( 'cryptlight_render_footer', '' ); ?>
			</div>
			
		</div> <!-- Ova Wrapper -->	
		<?php wp_footer(); ?>
		<script>
		
		(function ($) {
			"use strict";
			$(document).ready(function() {
				$(".single").removeClass('site_dark');
				$(".single").removeClass('site_dark');
				$(".archive").removeClass('site_dark');
				$('.search').removeClass('site_dark');
				$(".menu-canvas button.menu-toggle").click(function () {
					$("html").addClass("open-menu");
				})
				$(".menu-canvas .site-overlay").click(function () {
					if($("html").hasClass('open-menu')){
						$("html").removeClass("open-menu");
					}
				})
				$(".menu-canvas .container-menu .close-menu").click(function () {
					if($("html").hasClass('open-menu')){
						$("html").removeClass("open-menu");
					}
				})
				 
				$('.list-related-post').owlCarousel({
					loop:true,
					margin:20,
					autoplay:true,
					autoplayTimeout:5000,
					autoplayHoverPause:false,
					nav:true,
					responsive:{
						0:{
							items:1
						},
						600:{
							items:2
						},
						1024:{
							items:3
						}
					}
				})
			})
			$(document).ready(function() {
					$('.stage--nav2 ul li a[href*=#]').bind('click', function(e) {
							e.preventDefault();
							var target = $(this).attr("href");
							$('html, body').stop().animate({
									scrollTop: $(target).offset().top
							}, 600, function() {
									location.hash = target;
							});

							return false;
					});
			});

			$(window).scroll(function() {
					var scrollDistance = $(window).scrollTop();
					$('.page-section').each(function(i) {
							if ($(this).position().top <= scrollDistance + 94) {
								console.log(i)
									$('.stage--nav2 ul li.active').removeClass('active');
									$('.stage--nav2 ul li').eq(i).addClass('active');
							}
					});
			}).scroll();
			
			})(jQuery);
			
	</script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/flickity/2.0.5/flickity.pkgd.min.js"></script>
<script>
	(function ($) {
    "use strict";
    $(document).ready(function() {
		var $carousel = $('.main-carousel').flickity({
			imagesLoaded: true,
			contain: true,
			percentPosition: true,
			initialIndex: 2,
			wrapAround: true
		});
	})
	$(window).scroll(function(){
		if ($(this).scrollTop() > 250) {
		   $('body').addClass('newClass');
		} else {
		   $('body').removeClass('newClass');
		}
	});

	var sections = $('.post-content h2')
	  , nav = $('.ez-toc-list')
	  , nav_height = nav.outerHeight();

	$(window).on('scroll', function () {
	  var cur_pos = $(this).scrollTop();
	  
	  sections.each(function() {
	    var top = $(this).offset().top - nav_height,
	        bottom = top + $(this).outerHeight();
	    if (cur_pos >= top && cur_pos <= bottom) {
	      nav.find('a').removeClass('active');
	      sections.removeClass('active');
	      
	      $(this).addClass('active');
	      nav.find('a[href="#'+$(this).find('.ez-toc-section').attr('id')+'"]').addClass('active');
	    }
	  });
	});

	$('.cssicon').click(function(){
		$('body').toggleClass('openmenu');
	});
	$('.ez-toc-list li a').click(function(){
		$("body").removeClass('openmenu');
		$(".ez-toc-list li a").removeClass('active');
		$(this).addClass('active');
	});

})(jQuery)
	
</script>
<style type="text/css">
	.post-content h2 strong{
		margin-top: 120px;
		display: inline-block;
		width: 100%;
	}
	.post-content h2{
		position: relative;
	}
	.post-content h2 .ez-toc-section{
		position: absolute;
		width: 100%;
		height: 1px;
		top: 0;
		left: 0;
	}
	#ez-toc-container{
		z-index: 9999;
	}
	div#ez-toc-container p.ez-toc-title{
		display: inline-block;
		width: 100%;
		margin-bottom: 10px;
	}
	.newClass div#ez-toc-container p.ez-toc-title{
		display: none;
	}
	.newClass #ez-toc-container nav{
		display: block;
		opacity: 1;
	}
	.newClass #ez-toc-container{
		height: 44px;
	}
	#ez-toc-container ul li{
		text-align: left;
	}
	.newClass #ez-toc-container ul li a{
		display: none;
	}
	#ez-toc-container ul li a{
		position: relative;
	}
	/*.ez-toc-list-level-1 li:nth-child(1) a:before{
		content: "1.";
		margin-right: 5px;
	}
	.ez-toc-list-level-1 li:nth-child(2) a:before{
		content: "2.";
		margin-right: 5px;
	}
	.ez-toc-list-level-1 li:nth-child(3) a:before{
		content: "3.";
		margin-right: 5px;
	}
	.ez-toc-list-level-1 li:nth-child(4) a:before{
		content: "4.";
		margin-right: 5px;
	}
	.ez-toc-list-level-1 li:nth-child(5) a:before{
		content: "5.";
		margin-right: 5px;
	}
	.ez-toc-list-level-1 li:nth-child(6) a:before{
		content: "6.";
		margin-right: 5px;
	}
	.ez-toc-list-level-1 li:nth-child(7) a:before{
		content: "7.";
		margin-right: 5px;
	}
	.ez-toc-list-level-1 li:nth-child(8) a:before{
		content: "8.";
		margin-right: 5px;
	}
	.ez-toc-list-level-1 li:nth-child(9) a:before{
		content: "9.";
		margin-right: 5px;
	}
	.ez-toc-list-level-1 li:nth-child(10) a:before{
		content: "10.";
		margin-right: 5px;
	}
	.ez-toc-list-level-1 li:nth-child(11) a:before{
		content: "11.";
		margin-right: 5px;
	}
	.ez-toc-list-level-1 li:nth-child(12) a:before{
		content: "12.";
		margin-right: 5px;
	}*/
	.newClass #ez-toc-container ul li a.active{
		position: absolute;
		top: 8px;
		left: 10px;
		display: block;
		white-space: nowrap;
	    overflow: hidden;
	    text-overflow: ellipsis;
	    width: 85%;
	}
	#ez-toc-container label.cssicon{
		display: none;
	}
	.newClass #ez-toc-container label.cssicon{
		display: inline-block;
	    position: absolute;
	    z-index: 99999;
	    top: 4px;
	    right: 0;
	    left: initial;
	    margin-top: 0;
	}
	.newClass.openmenu #ez-toc-container ul li a{
		display: block;
	}
	.newClass.openmenu #ez-toc-container ul li a.active{
		position: relative;
		top: initial;
		left: initial;
	}
	.newClass.openmenu #ez-toc-container nav{
		max-height: fit-content;
	}
	.openmenu #ez-toc-container nav{
		display: block;
		opacity: 1;
		max-height: fit-content;
	}
	div#ez-toc-container ul.ez-toc-list a:hover{
		color: #111;
	}
	.newClass div#ez-toc-container{
		background: #fff;
    	border: 1px solid #e3e1e1;
	}
	.newClass #ez-toc-container ul li a{
		font-weight: bold;
	}
	.post-content,
	.post-content h2,
	.post-content p{
		text-align: left;
	}
</style>
	</body><!-- /body -->
</html>