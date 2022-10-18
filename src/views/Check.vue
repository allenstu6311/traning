<template>
<div class="container">
    <div class="cheat" v-for="item in cheat" :key="item">
    <div class="user">
        <div class="talk">
            {{item.tex}}
        </div>
          <div class="pic">
            <img :src="item.user" alt="">
        </div>
    </div>


    <div class="sever" >
        <div class="pic">
            <img :src="item.sever">
        </div>

        <div class="talk">
            {{item.post}}
        </div>
    </div>


 
   
    </div>
  

</div>
     <div class="send">
        <textarea name="" id="" cols="20" rows="5" v-model="post" @keyup.enter="upload"></textarea>
        <button @click="upload">上傳</button>
    </div>

    
</template>
<style lang="scss" scoped>
.container{
    width: 300px;
    height: 70vh;
    background-color: skyblue;
    margin: auto;
    padding: 10px;
    overflow-y: scroll;
    .cheat{
    .sever{
        display: flex;
          justify-content: space-between;
          align-items: center;
        .pic{
                         
             img{
                border-radius: 50%;
             }
        }
        .talk{
            width: 75%;
            min-width: 100px;
            background-color: white;
            border-radius: 5px;
        }
        
    }
    .user{
        display: flex;
        justify-content: space-between;
        align-items: center;
        .pic{
             
             img{
                border-radius: 50%;
             }
        }
         .talk{
            width: 75%;
            min-width: 100px;
            background-color: white;
            border-radius: 5px;
         
          
        }
    }
}
    
}



</style>

<script>
export default {
    
    data(){
        return{
            user:[],
            post:"",
            library:[{
                one:"幹你娘",
                two:"去你的",
                three:"不要吵",
            }],
            cheat:[{
                
                sever:"https://picsum.photos/50/50/?random=10",
                post:"您好",

                user:"",
                tex:""
            }],
           
        
        }
    },
    methods:{
        upload(){
            switch(this.post){

                case "你好":
                this.cheat.push({
                sever:"https://picsum.photos/50/50/?random=10",
                post:this.library[0].one,

                user:"https://picsum.photos/50/50/?random=11",
                tex:this.post
            })
                break;

                case "請問":
                    
               this.cheat.push({
                user:"https://picsum.photos/50/50/?random=11",
                tex:this.post,
               
                sever:"https://picsum.photos/50/50/?random=10",
                post:this.library[0].two,
            })
            break;

            case "那個":

                this.cheat.push({
                user:"https://picsum.photos/50/50/?random=11",
                tex:this.post,
               
                sever:"https://picsum.photos/50/50/?random=10",
                post:this.library[0].three,
            })
            break;

            default:
                this.cheat.push({
                user:"https://picsum.photos/50/50/?random=11",
                tex:this.post,
               
                sever:"https://picsum.photos/50/50/?random=10",
                post:"我聽不懂你說甚麼",
            })

            }
            this.post=""
        }

    },
    created(){
        
    }
}
</script>