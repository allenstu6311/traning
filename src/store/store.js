import axios from 'axios'
import { createStore } from 'vuex'

export default createStore({
  state: {
    day:0,
    header:{
        scr:"https://picsum.photos/300/200/?random=10",
        title:"俊彥",
    },
    list:[],

  },
  getters: {
  },
  mutations: {
    SETDAY(state,day){
      state.day = day

    },
    SETLIST(state,list){
      state.day = list

    },
  
  },
  actions: {
    GETLIST(context,day){
    
      context.commit("SETDAY",day)

      return fetch('https://ptx.transportdata.tw/MOTC/v3/Rail/TRA/GeneralStationTimetable?%24top=43&%24skip=42&%24format=JSON')
      .then(res=>res.json())
      .then(json=>console.log('SELECT',res.data))
      

      // return axios.get('/public/holiday.json').then(res=>{
      //   context.commit('SELECT',res.data)
      // })
    }
  },
  modules:{
  }
})
