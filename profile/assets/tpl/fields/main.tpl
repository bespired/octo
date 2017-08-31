<template id='fields'>
<div class="main-area fields"
	:class="[{ dirty: dirty }, { with_sidebar: settings.sidebarActive }]">

	<fields-menu  :statics="statics" ></fields-menu>
	<fields-index :statics="statics" ></fields-index>
	<fields-save></fields-save>

	<fields-modal :is="modal"></fields-modal>

</div>
</template>
