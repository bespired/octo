<template id='main-menu'>
	<header :class="{ with_sidebar: settings.sidebarActive }">
		<ul>
			<li class='logo'>
				<a @click="sideBar"><img src="./assets/svg/octopussy.svg"
					alt="OctoPüssy"
					onerror="this.onerror=null; this.src='./assets/png/octopussy.png'" />
				</a>
			</li>
	  		<li v-for="menu in mainMenu">
	  			<a href="#">{{ menu.label }}</a>
	    		<ul>
	  				<li v-for="submenu in menu.submenu">
	  					<a @click="view(submenu.route)">{{ submenu.label}}</a>
	  				</li>
				</ul>
			</li>
		</ul>
	</header>
</template>