<template>
  <ChoseDate />

<Calendar />

  
</template>
<script>
import { DatePicker } from 'ant-design-vue';
import ChoseDate from"@/components/ChoseDate.vue"
import Calendar from "@/components/Calendar.vue"


export default {
  components:{
    ChoseDate,
    Calendar
  },
  data(){
    return{
      data:[]
    }
  },
  created() {
   
     this.axios.get("/json/holiday.json").then((res) => {
      this.data = res.data;
      console.log(this.data)
    });
  },
}
</script>
<style lang="scss">
@import 'ant-design-vue/dist/antd.css'; // or 'ant-design-vue/dist/antd.less'
</style>