

<script>

    export default{

        name:"input-component",
        props:{
            text:{
                type:String,
                require:true,
                default:'沒有'
            },

            data(){
                return{
                              

                }
            }
       
          
            
        },
        
        methods: {
          changHandler(e){
            let day = this.day;
            if(e.keyCode==39){
                day = day<29?day+1:day
            }else if(e.keyCode==37){
                day = day>0?day-1:day
            }
            this.day=day
          }  
        },
        mounted() {
            let day = parseInt(this.$route.query.day)-1
            this.day = day
            document.addEventListener("keyup",this.changHandler)
        },
        watch:{
            $route(now){
                let day = parseInt(this.$route.query.day)-1
                this.day = day
            }
        },
       computed:{
            day(){
                return this.$store.state.day
            },
            header(){
                return this.$store.state.header.title
            },
            list(){
                return this.$store.state.list
            }
        },
    }
</script>


<template src="./template.html"></template>
<style src="./style.css" scoped></style>