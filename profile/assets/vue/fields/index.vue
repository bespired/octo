	Vue.component('fields-index', {

		template: '#fields-index',

		props: ['statics'],

		data: function(){
			return {
				sort: 'name',
				sortdir: 1,
				page: 1,
				max_rows: 25, // or... calculate from page height...
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

			remove: function(uid){

				bodyScroll(false);
				selectOneById(uid);

				// comm.$emit('fieldModal', 'edit', uid);

			},

			edit: function(uid){

				bodyScroll(false);
				selectOneById(uid);

				comm.$emit('fieldModal', 'edit', uid);

			}

		},


		computed: {

			rows: function(){
				if ( this.statics.length == 0 ) return [];

				var rows= this.statics.field;
				var arr = Object.keys(rows);

				arr = arr.filter(function(key){ console.log(key); return rows[key].deleted != 'true'; });
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

				console.log(part);
				return part;
			}
		},

		created() {

			var self = this;
			comm.$on('fieldModalClear', function () {
				bodyScroll(true);
				deselectAll();
				comm.$emit('clearModal');
			});

			comm.$on('fieldChanged', function (uid) {
				self.statics.field[uid].changed = true;
				self.$forceUpdate();
			});

			comm.$on('otherPage', function (page) {
				self.page = page;
				self.$forceUpdate();
			});

		}

	});