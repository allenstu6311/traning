

<template >

<div class="guest">
    <div class="">
        姓名:<input type="text" v-model='name'>
    </div>
    <div class="">
        性別:
        男:<input type="radio" name="" value="man" @click="gender=man" v-model="man">
        女:<input type="radio" name="" value="woman" @click="gender=woman"  v-model="woman">
    </div>
    <div class="time">
        預約時段:<input type="datetime-local" v-model="date" id="theDate" @change="show">
    </div>
    <button type="button" @click="send">送出</button>

</div>

<!-- <p>預約時間:{{date}}</p> -->


<div class="list">
    
    <h3>預約名單</h3>
     <ul v-for="item in reserve" :key='item'>
        <li >{{item.name}}</li>
        <li >{{item.sex}}</li>
        <li >{{item.time}}</li>
    </ul>

    
        <el-calendar 
        v-model="value"
        @click="showInfo"
        >

      <!-- 这里使用的是 2.5 slot 语法，对于新项目请使用 2.6 slot 语法-->
  <template
   >
    <p :class="data.isSelected ? 'is-selected' : ''">
      {{ data.day.split('-').slice(1).join('-') }} {{ data.isSelected ? '✔️' : ''}}
    </p>
  </template>


      
        </el-calendar>
     
    </div>
 
</template>

<script>
export default {
    data(){
        return{
            value: new Date(),
            date:"",
            time:"",
            reserve:[],
            name:'',
            man:"男",
            woman:'女',
            gender:"",
            box:[],
            allen:this.type,
            info:"",
            appear:false,
            
          
        }
    },
    mounted() {
        
    },
    methods:{
        send(date){
            this.reserve.push({
                name:this.name,
                sex:this.gender,
                time:this.date              
            })
        
        },
        show(){
            let theDate = document.getElementById("theDate");

            let date = theDate.value.split('T')[0]
            let time = theDate.value.split('T')[1]

            let year = date.split('-')[0]
            let month = date.split('-')[1]
            let day = date.split('-')[2]

            let hour = time.split(':')[0]
            let mintue = time.split(':')[1]

            // console.log(year,"/",month,"/", day)            
        },
        day(value){
            console.log(value)            
        },
        showInfo(e){
         
            let font =  document.createElement("p")
          
            e.target.appendChild(font)
              font.innerHTML =this.reserve
                console.log(e.target)
        //     this.appear=true
        //     let font = document.createElement("span");
        //     font.appendChild("123")
             
         
        // //    this.info= this.reserve
        //       console.log(e.target)
        },

    },
    watch:{
        value:{
            handler(newVal){
    
                this.box.push(newVal)

                
            }
        },
        box:{
            handler(newVal){

            }
        }
    }
}
</script>
<style>

 .is-selected {
    color: red;
  }
</style>