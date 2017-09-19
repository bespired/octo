<script>
	Vue.component('fields', {

		template: '#fields',

		props: ['settings'],

		data: function(){
	  		return {
	  			statics: [],
	  			modal: '',
	  			dirty: false
	  		}
	  	},

		created() {

			var url = window.config.url.fields + '/json';
			this.$http.get(url)
				.then(function (response) {
					this.statics = response.data;
				},function (response) {
					console.log(response.data)
				});

			var self = this;

			comm.$on('clearModal', function () {
				self.modal = '';
			});


			comm.$on('fieldModal', function (modal, uid) {

				console.log(modal);

				if ( document.getElementById( 'module-fields-' + modal ) == null )
				{

					self.loadModule( 'fields', modal, uid, self);

				}else{

					self.modal = 'fields-' + modal;
					Vue.nextTick( function(){
						comm.$emit(self.showcommand(modal), self.statics.field[uid]);
					});

				}
			});

			comm.$on('fieldDirty', function () {
				self.dirty = true;
			});

			comm.$on('fieldChanged', function () {
				self.dirty = true;
			});

			comm.$on('fieldSaved', function () {
				self.dirty = false;
			});
		},

		methods:{

			capitalizeFirstLetter(string) {
    			return string.charAt(0).toUpperCase() + string.slice(1);
			},

			showcommand: function(modal){
				return 'field'+ this.capitalizeFirstLetter(modal) +'Show';
			},

			loadModule: function(module, modal, uid, self) {

				var jsElm    = document.createElement("script");
				jsElm.type   = 'application/javascript';
				jsElm.id     = 'module-' + module + '-' + modal;
				jsElm.src    = config.url[module] + '/' + modal;

				jsElm.onload = function(){
					self.modal = module + '-' + modal;
					Vue.nextTick( function(){
						comm.$emit(self.showcommand(modal), self.statics.field[uid]);
					});

				};
				document.body.appendChild(jsElm);
			}
		}


	});
</script>
