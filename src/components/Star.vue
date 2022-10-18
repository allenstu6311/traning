<template>
    <div class="boxs">

    <div class="item" v-for="(item,value) in data" :key="item.list_id">
        {{item.img}}
        <div class="photo">
            <!-- <img :src="'../../public/img/icons/'+item.img"> -->
            <img :src="require(`../../public/img/icons/${item.img}`)">
        </div>
        <div class="name">
            {{item.list_name}}
        </div>
  
      
        <h3>給予評價</h3>
        <div class="score">
            <h1 v-for="i in 5" :key="i" @click="change(i,value,item)" :class="{color:i<=item.math}">{{star}}</h1> 
            <!-- <h2>{{font}}</h2>  -->
            </div>
        <button @click="send(item.list_id,item.count,item.list_math,item)">送出</button>
        <button @click="reset(item)">清除</button>
        </div>
    </div>

<hr>
   <div class="star" style="display:flex" >
           allen: <p v-for="item in fraction[0].star" :key="item.star">{{star}}</p>
                <p v-if='isShow=fraction[0].star<1'>{{block}}</p>
                <p v-if='isShow=fraction[0].star<2'>{{block}}</p>
                <p v-if='isShow=fraction[0].star<3'>{{block}}</p>
                <p v-if='isShow=fraction[0].star<4'>{{block}}</p>
                <p v-if='isShow=fraction[0].star<5'>{{block}}</p>
                <p>目前總共{{fraction[0].count}}人評價</p>
    </div>
       <div class="star" style="display:flex"  >
           xuan: <p v-for="item in fraction[1].star" :key="item">{{star}}</p>
                <p v-if='isShow=fraction[1].star<1'>{{block}}</p>
                <p v-if='isShow=fraction[1].star<2'>{{block}}</p>
                <p v-if='isShow=fraction[1].star<3'>{{block}}</p>
                <p v-if='isShow=fraction[1].star<4'>{{block}}</p>
                <p v-if='isShow=fraction[1].star<5'>{{block}}</p>
                <p>目前總共{{fraction[1].count}}人評價</p>
    </div>
       <div class="star" style="display:flex">
           ricky: <p v-for="item in fraction[2].star" :key="item.star">{{star}}</p>
            <p v-if='isShow=fraction[2].star<1'>{{block}}</p>
                <p v-if='isShow=fraction[2].star<2'>{{block}}</p>
                <p v-if='isShow=fraction[2].star<3'>{{block}}</p>
                <p v-if='isShow=fraction[2].star<4'>{{block}}</p>
                <p v-if='isShow=fraction[2].star<5'>{{block}}</p>
                <p>目前總共{{fraction[2].count}}人評價</p>
    </div>
      <div class="star" style="display:flex">
           TK: <p v-for="item in fraction[3].star" :key="item.star">{{star}}</p>
            <p v-if='isShow=fraction[3].star<1'>{{block}}</p>
                <p v-if='isShow=fraction[3].star<2'>{{block}}</p>
                <p v-if='isShow=fraction[3].star<3'>{{block}}</p>
                <p v-if='isShow=fraction[3].star<4'>{{block}}</p>
                <p v-if='isShow=fraction[3].star<5'>{{block}}</p>
                <p>目前總共{{fraction[3].count}}人評價</p>
    </div>

</template>

<script>
import Vuex from "vuex";
import axios from "axios"
export default {
    props:{
        star:String,
        font:String,
        block:String,
    },
    components:{
            Vuex,
            axios
    },
    data(){
        return{
            number:0,
            id:'',
            num:0,
            data:[],
            count1:0,
            count2:0,
            count3:0,
            math:0,
            star1:[],
            star2:[],
            star3:[],
            fraction:[],

            
        }
    },
    methods:{
        change(i,value,item){
             item.math=i
              

             this.number=item.math
             this.id=item.list_name
            // console.log(item.list_name)
           
        },
        reset(item){
            item.math=0
            this.$emit("reset")
        },  
        send(list_id,count,list_math,item){
          
            alert("送出成功")
            this.num=list_id
              item.math=0
              
            this.$emit("require",this.number)
              this.math = list_math/count
     
               
       
    
            axios.get("http://localhost/commodity/Evaluation.php",{

            params:{
                info:this.number,
                name:this.id,
                num:1,
                }

            })
            .then((res)=>{
                
            })

        },
     
        //   start(count,list_math){
        //     alert("")
        //    this.fraction = list_math/count;
        //     console.log(this.fraction)
        // }
       

        
    },
    created(){
        axios.get("http://localhost/commodity/home.php")
        .then((res)=>{
            console.log(res)
            this.data=res.data

            for(let i=0;i<this.data.length;i++){
              this.fraction.push({
                star: Math.round(this.data[i].list_math/this.data[i].count),
                count:this.data[i].count, 
              }) 
            }
            console.log(this.fraction)
            console.log(this.data)
     

        })

        
         
    },
    mounted(){

    }
   
   

}
</script>

<style lang="scss">
.boxs{
    margin: auto;
    display:flex;
    text-align:center;
    justify-content: center;
    align-items: center;
}
.color{
   color: yellow;
}
.item{
    width: 300px;
    border: 1px solid red;
    margin: 10px;
    text-align: center;
    .pic img{
        width: 100%;
    }


    .score{
    display: flex;
}

}
img{
    width: 50%;
}

</style>