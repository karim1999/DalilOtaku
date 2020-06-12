import apolloProvider from './anichart'
import infiniteScroll from 'vue-infinite-scroll'
import Toasted from 'vue-toasted';

Vue.use(Toasted)
let animeList= new Vue({
    el: "#anime_list",
    directives: {infiniteScroll},
    apolloProvider,
    data: {

    },

})
