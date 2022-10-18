<template>
  <div class="home">
    <Title :title="title"/>
    <InputComponent :text="title"/>
    <img alt="Vue logo" src="../assets/logo.png">
    <HelloWorld msg="Welcome to Your Vue.js App"/>
 
  </div>
</template>

<script>
// @ is an alias to /src
import HelloWorld from '@/components/HelloWorld.vue'
import Title from '@/components/Title.vue'
import InputComponent from '@/components/InputComponent/index.vue'

export default {

    components: {
    HelloWorld,
    Title,
    InputComponent
  },
  name: 'HomeView',
  data(){
    return{
        title:"hello",
       
    }

  
  },
   


  // methods:{
  //   changeHandler(val){
  //     this.title = val
  //   }
  // }
}
</script>
