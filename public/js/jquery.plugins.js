/**
 * @author User
 */
(function($){
	$.fn.extend({
		autoUpdate: function(data){
			var options = {
				manual: false,
				interval: 1000,
				waitOthers: true,
				action: function(dfd){
					Math.random() > .5 ? dfd.resolveWith(this) : dfd.rejectWith(this);
				},
				success: function(){
				},
				error: function(){
				},
			};
			
			var methods = {
				init: function(){
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
					var settings = this.data('autoUpdate'), elem = this;
					if (!settings || settings.manual) 
						return;
					
					(function(justStarted){
						var dfd = settings._dfd = new jQuery.Deferred();
						
						var lambda = arguments.callee;
						
						if (settings.waitOthers) {
							window._dfd_pipe = (window._dfd_pipe) ? window._dfd_pipe.pipe(lambda, lambda) : dfd.pipe(lambda, lambda);
						}
						else {
							dfd.always(lambda)
						}
						
						if (justStarted) {
							settings._tid = setTimeout(function(){
								dfd.resolveWith(elem);
							}, 0);
							return dfd;
						}
						else {
							settings._tid = setTimeout(function(){
								methods['update'].call(elem);
							}, settings.interval);
							return dfd;
						}
					})(true);
				},
				
				stop: function(){
					var settings = this.data('autoUpdate');
					if (!settings) 
						return;
					
					settings._dfd && settings._dfd.rejectWith(this);
					
					clearTimeout(settings._tid);
				},
				
				update: function(){
					var settings = this.data('autoUpdate'), elem = this;
					if (!settings) 
						return;
					
					clearTimeout(settings._tid);
					
					if (!settings._dfd || settings._dfd.isResolved() || settings._dfd.isRejected()) {
						settings._dfd = new jQuery.Deferred()
					}
					
					jQuery.when(settings._dfd).then(settings.success, settings.error);
					
					settings.action.call(elem, settings._dfd);
				},
				
				destroy: function(){
					methods['stop'].call(this);
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
						waitOthers: false,
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
