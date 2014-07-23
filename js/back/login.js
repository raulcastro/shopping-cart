// Page load delay by Curtis Henson - http://curtishenson.com/articles/quick-tip-delay-page-loading-with-jquery/
$(function(){
	$('.login button').click(function(e){ 
		// Do some stuff 
		$(this).addClass("loading"); 
 
		// Stop doing stuff  
		// Wait 700ms before loading the url 
		setTimeout(function(){
			$('#login-form').submit();
		}, 5000);	  
 
		// Don't let the link do its natural thing 
		e.preventDefault;
		return false;
	});

	$('input').each(function() {

		var default_value = this.value;

		$(this).focus(function(){
			if(this.value == default_value) {
				this.value = '';
			}
		});

		$(this).blur(function(){
			if(this.value == '') {
				this.value = default_value;
			}
		});

	});
});