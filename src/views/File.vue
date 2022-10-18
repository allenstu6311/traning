<template>
  <select name="" id="" v-model="city" @change="filterShop(city)">
    <option value="1">請選擇</option>
    <option
      v-for="item in location"
      :key="item.CityName"
      :value="item.CityName"
    >
      {{ item.CityName }}
    </option>
  </select>
  <select name="" id="" v-model="position" @change="searchShop">
      <option value="1">請選擇</option>
    <option
      v-for="item in township"
      :key="item.AreaName"
      :value="item.AreaName"
    >
      {{ item.AreaName }}
    </option>
  </select>

  <select
    name=""
    id=""
    v-model="seven"
    @change="
      removeMap();
      updateMap(seven);
    "
  >
    <option v-for="item in store" :key="item.POIName" :value="item">
      {{ item.POIName }}門市
    </option>
  </select>

  <div class="info" v-for="item in post" :key="item">
    <h3>店家資訊</h3>
    <h4>{{ item.POIName }}門市</h4>
    {{ item.address }}
  </div>
  <div id="map-box"></div>
</template>

<script>
import L from "leaflet";
import "leaflet/dist/leaflet.css";

const blackIcon = new L.Icon({
  iconUrl:
    "https://cdn.rawgit.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-black.png",
  shadowUrl:
    "https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png",
  iconSize: [25, 41],
  iconAnchor: [12, 41],
  popupAnchor: [1, -34],
  shadowSize: [41, 41],
});
export default {
  data() {
    return {
      shop: [],
      taipei: [],
      location: [],
      city: "1",
      position: "1",
      store: [],
      map: null,
      url: "",
      seven: "",
      address: [],
      post: [],
      img: require("../assets/images/1664902793299.png"),
    };
  },
  methods: {
    filterShop(CityName) {
      switch (CityName) {
        case "桃園市":
          this.url =
            "https://run.mocky.io/v3/ce9f0a8d-71cb-4c60-8490-22a646c79c5a";
          break;
        case "臺北市":
          this.url =
            "https://run.mocky.io/v3/35c99fa6-b3c2-4a4d-8803-0612ca115085";
          break;
          case"南投縣":
          this.url=
          "https://run.mocky.io/v3/721bf04e-fa05-46c5-9bd3-8658b17b4d70";
          break;
      }
      this.axios.get(this.url).then((res) => {
        this.shop = res.data.stores;
        console.log("商店", this.shop);
      });
      this.position = this.township[0].AreaName      
    },
    searchShop() {
      let index = this.shop.filter((item) => item.area === this.position);
      this.store = index;
    },
    initMap() {
      this.map = L.map("map-box").setView([25.056, 121.501], 13);

      L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
        attribution:
          '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
      }).addTo(this.map);

      L.marker([51.5, -0.09], { icon: blackIcon }).addTo(this.map);
    },
    updateMap(seven) {
      this.post = [];
      this.address = [
        {
          POIName: this.seven.POIName,
          address: this.seven.Address,
        },
      ];
      this.map.setView([`${this.seven.Y}`, `${this.seven.X}`], 13);
      L.marker([`${this.seven.Y}`, `${this.seven.X}`], { icon: blackIcon })
        .addTo(this.map)
        .bindPopup(
          `
        <div style="text-align:center;width:100px">
        <h3>${this.seven.POIName}門市</h3>
    
                <img style="width:40%;height:40%;margin:auto;" src="https://emap.pcsc.com.tw/ecmap/images/711_sl_36X36.gif">
            
                      <p>${this.seven.Address}<br>
                    
                      <button onclick="addAddress()">確認</button>
        </div>`
        )
        .openPopup();
    },
    addAddress() {
      this.post = this.address;
    },
    removeMap() {
      this.map.eachLayer((layer) => {
        if (layer instanceof L.Marker) {
          this.map.removeLayer(layer);
        }
      });
    },
  },
  computed: {
    township() {
      return this.location.find((item) => item.CityName === this.city)
        ?.AreaList;
    },
  },
  created() {
    this.axios
      .get("/json/taiwan.json") //鄉鎮
      .then((res) => {
        this.location = res.data;
      });
  },
  mounted() {
    this.initMap();
    window.addAddress = this.addAddress;
  },
};
</script>
<style lang="scss" scoped>
* {
  padding: 0;
  margin: 0;
}
#map-box {
  width: 50vh;
  height: 50vh;
  margin: auto;
}
</style>
