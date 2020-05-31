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
    created(){
        this.loadAll()
    },
    methods: {
        async getAnimesFromAnilist(page){
            return await this.$apollo.query({
                query: gql`query fetch($page: Int){
                    Page (page: $page, perPage: 50) {
                        pageInfo {
                          total
                          currentPage
                          lastPage
                          hasNextPage
                          perPage
                        }
                        media(type: ANIME) {
                            idMal
                            format
                            siteUrl
                            status
                            startDate {
                                year
                                month
                                day
                            }
                            endDate {
                                year
                                month
                                day
                            }
                            averageScore
                            description
                            episodes
                            season
                            seasonYear
                            type
                            genres
                            studios (isMain: true) {
                                nodes {
                                  id
                                  name
                                }
                            }
                            coverImage {
                                extraLarge
                                large
                                medium
                                color
                            }
                            bannerImage
                            title {
                                romaji
                                english
                                native
                                userPreferred
                            }
                            nextAiringEpisode {
                                timeUntilAiring
                                airingAt
                                episode
                            }
                        }
                    }
                }`,
                variables: {
                    page: page,
                }
            }).then(res => {
                console.log(res.data)
                return res.data
            }).catch(error => {
                console.log("Error: Loading Animes from Anichart.", error)
            })

        },
        async sendAnimeToServer(animes){
            await axios.post('/admin/animes/addbatch', {
                animes: JSON.stringify(animes)
            }).then(res => {
                console.log("server:", res)
            })
        },
        async loadAll(){
            let page= 1
            let hasNextPage= true
            while (hasNextPage){
                console.log("Loading Page ", page)
                let data= await this.getAnimesFromAnilist(page)
                hasNextPage= data.Page.pageInfo.hasNextPage
                page++;
                try{
                    await this.sendAnimeToServer(data.Page.media)
                }catch(error){
                    console.log("Error: Saving to the sever.", error)
                }
            }
            console.log("Done")
        }
    }
});
