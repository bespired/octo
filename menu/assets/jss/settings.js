 var Settings = {

 	load: function(){
 		var data = localStorage.getItem('octöpussy');
 		if ( data === null )
 			return { 
 				sidebarActive: false,
 				sidebarComponent: 'about'
 			};

 		return JSON.parse( data );
 	},

 	save: function(data){
 		localStorage.setItem('octöpussy', JSON.stringify(data));	
 	}
 	
 }