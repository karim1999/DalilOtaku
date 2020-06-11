<template>
    <div class="list-container version3" v-infinite-scroll="loadMore" infinite-scroll-disabled="busy" infinite-scroll-distance="500">
        <slot :animes="animes" :types="types"></slot>
        <div v-if="isLoading" class="loader-container">
            <div class="lds-ring"><div></div><div></div><div></div><div></div></div>
        </div>
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
                isLoading: false,
                types: {},
            }
        },
        mounted(){
            console.log(this.animesList)
            this.setTypes(this.animesList.data)
            this.animes= this.animesList.data
            this.link= this.animesList.next_page_url
        },
        methods: {
            setTypes(data){
                let types= {
                    TV: {
                        id: 0,
                        name: "انمي"
                    },
                    TV_SHORT: {
                        id: 0,
                        name: "انمي"
                    },
                    OVA: {
                        id: 0,
                        name: "اوفا"
                    },
                    ONA: {
                        id: 0,
                        name: "اونا"
                    },
                    MOVIE: {
                        id: 0,
                        name: "فيلم"
                    },
                }
                data.map(anime => {
                    if(anime.releasing == 0 || (anime.airing_at && anime.releasing == 1)){
                        if(types.TV.id == 0 && (anime.type == "TV" || anime.type == "TV_SHORT")){
                            types.TV.id= anime.id
                        }
                        // if(types.TV_SHORT.id == 0 && anime.type == "TV_SHORT"){
                        //     types.TV_SHORT.id= anime.id
                        // }
                        if(types.MOVIE.id == 0 && anime.type == "MOVIE"){
                            types.MOVIE.id= anime.id
                        }
                        if(types.OVA.id == 0 && (anime.type == "OVA")){
                            types.OVA.id= anime.id
                        }
                        if(types.ONA.id == 0 && anime.type == "ONA"){
                            types.ONA.id= anime.id
                        }
                    }
                })
                this.types= types
                console.log(types)

            },
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
                        this.setTypes(this.animes)
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
