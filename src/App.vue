<template>


  <nav>
    <router-link v-for ="item in routes" :key="item.path"
      :to ="item.path">{{item.name}}|</router-link>



    <!-- <router-link to="/">Home</router-link> |
    <router-link to="/about">About</router-link>|
     <router-link to="/Allen">Allen</router-link>|
         <router-link to="/letter">Email</router-link>|
         <router-link to="/EP1">ep1</router-link>|
              <router-link to="/parent">parent</router-link>|
              <router-link to="/Evaluation">Evaluation</router-link>| 
              <router-link to="/Seven">Seven</router-link>|
                    <router-link to="/File">File</router-link>|
                        <router-link to="/login">Login</router-link>| 
                        <router-link to="/shop">shop</router-link>|
                                <router-link to="/ajax">ajax</router-link>|  
                                 <router-link to="/pratice">pratice</router-link>|  -->


  </nav>
  <router-view/>
</template>



<script>
import {routes} from "@/router/index.js"

  export default {
    name: 'app',
    data(){
      return{
        routes,
      }
    }
      
  }
  </script>

<style lang="scss">
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}

.router-link-active{
  color:red !important;
}


nav {
  padding: 30px;

  a {
    font-weight: bold;
    color: #2c3e50;

    &.router-link-exact-active {
      color: #42b983;
    }
  }
}
</style>



