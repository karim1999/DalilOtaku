<template>
    <div>
        <li>
            <a @click="toggle"><i :class="iconName"></i>{{title}}</a>
            <i :class="active ? 'fa fa-chevron-circle-up' : 'fa fa-chevron-circle-down'"></i>
        </li>
        <ul class="sub-list">
            <slot v-if="active"></slot>
        </ul>
    </div>
</template>

<script>
    export default {
        name: "DropDownItem",
        props: {
            title: {
                type: String,
                required: true
            },
            status: {
                default: false,
                required: false
            },
            subList: {
                type: Array,
                default: function () {
                    return []
                },
                required: false
            },
            iconName: {
                type: String,
                required: false
            },
        },
        data: function () {
            return {
                active: this.status
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
