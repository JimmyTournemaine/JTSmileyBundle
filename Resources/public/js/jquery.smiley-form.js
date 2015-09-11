(function($)
{
	$.fn.smileypicker=function(options)
	{
		var defaults = {
				'parent': 'body',
				'svgDir': '../svg/'
		};
		var parameters = $.extend(defaults, options);

		function selectSmiley(e){
			e.attr("class", "smiley-div selected");
		}
		
		function deselectSmiley(e){
			e.attr("class", "smiley-div");
		}

		function deselectSelectedSmiley(){
			deselectSmiley($(".smiley-div.selected"));
		}

		/* Initialize */
		var form = this;
		var wrapper = this.after('<div id="smiley-wrapper"></div>').next();
		$.each(this.children(), function(i, e){
			wrapper.append(
					'<div class="smiley-div" data-target="'+e.value+'">'
					+ 	'<img src="'+parameters.svgDir+e.value+'.svg" alt="'+e.text+'" />'
					+ '</div>'
			);
		});
		selectSmiley(wrapper.children().first());

		/* Form Action -> update Smileys */
		wrapper.children().click(function(event){
				deselectSelectedSmiley();
				selectSmiley($(this));
				form.val($(this).data("target"));
			});
		
		/* Smiley selection -> update form */
		this.change(function(){
				deselectSelectedSmiley();
				selectSmiley($(".smiley-div[data-target='"+this.value+"']"));
			});
		return this;
	}
})(jQuery);