<template>
<User />
    <form action="">
            <input type="text" v-model="filter">
            <button type="button" @click="search">搜尋</button>
    </form>
<table class="table" >
       <div class="center">
            <h1 v-if="no==true">查無資訊</h1>
        </div>

  <thead>
     

    <tr >
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody v-if="change==1">
    <tr v-for="item in data" :key="item.PROD_ID">
      <th scope="row">{{item.PROD_ID}}</th>
        
      <td>{{item.PROD_NAME}}</td>
      <td>{{item.PROD_PRICE}}</td>
    </tr>
 </tbody>
 <tfoot v-if="change==2">
      <tr v-for="item in newData" :key="item.PROD_ID">
      <th scope="row">{{item.PROD_ID}}</th>
      <!-- <td><img :src="require(`../../dist/url/images/${item.PROD_PIC}`)" alt=""></td> -->
      <td>{{item.PROD_NAME}}</td>
      <td>{{item.PROD_PRICE}}</td>
    </tr>
    
 </tfoot>
  
</table>
    <div class="page">
            <button @click="change=1" :class="{color:change==1}">1</button>
            <button @click="change=2" :class="{color:change==2}">2</button>
        </div>
   
</template>
<script>
import User from "../components/User.vue"
    export default{
        components:{
            User
        },
        data(){
            return{
                data:[],
                filter:'',
                sear:[],
                info:[],
                newData:[],
                change:1,
                no:false,
            }
        },
        methods:{
            search(){
                this.axios.get("http://localhost/traning/pratice/public/url/list2.php",
                {
                    params:{
                        keyWard:this.filter,
                    }
                })
                .then((res)=>{
                //   console.log(res.data)
                    this.sear=res.data
                    this.data=this.sear
                    this.newData = this.sear
                  
                     if(this.sear==""){
                    
                        this.no=true
                    }else{
                        this.no=false
                    }
                   
                })
            },
             

        },
        computed:{
            sea:function(){
                return  JSON.parse(JSON.stringify(this.sear));
            }

        },
        created(){
            this.axios.get(`/api_server/list.php`)
            .then((res)=>{
                // console.log(res)
                this.data=res.data
                this.info=this.data
            })

            //    this.axios.get("http://localhost/traning/pratice/public/url/list2.php")
            // .then((res)=>{
            //     // console.log(res)
            //     this.newData = res.data
            // })
        },
        update(){
           
        },
        watch:{
            filter:{
                handler(newVal,oldVal){
                    if(newVal==""){
                        this.data = this.info
                        this.newData = this.info
                        this.no=false
                    }
                }
            },
            // sea:{
            //     handler(newVal,oldVal){
            //         if(newVal={}){
            //             this.no=true
            //             alert("是空值")
            //         }else{
            //               this.no=false
            //             alert("不是空值")
                      
                      
            //         }
            //         console.log("new->",newVal)
                      
            //     }
            // },
            // deep:true,
            // immediate:true ,
        }
    }
</script>
<style lang="scss">
// @import "bootstrap/scss/bootstrap";
img{
    width: 30%;
}
td{
    width: 150px;
}
th{
    width: 150px;
}
form{
    display: flex;
    margin: auto;
    justify-content: center;
    margin-bottom: 50px;
}
.page{
    text-align: center;
    button{
        margin: 10px;
    }
}
.color{
    color: red;
}
.center{
    text-align: center;
    margin: auto;
}

</style>