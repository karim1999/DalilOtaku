const profile = new Vue({
    el: '#profileSettings',
    data: {
        img: ""
    },
    methods: {
        changeImage(){
            this.$refs.img.click()
        },
        onFileChange(e) {
            const file = e.target.files[0];
            this.img = URL.createObjectURL(file);
        }
    }
});
