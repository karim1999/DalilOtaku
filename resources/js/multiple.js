import Multiselect from 'vue-multiselect'
const multiple = new Vue({
    el: '#multipleSelect',
    components: {
        Multiselect,
    },
    data: {
        value: null,
        options: [],
        assigned: false
    },
    methods: {
        assignDefault(value){
            if(!this.assigned){
                this.value= value
                this.assigned= true
            }
        },
        nameLang (anime) {
            return anime.name || anime.name_en
        }
    },
    computed: {
        getGenresAsString(){
            // console.log(this.value)
            if(this.value)
                return this.value.map(e => e.id).join(",");
            else
                return ""
        }
    }
});
