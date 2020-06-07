<template>
    <div class="actions-area row">
        <i @click="menuToggle" class="fa fa-plus-circle clickable toggle-icon"></i>
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
