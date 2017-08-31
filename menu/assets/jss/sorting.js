 var Sorting = {

	grouped: function(arr, grpname, sortdir)
	{
		var grp= {};
		for(var idx=0; idx < arr.length; idx++)
		{
			if (grp[arr[idx][grpname]] === undefined ) grp[arr[idx][grpname]] = [];
			grp[arr[idx][grpname]].push( arr[idx]);
		}
		var arr = Object.keys(grp).map(function(key){ return grp[key]; });

		arr.sort(function(a,b){
			if (a > b) return  sortdir;
			if (a < b) return -sortdir; 
			return 0;
		});
		return arr;
	},

	sort_grouped: function(arr, sortname, grpname, sortdir, grpdir)
	{
		if (grpdir === undefined) grpdir= 1;
	
		var grp= this.grouped(arr, grpname, grpdir);
		
		arr= [];
		for(var idx in grp)
		{
			grp[idx].sort(function(a,b){
				if (a[sortname] > b[sortname]) return  sortdir;
				if (a[sortname] < b[sortname]) return -sortdir; 
				return 0;
			});
			arr= arr.concat(grp[idx]);
		}

		return arr;

	},

	sort_all:function(arr, sortname, sortdir)
	{
		if (sortdir === undefined) sortdir= 1;

		arr.sort(function(a,b){
			if (a[sortname] > b[sortname]) return  sortdir;
			if (a[sortname] < b[sortname]) return -sortdir; 
			return 0;
		});
		return arr;

	}
 	
 }