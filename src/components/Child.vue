<template>

<h2>薪水${{sal}}</h2>
<h2>獎金${{bonus}}</h2>
<h1>表揚過後薪水{{cash}}</h1>

<button @click="send">送出</button>
<button @click="register">記嘉獎</button>

<div class="" v-for="item in count" :key="item.id" >
    <img src="https://picsum.photos/300/200/?random=10">
</div>

</template>

<script>
export default {
    
    props:{
        sal:Number,
        bonus:Number
    },
    data(){
        return{
            count:1,
            cash:100,
        }
    },
    methods:{
        send(){
            this.$emit("require")
            this.count+=1
        },
        register(){
            this.cash += this.sal 
            this.$emit("commendation",this.cash)
        }
    }
}
</script>