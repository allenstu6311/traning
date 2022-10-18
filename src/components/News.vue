<template>

    <div class="container">
        <h2>小孩的零用錢${{money}}</h2>
        <h2>爸爸的薪水${{sal}}</h2>
<button @click="send">送出</button>
        
    </div>

    
</template>

<script>
export default {
//   props:['money',"sal"], props都會放仔曾
    props:{
        money:Number,
        sal:Number
    },
    
    data(){
        return{
           
        }
    },
    methods:{
        send(){//只會再子層
        console.log('send');
            this.$emit("require")//傳送到父層
        }
    }
}
</script>