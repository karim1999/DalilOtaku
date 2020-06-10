import apolloProvider from './anichart'
import infiniteScroll from 'vue-infinite-scroll'

let animeList= new Vue({
    el: "#anime_list",
    directives: {infiniteScroll},
    apolloProvider,
    data: {

    },

})
