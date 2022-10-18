<template>
<Child  :sal="money"
        :bonus="add"

        @require="addSal"
        @commendation="AddMoney"

/>
<input type="text" v-model.number="int">
    
</template>


<script>
import Child from"@/components/Child.vue"
    export default{
        components:{
            Child
        },
        data(){

            return{
                money:1000,
                add:200,
                int:'',
            }
        },
        methods: {
            addSal(){
                this.money+=this.int
            } ,
            AddMoney(){
                this.add+=100
            }           
        },
        created(){
            this.axios.get("http://localhost/traning/pratice/public/url/list2.php")
            .then((res)=>{
                console.log(res)
            })
        }
    }
</script>