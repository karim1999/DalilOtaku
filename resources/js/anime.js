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

    },
    methods: {
        loadAnime(){
            this.isLoadingAnime= true
            return axios.get(this.mainEndPoint + 'season/archive').then(res => {
                console.log(res.data.archive)
                res.data.archive.forEach(year => {
                    year.seasons.forEach(season => {
                        console.log("year:", year.year, "Season:", season)
                        // return "hi"
                        // axios.get(this.mainEndPoint + year.year + '/' + season).then(res => {
                        //     console.log(res.data)
                        // })
                    })
                })
            }).then(() => {
                this.isLoadingAnime= false
            }).catch(error => {
                console.log(error)
            })
        }
    }
});
