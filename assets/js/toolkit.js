jQuery(document).ready(function( $ ){
	
	// inicio - pagina toolkit, tabs chamando o pop-up
	$('#dfd_tab_1').attr('onclick', 'mostrandoModal()');
	$('#dfd_tab_2').attr('onclick', 'mostrandoModal()');
	$('#dfd_tab_3').attr('onclick', 'mostrandoModal()');
	
	
	
	$( "#bt-dfd-download" ).on( "click", function(e) {
		$("#DFD-Modal").hide("1400");
	} );
	
	$( ".close-dfd" ).on( "click", function(e) {
		$("#DFD-Modal").hide("1400");
	} );

});

function mostrandoModal(){			
	function slideDownFromTop(elementId, duration) {
	  var element = document.getElementById(elementId);

	  element.style.display = 'block'; 
	  element.style.height = '0px';   
	  element.style.overflow = 'hidden'; 
	  element.style.transition = 'height ' + duration + 'ms ease-out';  


	  setTimeout(function() {
		element.style.height = element.scrollHeight + 'px';  
	  }, 0); 
	}

	slideDownFromTop("DFD-Modal", 800);
}