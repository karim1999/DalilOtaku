import VueTagsInput from '@johmun/vue-tags-input';
const profile = new Vue({
    el: '#tagsInput',
    components: {
        VueTagsInput,
    },
    data: {
        tag: '',
        tags: [],
    },
    mounted(){
        console.log(this.$refs.initial.value)
        this.tags= this.$refs.initial.value.split(",").map(item=>{
            return {
                text: item
            }
        })
    },
    computed: {
        getTagsAsString(){
            return this.tags.map(e => e.text).join(",");
        },
    }
});
