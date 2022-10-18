<template>
  <div class="state">
    <span>{{ name }}</span>
    <span @click="login">{{ people }}</span>
  </div>

  <div class="box" v-if="open == true">
    {{ appear }}
    <div class="light" v-if="appear == 1">
      <h3>會員登入</h3>
      帳號:<input type="text" name="memId" v-model="memId" /><br />
      密碼:<input type="text" name="memPsw" v-model="memPsw" /><br />
      <button type="" @click="send">登入</button>
      <button @click="open = false">取消</button>
    </div>

    <div class="dark light" v-if="appear == 2">
      <h3>確定登出?</h3>
      <button type="" @click="out">確定</button>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      memId: "",
      memPsw: "",
      data: [],
      box: [],
      open: false,
      people: "登入",
      name: "",
      appear: 1,
    };
  },
  methods: {
    login() {
      this.open = !this.open;
    },
    send() {
      this.axios.get("http://localhost/traning/pratice/public/url/list2.php",{
        params:{
            memId:this.memId,
            memPsw:this.memPsw
        }
      })
      .then((res)=>{
        console.log(res)
      })
    },

    //     send(){
    //         const data={
    //             memId:this.memId,
    //             memPsw:this.memPsw
    //         }
    //          const formData = new FormData();
    //             for (let key in data) {
    //              formData.append(key, data[key]);
    //             }
    //         this.axios.post("http://localhost/traning/pratice/public/url/login.php",formData,{

    //               headers: { "Content-Type": "multipart/form-data" }
    //         }
    //         ).then((res)=>{
    //             console.log(red)
    //             this.data=res.data
    //            if(this.data=='1'){
    //             alert("帳號或密碼錯誤")

    //            }else{
    //             alert("登入成功")

    //             this.box = this.data
    //             this.open=false
    //             this.appear=2

    //             console.log("-->",this.box)
    //             this.name = this.box.memName
    //             if(this.box.memName==this.name){
    //                 this.people = "登出"
    //              }
    //             this.storage();

    //            }
    //         }) .catch(function(error) {
    //         console.log("Error", error.message);
    //   });
    //     },
    out() {
      this.appear = 1;
      this.open = false;
      localStorage.removeItem("user");
      this.name = "";
      this.people = "登入";

      this.axios
        .get("http://localhost/traning/pratice/dist/url/logout.php")
        .then((res) => {});
    },
    storage() {
      localStorage.setItem("user", JSON.stringify(this.box));
    },
    online() {
      let users = localStorage.getItem("user");
      if (!users) return;
      this.box = JSON.parse(users);

      console.log("-->", this.box);
      this.name = this.box.memName;
      if (this.box.memName == this.name) {
        this.people = "登出";
        this.appear = 2;
      }
      console.log(this.appear);
    },
  },
  created() {
    this.online();
  },
};
</script>
<style lang="scss">
.state {
  position: fixed;
  top: 0;
  right: 0;
  margin: 10px;
}
.box {
  position: fixed;
  margin: auto;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  background-color: rgba(0, 0, 0, 0.5);
  z-index: 10;
  display: flex;
  justify-content: center;
  align-items: center;

  .light {
    width: 300px;
    background-color: white;
    padding: 20px;
    border-radius: 5px;
    line-height: 2;
    h3 {
      margin: auto;
    }
  }
}
</style>
