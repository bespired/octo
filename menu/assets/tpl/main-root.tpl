<template id='main-root'>
<div>
	<main-menu :settings="settings" ></main-menu>
	<side-bar  :settings="settings" ></side-bar>
	<main-area :settings="settings" :is="current"></main-area>
</div>
</template>