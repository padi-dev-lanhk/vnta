/******* Do not edit this file *******
Simple Custom CSS and JS - by Silkypress.com
Saved: Mar 18 2023 | 10:05:13 */
jQuery(document).ready(function( $ ){
    
   jQuery(".toggle_trigger_1").on("click", function() {
    let $this = $(this);
  
    if ($this.hasClass('tab_active_1')) {
        $this.removeClass('tab_active_1');
        $this.next(".toggle_content_1").slideUp(200);
    } else {
        $this.toggleClass('tab_active_1');
        $this.next('.toggle_content_1').slideDown(200);
    }
    });
	
	jQuery(".toggle_trigger_2").on("click", function() {
    let $this = $(this);
  
    if ($this.hasClass('tab_active_2')) {
        $this.removeClass('tab_active_2');
        $this.next(".toggle_content_2").slideUp(200);
    } else {
        $this.toggleClass('tab_active_2');
        $this.next('.toggle_content_2').slideDown(200);
    }
    });
	
	jQuery(".toggle_trigger_3").on("click", function() {
    let $this = $(this);
  
    if ($this.hasClass('tab_active_3')) {
        $this.removeClass('tab_active_3');
        $this.next(".toggle_content_3").slideUp(200);
    } else {
        $this.toggleClass('tab_active_3');
        $this.next('.toggle_content_3').slideDown(200);
    }
    });
	
	jQuery(".toggle_trigger_4").on("click", function() {
    let $this = $(this);
  
    if ($this.hasClass('tab_active_4')) {
        $this.removeClass('tab_active_4');
        $this.next(".toggle_content_4").slideUp(200);
    } else {
        $this.toggleClass('tab_active_4');
        $this.next('.toggle_content_4').slideDown(200);
    }
    });
	
	jQuery(".toggle_trigger_5").on("click", function() {
    let $this = $(this);
  
    if ($this.hasClass('tab_active_5')) {
        $this.removeClass('tab_active_5');
        $this.next(".toggle_content_5").slideUp(200);
    } else {
        $this.toggleClass('tab_active_5');
        $this.next('.toggle_content_5').slideDown(200);
    }
    });
	
		jQuery(".toggle_trigger_6").on("click", function() {
    let $this = $(this);
  
    if ($this.hasClass('tab_active_6')) {
        $this.removeClass('tab_active_6');
        $this.next(".toggle_content_6").slideUp(200);
    } else {
        $this.toggleClass('tab_active_6');
        $this.next('.toggle_content_6').slideDown(200);
    }
    });
	
   });