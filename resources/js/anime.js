import VuePromiseBtn from 'vue-promise-btn'

// not required. Styles for built-in spinner
import 'vue-promise-btn/dist/vue-promise-btn.css'

Vue.use(VuePromiseBtn)

import axios from 'axios';
const anime = new Vue({
    el: '#anime',
    data: {
        isLoadingAnime: false,
        mainEndPoint: 'https://api.jikan.moe/v3/',
        axiosConfig: {
            baseURL: 'https://api.jikan.moe/v3/',
            headers: {
                'Access-Control-Allow-Origin': '*',
                'Access-Control-Allow-Headers': 'Origin, Content-Type, X-Auth-Token',
                'Access-Control-Allow-Methods': 'GET, POST, PATCH, PUT, DELETE, OPTIONS',
                'Content-Type': 'application/x-www-form-urlencoded'
            },
        }
    },
    methods: {
        loadAnime(){
            this.isLoadingAnime= true
            return axios.get(this.mainEndPoint+ 'season/archive').then(async res => {
                console.log(res.data.archive);
                for (let i= 0; i < res.data.archive.length; i++){
                    let year= res.data.archive[i]
                    for (let j= 0; j < year.seasons.length; j++){
                        let season= year.seasons[j]
                        await axios.get(this.mainEndPoint+ 'season/' + year.year + '/' + season.toLowerCase(), {
                            headers: {
                            }
                        }).then(res => {
                            console.log(res.data)
                        })
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
