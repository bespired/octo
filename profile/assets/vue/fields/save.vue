	Vue.component('fields-save', {

		template: '#fields-save',

		methods:{
			save: function(){
				comm.$emit('saveFields');
			}
		}

	});