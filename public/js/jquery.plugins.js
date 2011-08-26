/**
 * @author User
 */
(function($){
	$.fn.extend({
		inflate: function(data){
			var options = {
				width: 1,
				height: 1,
			};
			
			var methods = {
				init: function(){
					$(this).data('inflate', {
						oldStyle: $(this).attr('style')
					});
					options.width && $(this).css('width', options.width * ($(this).parent().width() - $(this).outerWidth(true) + $(this).width()) + 'px');
					options.height && $(this).css('height', options.height * ($(this).parent().height() - $(this).outerHeight(true) + $(this).height()) + 'px');
				},
				
				destroy: function(){
					$(this).data('inflate') && $(this).removeAttr('style').attr('style', $(this).data('inflate').oldStyle).removeData('inflate');
				},
			};
			
			switch (typeof data) {
				case 'string':
					if (data in methods) {
						this.each(function(){
							methods[data].call($(this));
						});
					}
					else {
						$.error('Method ' + data + ' does not exist');
					}
					break;
					
				case 'object':
					var options = $.extend(options, data);
				default:
					this.each(function(){
						methods['init'].call($(this))
					});
					break;
			}
			return this;
		}
	});
	
	$.fn.extend({
		autoUpdate: function(data){
			var options = {
				manual: true,
				interval: 1000,
				action: function(dfd){
					//console.log(dfd);
					Math.random() > .5 ? dfd.resolveWith(this) : dfd.rejectWith(this);
				},
				success: function(){
					//console.log('success');
				},
				error: function(){
					//console.log('error');
				},
			};
			
			var methods = {
				init: function(){
					////console.log('init');
					if (this.data('autoUpdate')) {
						var settings = $.extend(this.data('autoUpdate'), data);
					}
					else {
						var settings = $.extend({}, options, data);
					}
					
					this.data('autoUpdate', settings);
					
					settings.manual || methods['start'].call(this);
				},
				
				start: function(){
					////console.log('start');
					var settings = this.data('autoUpdate'), elem = this;
					if (!settings || settings.manual) 
						return;
					
					clearTimeout(settings._tid);
					
					(function(){
						////console.log('lambda');
						var lambda = arguments.callee;
						////console.log('lambda: new dfd');
						settings._dfd = new jQuery.Deferred();
						
						jQuery.when(settings._dfd).always(function(name){
							settings._tid = setTimeout(lambda, settings.interval);
						});
						
						methods['update'].call(elem);
						
					})();
				},
				
				stop: function(){
					var settings = this.data('autoUpdate');
					if (!settings) 
						return;
					
					settings._dfd && settings._dfd.rejectWith(this);
					
					clearTimeout(settings._tid);
				},
				
				update: function(){
				
					////console.log('update');
					var settings = this.data('autoUpdate'), elem = this;
					if (!settings) 
						return;
					
					//console.log('update ' + elem.get(0).tagName + elem.index());
					clearTimeout(settings._tid);
					
					if (!settings._dfd || settings._dfd.isResolved() || settings._dfd.isRejected()) {
						////console.log('update: new dfd');
						settings._dfd = new jQuery.Deferred()
					}
					
					jQuery.when(settings._dfd).then(settings.success, settings.error);
					
					settings.action.call(elem, settings._dfd);
				},
				
				destroy: function(){
					methods['update'].call(this);
					this.removeData('autoUpdate');
				},
			};
			
			switch (typeof data) {
				case 'string':
					if (data in methods) {
						this.each(function(){
							methods[data].call($(this));
						});
					}
					else {
						$.error('Method ' + data + ' does not exist');
					}
					break;
					
				case 'object':
				default:
					this.each(function(){
						methods['init'].call($(this))
					});
					break;
			}
			return this;
		}
	});
	
	$.fn.extend({
		autoScroll: function(data){
			var options = {
				duration: 3000,
				interval: 1000,
			};
			
			var methods = {
				init: function(){
					if (this.parent().width() > this.width()) 
						return;
					
					var direction = true;
					
					this.autoUpdate({
						manual: false,
						interval: options.interval,
						action: function(dfd){
							direction ? this.animate({
								'margin-left': this.parent().width() - this.outerWidth()
							}, options.duration, function(){
								direction = false;
								dfd.resolveWith(this);
							}) : this.animate({
								'margin-left': 0
							}, options.duration, function(){
								direction = true;
								dfd.resolveWith(this);
							});
						}
					});
				},
				
				destroy: function(){
					this.autoUpdate('destroy');
				},
			};
			
			switch (typeof data) {
				case 'string':
					if (data in methods) {
						this.each(function(){
							methods[data].call($(this));
						});
					}
					else {
						$.error('Method ' + data + ' does not exist');
					}
					break;
					
				case 'object':
					var options = $.extend(options, data);
				default:
					this.each(function(){
						methods['init'].call($(this))
					});
					break;
			}
			return this;
		}
	});
})(jQuery);
