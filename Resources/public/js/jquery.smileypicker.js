
/*
 * Smiley Picker
 *
 * @author Jimmy Tournemaine <jimmy.tournemaine@yahoo.fr>
 *
 * Licensed under the MIT license
 */

(function($) {

  $.fn.smileypicker = function(options) {
	  
	  var defaults = {
			  'svgDir': '../svg'
	  }
	  var params = $.extend(defaults, options);
	  
	  return this.each(function(){
		  var select = $(this);
		  var multiselect = select.attr('multiple');
		  select.hide();
		  
		  var picker = $('<div class="smiley-picker"></div>');
		  var ul = $('<ul class="select-smiley">');
		  var selectIndex = 0;
		  
		  select.children('option').each(function(){
			  var src = params.svgDir + '/' + $(this).val() + '.svg';
			  
			  var li = $('<li></li>');
			  if($(this).attr('disabled') || select.attr('disabled')) {
				  li.addClass('disabled');
			  } else {
				  li.append('<a href="#" data-select-index="' + selectIndex + '"><img class="image_picker" src="' + src + '"></a>');
			  }
			  
			  if($(this).attr('selected')){
				  li.children('a').addClass('picked');
			  }
			  
			  ul.append(li);
			  
			  selectIndex++;
		  });
		  picker.append(ul);
		  select.after(picker);
		  
		  picker.find('a').click(function(e) {
			  e.preventDefault();
			  var clickedOption = $(select.find('option')[$(this).data('select-index')]);
			  if(multiselect) {
				  if(clickedOption.attr('selected')) {
					  $(this).removeClass('picked');
					  clickedOption.removeAttr('selected');
				  } else {
					  $(this).addClass('picked');
					  clickedOption.attr('selected', 'selected');
				  }
			  } else {
				  if($(this).hasClass('picked')) {
					  	$(this).removeClass('picked');
	                    clickedOption.removeAttr('selected');
	                } else {
	                    picker.find('a').removeClass('picked');
	                    $(this).addClass('picked');
	                    clickedOption.attr('selected', 'selected');
	                }
	            }

	            select.trigger('change');
		  })
	  });
  }

})(jQuery);