/**
 * @author aks
 */
$(function(){

	var lambda = arguments.callee;
	
	$(window).bind('resize', function(event){
		$(document.body).css('font-size', $(document).width() / 64 + 'px');
	}).trigger('resize');
	
	
	$('.element.project .name .text, .element.project .description .text, .element.issue .subject .text, .element.issue .status .text').live('autoScroll', function(event){
		event.stopPropagation();
		
		$(this).autoScroll();
	});
	
	
	$('.element.project').live('autoUpdate', function(event){
		event.stopPropagation();
		
		$(this).autoUpdate({
			interval: 5000,
			waitOthers: false,
			action: function(dfd){
				var elem = this;
				jQuery.post(this.attr('href'), function(json){
				
					elem.find('.name .text').text(json.data.name);
					
					elem.find('.description .text').text(json.data.description);
					
					elem.find('.issuescount .text').fadeOut(function(){
						$(this).text(json.data.issuescount);
					}).fadeIn();
					
					elem.find('.update .text').fadeOut(function(){
						$(this).text(json.data.update);
					}).fadeIn();
					
					dfd.resolveWith(elem);
					
				}, 'json');
			},
		});
	});
	
	
	$('.element.issue').live('autoUpdate', function(event){
		event.stopPropagation();
		
		$(this).autoUpdate({
			interval: 1000,
			action: function(dfd){
				var elem = this;
				jQuery.post(this.attr('href'), function(json){
				
					elem.find('.subject .text').text(json.data.subject);
					
					elem.find('.status .text').text(json.data.status);
					
					elem.find('.progress .text').fadeOut(function(){
						$(this).text(json.data.percent + '%');
					}).fadeIn();
					
					elem.find('.bar').animate({
						'width': json.data.percent + '%',
						'background-color': json.data.progress_color,
					});
					
					elem.find('.deadline .text').fadeOut(function(){
						$(this).text(json.data.deadline);
					}).fadeIn();
					
					elem.find('.deadline .inset').animate({
						'background-color': json.data.deadline_color,
					});
					
					dfd.resolveWith(elem);
					
				}, 'json');
			},
		});
	});
	
	
	$('.element.calendar').live('autoUpdate', function(event){
		event.stopPropagation();
		
		// разностное время
		var diffDate = 0;
		
		$(this).autoUpdate({
			interval: 60000,
			waitOthers: false,
			action: function(dfd){
				var elem = this;
				jQuery.post(this.attr('href'), function(json){
					diffDate = (new Date()).getTime() - json.data.date * 1000;
					dfd.resolveWith(elem);
				}, 'json');
			},
		});
		
		$(this).find('.time').autoUpdate({
			interval: 500,
			waitOthers: false,
			action: function(dfd){
				var dots = this.data('dots') ? false : true;
				this.data('dots', dots);
				var d = new Date((new Date()).getTime() - diffDate);
				var pad = function(val, num){
					return (--num && Math.pow(10, num) > val) ? pad('0' + val, num) : val;
				}
				this.html(pad(d.getHours(), 2) + (dots ? '<span style="opacity:0">:</span>' : '<span>:</span>') + pad(d.getMinutes(), 2));
				dfd.resolveWith(this);
			}
		});
		
		$(this).find('.date').autoUpdate({
			interval: 10000,
			waitOthers: false,
			action: function(dfd){
				var dow = ['вс', 'пн', 'вт', 'ср', 'чт', 'пт', 'сб'];
				var moy = ['январь', 'февраль', 'март', 'апрель', 'май', 'июнь', 'июль', 'август', 'сентябрь', 'октябрь', 'ноябрь', 'декабрь'];
				var d = new Date((new Date()).getTime() - diffDate);
				var pad = function(val, num){
					return (--num && Math.pow(10, num) > val) ? pad('0' + val, num) : val;
				}
				this.html(dow[d.getDay()] + ', ' + d.getDate() + ' ' + moy[d.getMonth()] + ' ' + d.getFullYear());
				dfd.resolveWith(this);
			}
		});
	});
	
	
	$('.element').live('element', function(event){
		$(this).bind('mouseover', function(event){
			event.stopPropagation();
			$(this).css({
				'background-color': '#404040',
				'cursor': 'pointer'
			});
		});
		
		$(this).bind('mouseout', function(event){
			event.stopPropagation();
			$(this).css({
				'background-color': 'transparent',
				'cursor': 'default'
			});
		});
		
		$(this).bind('click', function(event){
			event.stopPropagation();
			window.location.href = $(this).attr('href');
		});
	});
	
	
	$(document.body).animate({
		'opacity': 1
	}, 'slow', function(){
		var triggerBehaviors = function(){
			$('.element').trigger('element');
			$('.element.project').trigger('autoUpdate');
			$('.element.issue').trigger('autoUpdate');
			$('.element.calendar').trigger('autoUpdate');
			$('.text').trigger('autoScroll');
		};
		
		var layout = $('.element.layout');
		if (layout.length) {
			layout.load(layout.attr('href'), triggerBehaviors);
		} else {
			triggerBehaviors();
		}
	});
});
