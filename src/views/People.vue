<template>
<div class="container">
    <div class="item" v-for="item in area1" :key="item.site_id"  @mouseenter="change(item.site_id)" @mouseout="clear">
    {{item.site_id}}
    </div>
</div>
<div class="site">
    <h2>區域:{{info.site_id}}</h2>
    <h2>土地面積:{{info.area}}公頃</h2>
    <h2>人口數:{{info.people_total}}</h2>
</div>
</template>
<script>
export default {
    data(){
        return{
            area1:[],
            info:[],
        }
    },
    methods:{
        change(id){
            this.info = this.area1.find(item=>item.site_id==id)
        },
        clear(){
            this.info=[]
        },
    },
    created(){
        this.axios.get("/json/people.json")
        .then((res)=>{ 
            this.area1=res.data.result.records
        })
    }
}
</script>

<style scoped>
.container{
    width: 500px;
    display: flex;
    flex-wrap: wrap;
}
.container>:first-child{
    display: none;
}
.item{
    width: 100px;
    height: 100px;
    background-color: black;
    margin: 5px;
    color:aliceblue
}
.item:hover{
    background-color: red;
}
.site{
    position: fixed;
    top: 100px;
    right: 200px;
}
</style>