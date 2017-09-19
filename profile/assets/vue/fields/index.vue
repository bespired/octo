<script>
	Vue.component('fields-index', {

		template: '#fields-index',

		props: ['statics'],

		data: function(){
			return {
				sort: 'name',
				sortdir: 1,
				page: 1,
				max_rows: 15, // or... calculate from page height...
			}
		},

		methods: {

			sortview: function(by)
			{
				var sign = this.sortdir == 1 ? String.fromCharCode(59403) : String.fromCharCode(59404);
				return this.sort == by ? sign : '';
			},

			sorted: function(by)
			{

				if ( this.sort == by )
				{
					this.sortdir =- this.sortdir;
				}else{
					this.sort    = by;
					this.sortdir = 1;
				}

				this.$forceUpdate();

			},

			deselectAll: function(){
				for (var key in this.statics.field) {
					this.statics.field[key].selected = false;
				};
			},

			unChangeAll: function(){
				for (var key in this.statics.field) {
					this.statics.field[key].changed = false;
					if ( this.statics.field[key].delete ){
						this.statics.field[key].deleted = 'true';
					}
				};
			},

			selectOneById: function(uid){

				this.deselectAll();
				this.statics.field[uid].selected = true;

				this.$forceUpdate();

			},

			remove: function(uid){

				if (this.statics.field[uid].delete){
					this.statics.field[uid].delete = false;
				}else{
					this.statics.field[uid].delete = true;
				}
				this.$forceUpdate();
				comm.$emit('fieldDirty');

			},

			edit: function(uid){

				bodyScroll(false);
				this.selectOneById(uid);

				comm.$emit('fieldModal', 'edit', uid);

			},

			safeUid: function(uid){
				return uid;
			}

		},


		computed: {

			rows: function(){
				if ( this.statics.length == 0 ) return [];

				var rows= this.statics.field;
				var arr = Object.keys(rows);

				arr = arr.filter(function(key){
					// console.log(key);
					return rows[key].deleted != 'true';
				});
				arr = arr.map(function(key){ return rows[key]; });

				switch(this.sort)
				{
					case 'information_type':
					case 'uid':
						arr = Sorting.sort_all(arr, this.sort, this.sortdir);
						break;
					case 'name':
						arr = Sorting.sort_grouped(arr, 'name', 'group', this.sortdir);
						break;
					default:
						arr = Sorting.sort_grouped(arr, 'name', this.sort, 1, this.sortdir);
				}


				// paginate
				var pages = Math.ceil( arr.length / this.max_rows );
				comm.$emit('setPages', pages);


				var from = (this.page-1) * (this.max_rows);
				var part = arr.slice(from, from + this.max_rows);

				return part;
			}
		},

		created() {

			var self = this;
			comm.$on('fieldModalClear', function () {
				bodyScroll(true);
				self.deselectAll();
				self.$forceUpdate();
				comm.$emit('clearModal');
			});

			comm.$on('fieldChanged', function (uid) {
				self.statics.field[uid].changed = true;
				self.$forceUpdate();
			});

			comm.$on('fieldAdd', function (field) {
				var uid = self.safeUid(field.uid);
				// todo: uid exists? create other.

				self.statics.field[uid] = {};
				for(var i in field){
					self.statics.field[uid][i] = field[i];
				}
				self.statics.field[uid].changed = true;
				self.$forceUpdate();
				// todo: paginate to page with this new field.
			});

			comm.$on('otherPage', function (page) {
				self.page = page;
				self.$forceUpdate();
			});

			comm.$on('saveFields', function(){
				var save_location = config.url.fields.replace('load','save');
				self.$http.post(save_location,
					{ data: self.statics.field },
					{ emulateJSON: true }
				).then(function (response) {
    					// Success
    					self.unChangeAll();
    					self.$forceUpdate();
    					comm.$emit('fieldSaved');
					},function (response) {
						// error?
					});

			});

		}

	});

</script>