let nav= new Vue({
    el: "#nav",
    data: {
        showMenu: false,
        showClass: 'sm-only',
        hideClass: 'hidden-sm'
    },
    methods: {
        menuToggle(){
            this.showMenu= !this.showMenu
        }
    }
})
