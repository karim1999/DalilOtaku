<template>
    <div class="list-container version3" v-infinite-scroll="loadMore" infinite-scroll-disabled="busy" infinite-scroll-distance="15">
        <slot :animes="animes"></slot>
    </div>
</template>

<script>
    import axios from 'axios'
    export default {
        name: "AnimeList",
        props: ["animesList"],
        data: function(){
            return {
                animes: [],
                link: "",
                page: 1,
                isLoading: false
            }
        },
        mounted(){
            console.log(this.animesList)
            this.animes= this.animesList.data
            this.link= this.animesList.next_page_url
        },
        methods: {
            loadMore(){
                if(this.link && !this.isLoading){
                    console.log("Loading More...")
                    this.isLoading= true
                    axios.get(this.link, {
                        params: {
                            json: true
                        }
                    }).then(res => {
                        console.log(res.data.data)
                        this.animes= this.animes.concat(res.data.data)
                        this.link= res.data.next_page_url
                    }).then(res => {
                        this.isLoading= false
                        console.log(this.animes)
                        console.log("Finished Loading.")
                    })
                }

            }
        }

    }
</script>

<style scoped>

</style>
