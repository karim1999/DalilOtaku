<template>
    <div class="col-5 box">
        <div class="row clickable" @click="toggle">
            <h4 :class="{'unique': active}">{{title}}</h4>
            <i  :class="[active? activeClass: inactiveClass]"></i>
        </div>
        <p v-if="active">{{answer}}</p>
    </div>
</template>

<script>
    export default {
        name: "SingleQuestion",
        props: [
            "title",
            "answer",
            "status"
        ],
        data: function () {
            return {
                active: this.status,
                activeClass: "fa fa-sort-amount-up unique",
                inactiveClass: "fa fa-sort-amount-down"
            }
        },
        methods: {
            toggle(){
                this.active= !this.active
            }
        }
    }
</script>

<style scoped>

</style>
