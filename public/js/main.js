/**
 * @author aks
 */
$(function(){

	var lambda = arguments.callee;
	
	$('.full').live('inflate', function(event){
		$(this).inflate();
	});
	
	$('.fullw').live('inflate', function(event){
		$(this).inflate({
			height: 0
		});
	});
	
	$('.fullh').live('inflate', function(event){
		$(this).inflate({
			width: 0
		});
	});
	
	$(window).bind('resize', function(event){
		$('body').css('font-size', $(document).width() / 64 + 'px');
		$('.full, .fullw, .fullh').trigger('inflate');
	}).trigger('resize');
	
	
	$('.projectname .text').live('autoScroll', function(event){
		$(this).autoScroll();
	}).trigger('autoScroll');
	
	
	$('.element.projects').live('autoUpdate', function(event){
		$(this).autoUpdate({
			manual: true,
			//interval: 60000,
			action: function(dfd){
				var elem = this;
				jQuery.get(this.attr('href'), function(html){
					elem.fadeOut(function(){
						elem.html(html);
						// простой вызов почему-то не работает
						setTimeout(function(){
							elem.find('.full, .fullw, fullh').trigger('inflate');
							elem.find('.projectname .text').trigger('autoScroll');
							// привязываем обновление посторочно
							elem.find('.element.project').each(function(index, element){
								$(this).find('.element.projectname, .element.projectprogress, .element.projectdeadline, .element.projectusers').trigger('autoUpdate');
							});
						}, 0);
					}).fadeIn(function(){
						dfd.resolveWith(elem);
					});
				}, 'html');
			},
		});
	}).trigger('autoUpdate');
	
	
	$('.element.projectname').live('autoUpdate', function(event){
		$(this).autoUpdate({
			interval: 1000,
			action: function(dfd){
				var elem = this;
				jQuery.post(this.attr('href'), function(json){
					elem.fadeOut(function(){
						elem.find('.text').text(json.data.name);
					}).fadeIn(function(){
						dfd.resolveWith(elem);
					});
				}, 'json');
			},
		})
	});
	
	
	$('.element.projectprogress').live('autoUpdate', function(event){
		$(this).autoUpdate({
			interval: 1000,
			action: function(dfd){
				var elem = this;
				jQuery.post(this.attr('href'), function(json){
					elem.find('.text').text(json.data.percent + '%');
					elem.find('.bar').animate({
						'width': json.data.percent + '%',
						'background-color': json.data.color,
					}, {
						step: function(now, fx){
							elem.find('.bar .full').inflate();
						},
						complete: function(){
							dfd.resolveWith(elem);
						},
					});
				}, 'json');
			},
		});
	});
	
	
	$('.element.projectdeadline').live('autoUpdate', function(event){
		$(this).autoUpdate({
			interval: 1000,
			action: function(dfd){
				var elem = this;
				jQuery.post(this.attr('href'), function(json){
					elem.find('.text').text(json.data.date);
					elem.find('.inset').animate({
						'background-color': json.data.color,
					}, {
						complete: function(){
							dfd.resolveWith(elem);
						},
					});
				}, 'json');
			},
		});
	});
	
	
	$('.element.projectusers').live('autoUpdate', function(event){
		$(this).autoUpdate({
			interval: 1000,
			action: function(dfd){
				var elem = this;
				jQuery.get(this.attr('href'), function(html){
					elem.fadeOut(function(){
						elem.html(html);
						// простой вызов почему-то не работает
						setTimeout(function(){
							elem.find('.full').trigger('inflate')
						}, 0);
					}).fadeIn(function(){
						dfd.resolveWith(elem);
					});
				}, 'html');
			},
		});
	});
	
	// привязываем обновление посторочно
	$('.element.projects').each(function(index, element){
		$(this).find('.element.projectname, .element.projectprogress, .element.projectdeadline, .element.projectusers').trigger('autoUpdate');
	});
	
	$('.element.calendar').live('autoUpdate', function(event){
		$(this).autoUpdate({
			interval: 500,
			waitOthers: false,
			action: function(dfd){
				var dots = this.data('dots') ? false : true;
				this.data('dots', dots);
				var dow = ['вс', 'пн', 'вт', 'ср', 'чт', 'пт', 'сб'];
				var moy = ['январь', 'февраль', 'март', 'апрель', 'май', 'июнь', 'июль', 'август', 'сентябрь', 'октябрь', 'ноябрь', 'декабрь'];
				var d = new Date();
				var pad = function(val, num){
					return (--num && Math.pow(10, num) > val) ? pad('0' + val, num) : val;
				}
				this.find('.time').html(d.getHours() + (dots ? '<span style="opacity:0">:</span>' : '<span>:</span>') + pad(d.getMinutes(), 2));
				this.find('.date').html(dow[d.getDay()] + ', ' + d.getDate() + ' ' + moy[d.getMonth()] + ' ' + (1900 + d.getYear()));
				dfd.resolveWith(this);
			}
		});
	}).trigger('autoUpdate');
	
	$('.element').live('element', function(event){
		$(this).bind('mouseover', function(event){
			event.stopPropagation();
			$(this).css({
				'background-color': '#494949',
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
	}).trigger('element');
});
