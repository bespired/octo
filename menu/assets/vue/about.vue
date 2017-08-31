	Vue.component('about', {
		
		template: '#about',

		methods: {
			save: function(){
				var test = {
					a: '3',
					b: [ 1, 2, 3 ]
				};

				this.$http.post(config.url.save, test)

					.then(function (response) {
    					// Success
    					console.log(response.data)
					},function (response) {
    				// Error
    					console.log(response.data)
					});
			}
		}
	});