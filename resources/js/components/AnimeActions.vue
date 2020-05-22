<template>
    <div class="actions-area row">
        <a :class="{unique: isBookmarked}" :href="url + '/bookmarks'"><p class="clickable">{{bookmarks}}<i class="far fa-bookmark"></i></p></a>
        <a :class="{unique: isFavorite}" :href="url + '/favorites'"><p class="clickable">{{favorites}}<i class="far fa-heart"></i></p></a>
        <i @click="menuToggle" class="fa fa-ellipsis-v clickable"></i>
        <div v-if="showMenu" class="action-list">
            <ul>
                <li>اضف الانمي الي:</li>
                <a :href="url + '/watching/watching'"><li :class="{active: isWatching}"><i class="fa fa-check-circle"></i> الانميات المتابعة</li></a>
                <a :href="url + '/watching/watched'"><li :class="{active: isWatched}"><i class="fa fa-check-circle"></i> تمت مشاهدتها</li></a>
                <a :href="url + '/watching/later'"><li :class="{active: isLater}"><i class="fa fa-check-circle"></i> المشاهدة لاحقا</li></a>
            </ul>
        </div>
    </div>
</template>

<script>
    export default {
        name: "AnimeActions",
        props: [
            "favorites",
            "bookmarks",
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
            }
        }
    }
</script>

<style scoped>

</style>
