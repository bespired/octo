	Vue.component('input-select', {

		template: `
			<div class="input-select">
				<div class="input-selected" :class="{ open:visible }">
					<span class="selected">{{ selected }}&nbsp;</span>
					<button class="popup"  @click="toggle()"><i class="icon-down-open"></i></button>
				</div>
				<ul class="options" v-show="visible">
					<li v-for='option in options' @click="select(option.value)" >
					{{ option.label }}
					</li>
				</ul>
			</div>
		`,

		props: ['current', 'options', 'sync'],

		data: function () {
			return {
				visible:  false,
				selected: this.current
			};
		},

		watch: {
			current: function(input){
				this.selected = input;
			}
		},

		methods: {

			toggle: function(){
				this.visible = !this.visible;
			},

			select: function(val){
				this.visible  = false;
				this.selected = val;
				this.$emit('selected', this.sync, val);
			}
		}

	});