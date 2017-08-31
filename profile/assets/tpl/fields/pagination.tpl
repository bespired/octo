<template id='fields-pagination'>
<div class="fields-pagination">
	<ul class="pagination" v-if="pages > 1">
		<li class="prev"><a @click="page_direction(-1)">-</a></li>
		<li class="page" :class="{ current: page == current }" v-for="page in pages">
			<a @click="page_select(page)">{{ page }}</a>
		</li>
		<li class="next"><a @click="page_direction(1)">+</a></li>
	</ul>
</div>
</template>
