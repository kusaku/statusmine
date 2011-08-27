/**
 * @author aks
 */
$(function(){

	var lambda = arguments.callee;
	
	$('.full').live('inflate', function(){
		$(this).inflate();
	});
	
	$('.fullw').live('inflate', function(){
		$(this).inflate({
			height: 0
		});
	});
	
	$('.fullh').live('inflate', function(){
		$(this).inflate({
			width: 0
		});
	});
	
	$(window).bind('resize', function(){
		$('body').css('font-size', $(document).width() / 64 + 'px');
		$('.full, .fullw, .fullh').trigger('inflate');
	}).trigger('resize');
	
	$('.project .projectname').autoUpdate({
		interval: 6000,
		action: function(dfd){
			var elem = this;
			jQuery.post(this.attr('lang'), function(json){
				elem.find('.text').text(json.data.name);
				dfd.resolveWith(elem);
			}, 'json');
		},
	});
	
	
	$('.project .projectprogress').autoUpdate({
		interval: 6100,
		action: function(dfd){
			var elem = this;
			
			jQuery.post(this.attr('lang'), function(json){
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
	
	$('.project .projectdeadline').autoUpdate({
		interval: 6200,
		action: function(dfd){
			var elem = this;
			
			jQuery.post(this.attr('lang'), function(json){
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
	
	$('.project .projectusers').autoUpdate({
		interval: 6300,
		action: function(dfd){
			var elem = this;
			
			jQuery.get(this.attr('lang'), 'naked=true', function(html){
				//elem.html(html).find('.full').trigger('inflate');
				elem.fadeOut(function(){
					elem.html(html);
					setTimeout(function(){
						elem.find('.full').trigger('inflate')
					}, 0);
				}).fadeIn(function(){
				
					dfd.resolveWith(elem);
				});
			}, 'html');
		},
	});
	
	$('.calendar').autoUpdate({
		interval: 500,
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
	
	$('.projectname .text').autoScroll();
});
