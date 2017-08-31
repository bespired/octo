	// create a root instance

	Vue.component('main-root', {

	  	template: '#main-root',
	  	
	  	data: function(){
	  		return {
	  			current: 'welcome',
	  			settings: Settings.load(),
	  		}
	  	},

	  	mounted: function(){
	  		comm.$emit('sidebarChanged', this.settings.sidebarActive);
	  	},

	  	created() {
			var self = this;
			comm.$on('sidebarChanged', function (setting) {
				self.settings.sidebarActive = setting;
				Settings.save(self.settings);
			});

			comm.$on('setModule', function (module) {
				self.current = module;
			});
				
		}
	});

	var comm = new Vue();

	new Vue({
	  el: '#vue'
	});

	document.querySelectorAll('template').forEach(function(node){ node.remove(); });
