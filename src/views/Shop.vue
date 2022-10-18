<template>

    
      <router-link v-for="item in 10" :key="item"
      :to ="{
          name:'Post',
          params:{
            productID:item
          },
         

      }">商品{{item}} | </router-link>

      <router-view></router-view>

          <!-- <h1> 第{{$route.params.productID}}頁</h1> -->

          <!-- <div class="" v-if="$route.params.productID==1">
           
          </div>

            <div class="" v-if="$route.params.productID==2">
              <h1>TK大帥哥</h1>
              <img src="https://picsum.photos/300/200/?random=11">
          </div>

              <div class="" v-if="$route.params.productID==3">
              <h1>陳柏霖</h1>
              <img src="https://picsum.photos/300/200/?random=12">
          </div> -->


        
</template>

<script>
import {routes} from "@/router/index.js"

  export default {
    name: 'app',
    data(){
      return{
        routes,
        hello:"你好",
        data:[],
        box:[],
        num:0,
      }
    },
    
    watch:{
      "$route.params.productID":{
          handler:(newVal)=>{
            // this.box = this.data[newVal]
          },
             deep:true,
      }
   
    },
    created(){
        this.axios.get("https://fakestoreapi.com/products/1")
        .then((res)=>{
          this.data=res.data
       
      //  this.num= $route.params.productID
          // console.log(this.num)
        })

    },
    mounted(){
      
    },
    
      
  }
</script>