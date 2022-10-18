<template>
    <h1> 第{{$route.params.productID}}頁</h1>
    <h2>Lorem, ipsum.</h2>
    <hr>
    <div class="" v-if="$route.params.productID==1"></div>

    <div class="" v-if="$route.params.productID==2">
        <h1>TK大帥哥</h1>
        <img src="https://picsum.photos/300/200/?random=11">
    </div>

    <div class="" v-if="$route.params.productID==3">
        <h1>陳柏霖</h1>
        <img src="https://picsum.photos/300/200/?random=12">
  </div>


</template>


<script>


export default {
    // data(){

    //   return{

    //   }
    // },
    created(){
      // alert("")
    }
}
</script>