import VuePromiseBtn from 'vue-promise-btn'
import apolloProvider from './anichart'
import axios from 'axios';
import gql from 'graphql-tag'

// not required. Styles for built-in spinner
import 'vue-promise-btn/dist/vue-promise-btn.css'

Vue.use(VuePromiseBtn)

const anime = new Vue({
    el: '#anime',
    apolloProvider,
    data: {
        isLoadingAnime: false,
        mainEndPoint: 'https://api.jikan.moe/v3/',
        list: [],
        archive: []
    },
    methods: {
        sleep(ms) {
            return new Promise(resolve => setTimeout(resolve, ms));
        },
        async loadAnimeAiringInfo(mal_id){
            await this.$apollo.query({
                query: gql`query fetch($idMal: Int){
              Media (idMal: $idMal) {
                id
                nextAiringEpisode {
                  timeUntilAiring
                  airingAt
                  episode
                }
              }}`,
                variables: {
                    idMal: mal_id,
                }
            }).then(data => {
                console.log(data)
            }).catch(error => {
                console.log("Error: Anime is not available in Anichart.")
            })

        },
        async loadAnimeByYearSeason(year, season){
            await axios.get(this.mainEndPoint+ 'season/' + year + '/' + season.toLowerCase()).then(async res=> {
                for (let m= 0; m < res.data.anime.length; m++){
                    let anime= res.data.anime[m]
                    await this.loadAnimeAiringInfo(anime.mal_id)
                }
                await axios.post('/admin/animes/addbatch', {
                    year: year,
                    season,
                    animes: JSON.stringify(res.data.anime)
                }).then(res => {
                    console.log("server:", res)
                })

                this.list.push("Finished Fetching data");
                console.log(res.data)
                // return this.sleep(10000)
            }).catch(error => {
                console.log("Error with anime fetching")
            })
        },
        loadSeasonsAchive(){
            this.list= []
            this.isLoadingAnime= true
            return axios.get(this.mainEndPoint+ 'season/archive').then(async res => {
                this.archive= res.data.archive
                this.list.push("Starting...");
                console.log(res.data.archive);
                for (let i= 0; i < res.data.archive.length; i++){
                    let year= res.data.archive[i]
                    for (let j= 0; j < year.seasons.length; j++){
                        let season= year.seasons[j]
                        this.list.push("Fetching data from Year: "+ year.year + " Season: "+season);
                        await this.loadAnimeByYearSeason(year.year, season)
                    }

                }
            }).then(() => {
                console.log("done")
                this.isLoadingAnime= false
            }).catch(error => {
                console.log(error)
            })
        }
    }
});
