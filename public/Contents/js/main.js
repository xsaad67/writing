jQuery(function($){var form=$('.contact-form');form.submit(function(){$this=$(this);$.post($(this).attr('action'),function(data){$this.prev().text(data.message).fadeIn().delay(3000).fadeOut();},'json');return false;});$('.gototop').click(function(event){event.preventDefault();$('html, body').animate({scrollTop:$("body").offset().top},500);});});