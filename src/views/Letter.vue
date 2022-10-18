<template>
<Calender><ddd /></Calender>
<Calender><aaa /></Calender>
<Calender><ccc /></Calender>
    <div class="container">
      <h1>加入會員</h1>
        <form @submit="sendEmail">
              <label>姓名</label>
          <input 
            type="text" 
            v-model="name"
            name="name"

          >

          <label>帳號</label>
          <input 
            type="text" 
            v-model="userId"
            name="userId"

          >

          <label>密碼</label>
          <input 
            type="password" 
            v-model="password"
            name="password"

          >
          <label>Email</label>
          <input 
            type="email" 
            v-model="email"
            name="email"
            >
         
          
          <input type="submit" value="Send" >
        </form>
    </div>
</template>

<script>
import emailjs from 'emailjs-com';
import Calender from "@/components/Calender.vue"
export default {
  components:{
    Calender
  },
  name: 'App',
  data() {
    return {
      name: '',
      email: '',
      userId: '',
      password:"",
    }
  },
  methods: {
    sendEmail(e) {
      try {
        emailjs.sendForm('service_xi3b767', 'template_rn4wtkf', e.target,
        'sqVmpdR6GG1rZitV5', {
          name: this.name,
          email: this.email,
          userId: this.userId,
          password:this.password,
        })

      } catch(error) {
          console.log({error})
      }
      // Reset form field
      this.name = ''
      this.email = ''
      this.message = ''
    },
  }
}
</script>
<style scoped>
* {box-sizing: border-box;}

.container {
  display: block;
  margin:auto;
  text-align: center;
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
  width: 50%;
}

label {
  float: left;
}

input[type=text], [type=email], textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}
input[type=password], [type=email], textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}
</style>