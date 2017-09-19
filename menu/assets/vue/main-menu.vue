	Vue.component('main-menu', {

		template: '#main-menu',

		props: ['settings', 'currentRoute'],

		data: function () {
			return {
				mainMenu
			};
		},

		created() {
			// check if first load?
			if ( window.location.pathname.length > 1 )
				this.view(window.location.pathname);
		},

		methods:{
			sideBar: function(){
				comm.$emit('sidebarChanged', !this.settings.sidebarActive);
			},

			view: function(route){

				while( route.charAt( 0 ) === '/' )
    				route = route.slice( 1 );

				window.history.pushState(null, route, route);

				var found= this.itemByRoute(route);

				if ( found === undefined ) return;
				if ( found.route === undefined ) return;

				if ( document.getElementById(this.mod_id(found)) == null )
				{

					this.loadCss(found);
					this.loadModule(found);

				}else{

					comm.$emit('setModule', found.component);

				}

			},

			itemByRoute: function(route){
				var found = null;
				mainMenu.forEach( function(mnu){
					var subMenu = mnu.submenu;
					if ( subMenu ){
						subMenu.forEach( function(smn){
							if ( route == smn.route ) found= smn;
						});
					}
				});
				return found;
			},

			mod_id: function(smn){
				return 'module-' + smn.component;
			},

			loadCss: function(smn) {

				var link   = document.createElement('link');
			    link.id    = 'style-' + smn.component;
			    link.rel   = 'stylesheet';
			    link.type  = 'text/css';
			    link.media = 'all';
			    link.href  = smn.load + '/stylesheet';
			    document.getElementsByTagName('head')[0].appendChild(link);

			},

			loadModule: function(smn) {

				var jsElm    = document.createElement("script");
				jsElm.type   = 'application/javascript';
				jsElm.id     = this.mod_id(smn);
				jsElm.src    = smn.load + '/module';

				jsElm.onload = function(){
					comm.$emit('setModule', smn.component);
				};
				document.body.appendChild(jsElm);
				window.config.url[smn.component] = smn.load;
			}

		}
	});