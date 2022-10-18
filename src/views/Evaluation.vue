<script>
import Star from "@/components/Star.vue"
// import Vuex from "vuex";
// import axios from "axios"
    export default{
        components:{
            Star,
      

        },
        data(){
            return{
                icon:'★',
                arr:['爛','中下','一般','還不錯','超棒的'],
                msg:'',
                block:'☆'
            
            }
        },
        methods:{
            post(val){
                console.log(val)
                for(let i=0;i<this.arr.length;i++){
                    if(val==i+1){
                        this.msg=this.arr[i]
                    }
                }
            },
           
            empty(){
                this.msg=""
               
            }
        },
        
    }
</script>
<template>

   <h1>評價</h1>
<Star  :star="icon"
        @require="post"
        :font="msg"
        @reset="empty"
        :block="block"
        
/>
<div class="container">
    <div class="item" v-for="item in data" :key="item.list_id">
    
    </div>
</div>
 
</template>