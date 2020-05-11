export let nav= new Vue({
    el: "#nav",
    data: {
        showMenu: true
    },
    methods: {
        menuToggle(){
            this.showMenu= !this.showMenu
        }
    }
})
