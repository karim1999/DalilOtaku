import axios from 'axios'
let nav= new Vue({
    el: "#nav",
    data: {
        mode: "light",
        live: false,
        showMenu: false,
        showClass: 'sm-only',
        hideClass: 'hidden-sm',
        results: []
    },
    created(){
        this.mode= this.getCookie("mode", "light")
        // alert(this.getCookie("mode", "light"))
    },
    methods: {
        menuToggle(){
            this.showMenu= !this.showMenu
        },
        themeToggle(e){
            this.live= true
            console.log(this.mode)
            if(this.mode == "light"){
                this.setCookie("mode", "dark")
                this.mode= "dark"
            }else{
                this.setCookie("mode", "light")
                this.mode= "light"
            }
            e.preventDefault()
        },
        setCookie(cname, cvalue, duration= 512640) {
            let d = new Date();
            d.setTime(d.getTime() + (duration*100000));
            let expires = "expires="+ d.toUTCString();
            document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
        },
        getCookie(cname, defaultValue){
            let name = cname + "=";
            let decodedCookie = decodeURIComponent(document.cookie);
            let ca = decodedCookie.split(';');
            for(let i = 0; i <ca.length; i++) {
                let c = ca[i];
                while (c.charAt(0) == ' ') {
                    c = c.substring(1);
                }
                if (c.indexOf(name) == 0) {
                    return c.substring(name.length, c.length);
                }
            }
            return defaultValue
        },
        search(value){
            console.log(value.target.value)
            axios.get("/search", {
                params: {
                    search: value.target.value,
                    json: true
                }
            }).then(res => {
                console.log(res)
                this.results= res.data.data
            })
        },
        changeSearch(value){
            this.$refs.search.value= value
            this.search(value)
        }
    }
})
