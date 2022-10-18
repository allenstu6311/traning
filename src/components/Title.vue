<template>
    <h1 class="title">{{title}}</h1>
</template>

<script>
export default {
    name:'title',
    // data(){
    //     return{
    //         title:'hi'
    //     }
    // }
    props:{
        title:{
            type:String,
            required:true//必要
        }
    }
}
</script>

<style >

h1.title{
    color:red;
}

</style>