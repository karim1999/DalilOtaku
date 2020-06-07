<template>
    <div class="list-item">
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
                        <anime-time v-if="anime.airing_at" :mal-id="anime.mal_id" :status="anime.is_airing" :airing-at="anime.airing_at" :current-episode="anime.last_episode"></anime-time>
                        <li v-if="anime.score"><i class="fa fa-star unique"></i>{{anime.score * 10}}%</li>
                        <li v-if="anime.score"><i class="fa fa-heart unique"></i>{{anime.favorites.length}}</li>
                    </ul>
                    <p>{{anime.description}}</p>
                    <ul class="sources row">
                        <li><a :href="anime.ani_db" :class="anime.ani_db ? 'active' : ''"><img src="/assets/icons1/aDB.svg" alt=''></a></li>
                        <li><a :href="anime.anilist" :class="anime.anilist ? 'active' : ''"><img src="/assets/icons1/AL.svg" alt=''></a></li>
                        <li><a :href="anime.ani_planet" :class="anime.ani_planet ? 'active' : ''"><img src="/assets/icons1/aS.svg" alt=''></a></li>
                        <li><a :href="anime.website" :class="anime.website ? 'active' : ''"><img src="/assets/icons1/link.svg" alt=''></a></li>
                        <li><a :href="anime.mal" :class="anime.mal ? 'active' : ''"><img src="/assets/icons1/MAL.svg" alt=''></a></li>
                        <li><a :href="anime.ani_search" :class="anime.ani_search ? 'active' : ''"><img src="/assets/icons1/aS.svg" alt=''></a></li>
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
        props: ["anime"]
    }
</script>

<style scoped>

</style>
