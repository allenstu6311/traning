<template>

<select class="form-select" aria-label="Default select example"  v-model="sel" @change="change">
  <option v-for="item in data" :key="item">{{item.ScenicSpotName}}</option>

</select>

<div class="container" v-for="(item,key) in info" :key="item" >
    <!-- <div class="" v-if="typeof item=='string'">判斷如果是字串就印出來 -->
     
        <p v-if="key=='Class2'">{{item}}</p>
        <p v-if="key=='Phone'">{{item}}</p>
        <p v-if="key=='TicketInfo'">{{item}}</p>
        <p v-if="key=='UpdateTime'">{{item}}</p>
<!-- 
        <textarea name="" id="" cols="50" rows="20" v-if="key=='UpdateTime'">{{item}}</textarea> -->
</div>

<div id="map-count123"></div>

    
</template>

<script>
import L from"leaflet"
import icon from 'leaflet/dist/images/marker-icon.png';
import "leaflet/dist/leaflet.css"
const blackIcon = new L.Icon({
  iconUrl: 'https://cdn.rawgit.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-black.png',
  shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
  iconSize: [25, 41],
  iconAnchor: [12, 41],
  popupAnchor: [1, -34],
  shadowSize: [41, 41]
})

    export default{

        data(){

            return{
                data:[],
                sel:"宏亞食品巧克力觀光工廠",
                map12:null,
                info:[],
              
            }
        },
        methods:{
            initMap(){

                this.map12 = L.map('map-count123').setView([51.5, -0.09], 13);

                L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                }).addTo(this.map12);

                L.marker([51.5, -0.09],{ icon: blackIcon }).addTo(this.map12)
                .bindPopup('A pretty CSS3 popup.<br> Easily customizable.')
                .openPopup();

                  L.marker([51.5, -0.09],{ icon: blackIcon }).addTo(this.map12)
                  
  
            },
            change(){
              this.info = this.data.find(item=>item.ScenicSpotName===this.sel)
             
                 this.map12.setView([`${this.info.Position.PositionLat}`,`${this.info.Position.PositionLon}`], 13);
                console.log(this.info)

                   L.marker([`${this.info.Position.PositionLat}`,`${this.info.Position.PositionLon}`],{ icon: blackIcon }).addTo(this.map12)
                .bindPopup(`${this.info.ScenicSpotName}`)
                .openPopup();
           
                  L.marker([`${this.info.Position.PositionLat}`,`${this.info.Position.PositionLon}`],{ icon: blackIcon }).addTo(this.map12)
             
            }


     
    },
         computed:{
            // info:function(){
            //     let int = this.data.find()
            //      this.map.setView([51.505, -0.09], 13);
            //      console.log(int)
            //     return int
            // }

        },
        created(){
        
            this.axios.get("/json/pratice.json")
            .then((res)=>{
                    this.data=res.data
                    console.log(this.data)

                     
               
            }) 
               
         
        },
       mounted() {
             this.initMap()
        },
    }
</script>
<style lang="scss" scoped>
// @import "bootstrap/scss/bootstrap";

#map-count123{
    
    width: 100vw;
    height: 100vh;
}

</style>