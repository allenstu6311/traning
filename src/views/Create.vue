<template>
<User />

<div class="create">
    <form action="" >
        <div class="">
            <label for="name">姓名:</label>
            <input type="text" v-model="name" name="name">
        </div>
        <div class="">
            <label for="memId">帳號:</label>
            <input type="text" v-model="memId" name="memId">
            <button type="button"  @click="check">確認帳號是否可使用</button>
            <span v-if="id==1">此帳號已被註冊</span>
               <span v-if="id==2">此帳號可以使用</span>
        </div>
        <div class="">
             <label for="memPsw">密碼:</label>
            <input type="password" v-model="memPsw" name="memPsw">
        </div>
        <div class="">
            <label for="sex">性別:</label>
            <input type="radio" value="1" name="sex" @click="checked=1" v-model="checked"  >男
            <input type="radio" value="2" name="sex"  @click="checked=2"  v-model="checked" >女
        </div>
        <div class="">
            電話:<input type="text" v-model="tel">
        </div>
        <button type="button"   @click="send">送出</button>
    </form>
</div>
    
</template>

<script>
import User from "@/components/User.vue"
export default {
    components:{
        User
    },
    data(){
        
        return{
            name:"",
            memId:"",
            memPsw:"",
            man:"1",
            woman:"0",
            tel:"",
            checked:"",
            id:0,
        }
    },
    methods:{
        send(){
            alert("送出")
            // let formData = new FormData();
            //  formData.append(JSON.stringify(params));
          
            this.axios.get("http://localhost/traning/pratice/dist/url/create.php",{

                    params:{
                        name:this.name,
                        "memId":this.memId,
                        "memPsw":this.memPsw,
                        "sex":this.checked,
                        "tel":this.tel
                    }
            })
            .then((res)=>{
                console.log(res)
            })
        },
        check(){
            this.axios.get("http://localhost/traning/pratice/dist/url/create.php",
            {
                params:{
                    memId:this.memId
                }
            })
            .then((res)=>{
                console.log(res)
                if(res.data==1){
                    this.id=1
                }else{
                   this.id=2
                }
            })
            
        },
    },
    created(){
        
    },
    watch:{
      
    }
}
</script>
