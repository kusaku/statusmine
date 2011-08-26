/**
 * @author aks
 */
$(function(){
	/*
	 * font-size constraints page size
	 */
	//alert(typeof 'sd');
	
	var lambda = arguments.callee;
	
	$(window).bind('resize', function(){
		$('body').css('font-size', $(document).width() / 64 + 'px');
		
		$('.full').inflate();
		
		$('.fullw').inflate({
			height: 0
		});
		$('.fullh').inflate({
			width: 0
		});
	}).trigger('resize');
	
	
	$('.progress').autoUpdate({
		manual: false,
		interval: 1000,
		action: function(dfd){
			percent = this.data('test') ? this.data('test') % 100 : Math.round(Math.random() * 100);
			this.find('.bar').css({
				width: percent + '%',
				background: 'rgb(' + Math.round(255 - 255 / 100 * percent) + ',' + Math.round(255 / 100 * percent) + ',0)'
			}).find('span').text(percent + '%');
			this.find('.full').inflate();
			this.data('test', ++percent);
			dfd.resolveWith(this);
		},
	});
	
	// пример использования
	$('.gravatar').autoUpdate({
		manual: false,
		interval: 2000,
		action: function(dfd){
			var a = ['dbb17b1a40d86df9e28c38023a2df6bc', 'a4d3940791c98c27816e5f57455a5fbe', '9d868bd51327f1f89aa1325da5bd4e13'];
			var b = a[Math.floor(Math.random() * 3)];
			this.find('img').attr('src', 'https://secure.gravatar.com/avatar/' + b);
			dfd.resolveWith(this);
		},
		success: function(){
			//console.log('success ' + elem.get(0).tagName + elem.index());
			this.animate({
				opacity: 0
			}, 500).animate({
				opacity: 1
			}, 500);
		}
	});
	
	$('.calendar').autoUpdate({
		manual: false,
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
			this.find('.time').html(d.getHours() + (dots ? '<span style="color:#0e0e0e">:</span>' : '<span>:</span>') + pad(d.getMinutes(), 2));
			this.find('.date').html(dow[d.getDay()] + ', ' + d.getDate() + ' ' + moy[d.getMonth()] + ' ' + (1900 + d.getYear()));
			dfd.resolveWith(this);
		}
	});
	
	$('.name span').autoScroll();
	
	$('body').autoUpdate({
		manual: true,
		interval: 3000,
		action: function(dfd){
			var body = this;
			$.when($.ajax('t2.html')).done(function(html){
				body.html(html);
				dfd.resolveWith(body);
			});
		},
		success: function(){
			$(window).trigger('resize');
		}
	});
});
