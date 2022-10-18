<template>


</template>

<script>
export default {
    data(){
        return{
            data:[],
            


        }
    },
    methods:{

    },
    created(){
        fetch('https://www.ibon.com.tw/retail_inquiry.aspx#gsc.tab=0', {
            mode:'cors',    
            headers: {
                'Access-Control-Allow-Origin':'*',            
            }
            }).then((res)=>{
                console.log(res)
            })
        // const API_PROXY = 'https://bird.ioliu.cn/v1/?url='
        // this.axios.get(API_PROXY +'http://www.ibon.com.tw/retail_inquiry.aspx#gsc.tab=0')
        // .then((res)=>{
        //     console.log(res)
        // })
    }
}
</script>
<style lang="scss">




</style>