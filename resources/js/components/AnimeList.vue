<template>
    <div class="list-container version3" v-infinite-scroll="loadMore" infinite-scroll-disabled="busy" infinite-scroll-distance="15">
        <slot :animes="animes"></slot>
        <div v-if="isLoading" class="lds-ring"><div></div><div></div><div></div><div></div></div>
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
    .lds-ring {
        display: inline-block;
        position: relative;
        width: 80px;
        height: 80px;
    }
    .lds-ring div {
        box-sizing: border-box;
        display: block;
        position: absolute;
        width: 64px;
        height: 64px;
        margin: 8px;
        border: 8px solid #fff;
        border-radius: 50%;
        animation: lds-ring 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
        border-color: #fff transparent transparent transparent;
    }
    .lds-ring div:nth-child(1) {
        animation-delay: -0.45s;
    }
    .lds-ring div:nth-child(2) {
        animation-delay: -0.3s;
    }
    .lds-ring div:nth-child(3) {
        animation-delay: -0.15s;
    }
    @keyframes lds-ring {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
    }

</style>
