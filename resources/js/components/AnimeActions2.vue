<template>
    <div class="actions-area row"
         v-click-outside="hideMenu"
    >
        <i @click="menuToggle" class="fa fa-plus-circle clickable toggle-icon"></i>
        <div v-if="showMenu" class="action-list">
            <ul>
                <li>اضف الانمي الي:</li>
                <li @click="addAnime(url + '/watching/watching')" class="clickable"><i class="fa fa-check-circle"></i> الانميات المتابعة</li>
                <li @click="addAnime(url + '/watching/watched')" class="clickable"><i class="fa fa-check-circle"></i> تمت مشاهدتها</li>
                <li @click="addAnime(url + '/watching/later')" class="clickable"><i class="fa fa-check-circle"></i> المشاهدة لاحقا</li>
            </ul>
        </div>
    </div>
</template>

<script>
    import axios from "axios";
    export default {
        name: "AnimeActions",
        props: [
            "isFavorite",
            "isBookmarked",
            "isWatching",
            "isWatched",
            "isLater",
            "url"
        ],
        data: function () {
            return {
                showMenu: false
            }
        },
        methods: {
            menuToggle(){
                this.showMenu= !this.showMenu
            },
            hideMenu: function (event) {
                console.log("hide")
                this.showMenu= false
            },
            addAnime(url){
                console.log(url)
                let loading= this.$toasted.show('جاري الاضافة....',{
                    position: "top-center",
                    duration : 5000
                })
                axios.get(url).then(res => {
                    this.$toasted.clear()
                    this.$toasted.success('تمت اضافة الانمي بنجاح',{
                        position: "top-center",
                        duration : 2000
                    })
                    this.hideMenu()
                }).catch(err => {
                    this.$toasted.clear()
                    this.$toasted.error('حصل خطأ...',{
                        position: "top-center",
                        duration : 2000
                    })
                })
            }
        },
    }
</script>

<style scoped>

</style>
