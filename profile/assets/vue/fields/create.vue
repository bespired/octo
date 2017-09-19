<script>
	Vue.component('fields-create', {

		template: '#fields-create',

		methods:{
			create: function(){
				// comm.$emit('createFields');
				comm.$emit('fieldModal', 'new', 0);
			}
		}

	});
</script>