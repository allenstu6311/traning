<template>

    <div class="target"></div>
    <transition name="fade" @after-enter="after">
      <img src="https://picsum.photos/300/200/?random=10"  class="fly" v-show="show==true">
    </transition>

<!-- <transition-group name="fade" @after-enter="after">
        <img src="https://picsum.photos/300/200/?random=10"  key="a"  class="block" v-show="demo=='a'">
        <img src="https://picsum.photos/300/200/?random=11"   key="b" class="block" v-show="demo=='b'">
        <img src="https://picsum.photos/300/200/?random=12"  key="c"  class="block" v-show="demo=='c'">
    </transition-group>  -->



        <img src="https://picsum.photos/300/200/?random=10" class="pic" >
        <!-- <img src="https://picsum.photos/300/200/?random=11" class="pic" >
        <img src="https://picsum.photos/300/200/?random=12" class="pic" > -->


    <button @click="change">open</button>
        <button @click="demo='a'">a</button>
        <button @click="demo='b'">b</button>
        <button @click="demo='c'">c</button>  

    
</template>

<script>
export default {
    
    data(){
        return{
            show:false,
            demo:''
        }
    },
    methods:{
        change(){
            this.show=true
            // this.timerd=setTimeout(this.resize,3000)
       
        },
        after(){
            this.show=false
            this.demo=""

        },
    },
    mounted(){
  
    },
    update(){
    
    }

}
</script>
<style>
    .target{
        width: 50px;
        height: 50px;
        background-color: red;
        position: fixed;
        top: 0;
        left: 0;
    }
    .pic{
        margin-top:100px ;
    }
    .fly{
        display: block;
    }
    .block{
        display: none;
    }

    .fade-enter-from,
    .fade-enter-to{
        width: 30%;
        opacity: 1;
        color: black;
        left: 40%;
        top:50%;
        display: none;
 
    }
    .fade-enter-active
    {
        transition:1.5s;
        position: absolute;
        opacity: 1;
        display: flex;
    }
    .fade-enter-to,
    .fade-leave-from{
        width: 0%;
        opacity: 0;
        color: red;
        left: -400px;  
        top: -70%; 
    }

</style>

