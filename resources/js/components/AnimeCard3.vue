<template>
    <div :data-id="anime.id" class="list-item">
        <div class="anime-container">
            <div class="middle row">
                <div class="anime-image">
                    <img class="lazyload" :data-src="anime.image_url" alt=''>
                    <div class="title-area">
                        <h5 class="ar-title text-center">{{anime.title}}</h5>
                        <h6 class="en-title text-center">{{anime.title_en}}</h6>
                    </div>
                </div>
                <div class="left">
                    <ul>
                        <template v-if="anime.releasing == 1">
                            <anime-time v-if="anime.airing_at" :mal-id="anime.mal_id" :status="anime.is_airing" :airing-at="anime.airing_at" :current-episode="anime.last_episode"></anime-time>
                        </template>
                        <anime-time v-else-if="anime.start_at" :mal-id="anime.mal_id" :status="true" :airing-at="anime.start_at" :current-episode="1"></anime-time>
                        <template v-else>
                            <li v-if="anime.year"><i class="fa fa-play-circle unique"></i>{{seasons[anime.season]}},{{anime.year}}</li>
                        </template>

                        <li v-if="anime.score"><i class="fa fa-star unique"></i>{{anime.score * 10}}%</li>
                        <li v-if="anime.favorites"><i class="fa fa-heart unique"></i>{{anime.favorites.length}}</li>
                    </ul>
                    <p>{{anime.description}}</p>
                    <ul class="sources row">
                        <li v-if="anime.ani_db"><a :href="anime.ani_db" :class="anime.ani_db ? 'active' : ''"><img src="/assets/icons1/aDB.svg" alt=''></a></li>
                        <li v-if="anime.anilist"><a :href="anime.anilist" :class="anime.anilist ? 'active' : ''"><img src="/assets/icons1/AL.svg" alt=''></a></li>
                        <li v-if="anime.ani_planet"><a :href="anime.ani_planet" :class="anime.ani_planet ? 'active' : ''"><img src="/assets/icons1/aS.svg" alt=''></a></li>
                        <li v-if="anime.website"><a :href="anime.website" :class="anime.website ? 'active' : ''"><img src="/assets/icons1/link.svg" alt=''></a></li>
                        <li v-if="anime.mal_id"><a :href="'https://myanimelist.net/anime/'+anime.mal_id" :class="anime.mal_id ? 'active' : ''"><img src="/assets/icons1/MAL.svg" alt=''></a></li>
                        <li v-if="anime.ani_search"><a :href="anime.ani_search" :class="anime.ani_search ? 'active' : ''"><img src="/assets/icons1/aS.svg" alt=''></a></li>
                    </ul>
                    <div class="bottom">
                        <ul class="categories">
                            <li v-for="genre in anime.genres.slice(0,3)">
                                <a :href="'/genre/'+genre.id" class="btn-category">
                                    {{genre.name ? genre.name : genre.name_en}}
                                </a>
                            </li>
                        </ul>
                        <slot :anime="anime"></slot>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
    export default {
        name: "AnimeCard3",
        props: ["anime"],
        data(){
            return {
                seasons: {
                    FALL: "خريف",
                    SPRING: "ربيع",
                    WINTER: "شتاء",
                    SUMMER: "صيف",
                }
            }
        }
    }
</script>

<style scoped>

</style>
