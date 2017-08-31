<template id='side-bar'>
	<aside :class="[ settings.sidebarComponent, { with_sidebar: settings.sidebarActive } ]">
		<component :is="settings.sidebarComponent"></component>
	</aside>
</template>
