<script>
	Vue.component('fields-pagination', {

		template: '#fields-pagination',

		data: function(){
			return {
				current: 1,
				pages: 3
			}
		},

		created() {
			var self = this;
			comm.$on('setPages', function (pages) {
				self.pages = pages;
			});
		},

		methods:{
			page_select: function(page){
				this.current = page;
				comm.$emit('otherPage', page);
			},

			page_direction: function(direction){
				this.current += direction;
				if ( this.current < 1 ) this.current = 1;
				if ( this.current > this.pages ) this.current = this.pages;
				// console.log( this.current);
				comm.$emit('otherPage', this.current);
			}
		},

	});
</script>