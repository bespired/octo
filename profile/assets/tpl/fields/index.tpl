<template id='fields-index'>
<div class="fields-index">
	<div class="fields-table" >
		<ul class="header">
			<li class="w06 subs">Group</li>
			<li class="w12 name" @click="sorted('name')"             >Name        <i>{{ sortview('name') }}</i></li>
			<li class="w05 subs" @click="sorted('uid')"              >Uid         <i>{{ sortview('uid') }}</i></li>
			<li class="w23"      @click="sorted('description')"      >Description <i>{{ sortview('description') }}</i> </li>
			<li class="w08"      @click="sorted('field_function')"   >Function    <i>{{ sortview('field_function') }}</i></li>
			<li class="w04 subs" @click="sorted('storage_type')"     >Storage     <i>{{ sortview('storage_type') }}</i></li>
			<li class="w08"      @click="sorted('information_type')" >Info        <i>{{ sortview('information_type') }}</i> Type</li>
			<li class="w08 subs" @click="sorted('field_type')"       >Type        <i>{{ sortview('field_type') }}</i></li>
			<li class="w05 subs" @click="sorted('field_sub_type')"   >Sub         <i>{{ sortview('field_sub_type') }}</i> Type</li>
			<li class="w04"      @click="sorted('encryption_type')"  >Encryption  <i>{{ sortview('encryption_type') }}</i></li>
			<li class="w05 subs" @click="sorted('process')"          >Process     <i>{{ sortview('process') }}</i></li>
			<li class="w07"      @click="sorted('validation')"       >Validation  <i>{{ sortview('validation') }}</i></li>
			<li class="w05 mw80px acts">Actions</li>
		</ul>
		<ul v-for="row in rows" v-if="row.deleted !== 'true'"
			:id="row.uid" class="row" :class="[{changed:row.changed},{delete:row.delete},{selected:row.selected}]">
			<li class="w06 subs">{{ row.group }}</li>
			<li class="w12 name" :class="row.group">{{ row.name }}</li>
			<li class="w05 subs">{{ row.uid }}</li>
			<li class="w23 main">{{ row.description }}</li>
			<li class="w08 main">{{ row.field_function }}</li>
			<li class="w04 subs">{{ row.storage_type }}</li>
			<li class="w08 main">{{ row.information_type }}</li>
			<li class="w08 subs">{{ row.field_type }}</li>
			<li class="w05 subs">{{ row.field_sub_type }}</li>
			<li class="w04 main">{{ row.encryption_type }}</li>
			<li class="w05 subs">{{ row.process }}</li>
			<li class="w07 main">{{ row.validation }}</li>
			<li class="w05 mw80px acts">
				<button class="list-button" @click="edit(row.uid)"><i class="icon-pencil"></i></button>
				<button class="list-button" @click="remove(row.uid)"><i class="icon-cancel"></i></button>
			</li>
		</ul>
		<fields-pagination></fields-pagination>
	</div>
</div>
</template>
