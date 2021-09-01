<template>
	<div><p v-if="item.associatedModel"><img :src="item.associatedModel.image" alt="" class="img-thumbnail" width="80px"></p></div>
</template>

<script>
    export default {
        props: ['item'],
        mounted() {

        },
        methods: {
            updateItem: function(){

            },
        }
    }
</script>

