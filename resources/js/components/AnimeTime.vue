<template>
    <li><i class="fa fa-play-circle unique"></i>{{Number.isInteger(airingTime) ? getTime : airingTime}}</li>
</template>

<script>
    import gql from 'graphql-tag'

    export default {
        name: "AnimeTime",
        props: ["status", "malId", "airingAt"],
        data: function () {
            return {
                airingTime: "",
                episode: 0
            }
        },
        created() {
            if(this.status) {
                this.airingTime = Number.parseInt(this.airingAt)
                this.loadAnimeAiringInfo(this.malId)
            }else {
                this.airingTime = "غير معروف"
            }
        },
        computed: {
            getTime(){
                let delta= parseInt(this.airingTime)
                let days = Math.floor(delta / 86400);
                delta -= days * 86400;

                let hours = Math.floor(delta / 3600) % 24;
                delta -= hours * 3600;

                let minutes = Math.floor(delta / 60) % 60;
                delta -= minutes * 60;

                return "الحلقة " + this.episode + " بعد " + days + " يوم و " + hours + " ساعات و " + minutes + " دقيقة"
            }
        },
        methods: {
            async loadAnimeAiringInfo(mal_id){
                await this.$apollo.query({
                    query: gql`query fetch($idMal: Int){
                      Media (type: ANIME, idMal: $idMal) {
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
                }).then(res => {
                    console.log(mal_id, res.data.Media)
                    if(res.data.Media.nextAiringEpisode){
                        this.airingTime= res.data.Media.nextAiringEpisode.timeUntilAiring
                        this.episode= res.data.Media.nextAiringEpisode.episode
                    }else{
                        this.airingTime= "غير معروف"
                    }
                }).catch(error => {
                    console.log("Error: Anime is not available in Anichart.")
                })

            },
        },
    }
</script>

<style scoped>

</style>
