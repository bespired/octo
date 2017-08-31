function addClass(el, classNameToAdd){
	var newClass = el.className + ' ' + classNameToAdd; 
    el.className = newClass.trim();
}

function removeClass(el, classNameToRemove){
    var elClass = ' ' + el.className + ' ';
    while(elClass.indexOf(' ' + classNameToRemove + ' ') !== -1){
         elClass = elClass.replace(' ' + classNameToRemove + ' ', '');
    }
    el.className = elClass.trim();
}


function selectById(uid)
{
	var select= document.getElementById(uid);
	addClass(select, 'selected');
}

function deselectAll()
{
	var selected= document.querySelectorAll('.selected');
	selected.forEach(function(select){
		removeClass(select, 'selected');
	});
}

function selectOneById(uid)
{
	deselectAll();
	addClass(document.getElementById(uid), 'selected');
}


function bodyScroll(lock)
{
	document.querySelector('body').style.overflow = (lock == true) ? '' : 'hidden';
}