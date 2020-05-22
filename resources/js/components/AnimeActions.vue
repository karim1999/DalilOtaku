<template>
    <div class="actions-area row">
        <p class="clickable">{{bookmarks}}<i class="far fa-bookmark"></i></p>
        <p class="clickable">{{favorites}}<i class="far fa-heart"></i></p>
        <i class="fa fa-ellipsis-v clickable"></i>
    </div>
</template>

<script>
    export default {
        name: "AnimeActions",
        props: ["favorites", "bookmarks"],
        data: function () {
            return {

            }
        }
    }
</script>

<style scoped>

</style>
