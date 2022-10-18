<template>
<User />
  <div class="taiwan">
      <div class="item" v-for="item in area" :key="item" @mouseenter="forecast(item.locationName)" @mouseout="clear">
        {{item.locationName}}
      </div>
  </div>

  <div class="report">
    <div class="weather">
      <h1>明日天氣預報</h1>
      <h2>天氣狀況:{{weather.parameterName}}
        <small v-if="weather.parameterName=='晴時多雲'">⛅</small>
        <small v-if="weather.parameterName=='陰天'">🌨</small>
        <small v-if="weather.parameterName=='多雲短暫陣雨'">⛈</small>
        <small v-if="weather.parameterName=='多雲時晴'"> ⛅</small>
        <small v-if="weather.parameterName=='晴天'">☀</small>
        <small v-if="weather.parameterName=='多雲'">☁</small>
      </h2>

      <h2>降雨機率:{{rain.parameterName}}%
        <small v-if="rain.parameterName>50">☔</small>
      </h2>
      <h2>溫度:{{temperature.parameterName}}度
        <small v-if="temperature.parameterName>28">🥵</small>
        <small v-if="temperature.parameterName<20">🥶</small>
      </h2>
    </div>
  </div>
  <Taiwan />
</template>

<script>
import User from"@/components/User.vue"
import Taiwan from "@/components/Taiwan.vue"

export default{

    components:{
      User,
      Taiwan
    },
    data(){

      return{
        area:[],
        season:[],
        weather:[],
        rain:[],
        temperature:[]
      }
    },
    methods:{
      forecast(name){
            this.season = this.area.find(item=>item.locationName==name)
            //  console.log(this.season.weatherElement[0].time[0].parameter.parameterName)
            this.weather = this.season.weatherElement[0].time[0].parameter//天氣
            this.rain = this.season.weatherElement[1].time[0].parameter//降雨
            this.temperature = this.season.weatherElement[2].time[0].parameter//溫度
           
            
      },
      clear(){
          this.weather=[]
          this.rain=[]
          this.temperature=[]
      }
    },
    created(){
      this.axios.get("https://opendata.cwb.gov.tw/api/v1/rest/datastore/F-C0032-001?Authorization=CWB-49AA74DB-046A-4623-98C3-A4334859895C&limit=30&offset=1&format=JSON")
      .then((res)=>{
        this.area = res.data.records.location
      })
    }
}


</script>
<style lang="scss">
.taiwan{
  width: 560px;
  height: 650px;
  display:flex;
  flex-wrap: wrap;
  flex-direction: column;
  align-items: flex-start;

  .item{
    margin: 5px 0;
    font-size: 20px;
    background-color: antiquewhite;
    color: brown;
    padding: 10px;
    font-weight: 800;
    cursor: pointer;
    &:hover{
      background-color: red;
      color: aliceblue;
      transition: .5s;
    }
  }
}
.report{
  position: fixed;
  right: 200px;
  top:50%
}
svg{
  width: 50%;
}

</style>
