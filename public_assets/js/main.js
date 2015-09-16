jQuery(function($) {

    $(document).ready(function() {


    	//Placeholder
    	function add() {if($(this).val() == ''){$(this).val($(this).attr('placeholder')).addClass('placeholder');}}
	    function remove() {if($(this).val() == $(this).attr('placeholder')){$(this).val('').removeClass('placeholder');}}
	    if (!('placeholder' in $('<input>')[0])) { // Create a dummy element for feature detection
	        $('input[placeholder], textarea[placeholder]').blur(add).focus(remove).each(add); // Select the elements that have a placeholder attribute
	        $('form').submit(function(){$(this).find('input[placeholder], textarea[placeholder]').each(remove);}); // Remove the placeholder text before the form is submitted
	    }


	    //Fancybox - Zoom Image
	    $('.fancybox').fancybox({
	    	openEffect: 'fade',
	    	closeEffect: 'fade',
	    	nextEffect: 'fade',
	    	prevEffect: 'fade'
	    });


		//Menu
      	$('.navbar-toggle').bind('change', function () {
	        var url = $(this).val();
          	if (url) {
            	window.location = url;
          	}
          	return false;
      	});


  		//Forms
        $("#inputtel, .phones").mask("(99) 9999-99999");
        $(".rg").mask("99.999.999-9");
        $(".cpf").mask("999.999.999.99");
        $('.datepicker').datepicker({
		    format: 'dd/mm/yyyy'
		});

	});

});
