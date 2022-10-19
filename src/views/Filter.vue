<template>
  <header>
    <nav>
      <transition name="slide" v-show="isShow">
        <ul>
          <li>選單</li>
          <li>選單</li>
          <li>選單</li>
          <li>選單</li>
          <li>選單</li>
        </ul>
      </transition>
    </nav>
    <div
      class="control"
      @click="
        isShow = !isShow;
        rotate = !rotate;
      "
    >
      <div class="line" :class="{ active1: rotate == true }"></div>

      <div class="line" :class="{ active2: rotate == true }"></div>
    </div>
  </header>
  <div class="" style="margin-left: 40px; line-height: 2">
    <p><input type="checkbox" v-model="filter" value="1-40" />1~40</p>
    <p><input type="checkbox" v-model="filter" value="41-70" />41~70</p>
    <p><input type="checkbox" v-model="filter" value="71-120" />71~120</p>
  </div>
  <div class="container">
    <div class="card" v-for="item in data" :key="item">
      <div class="pic">
        <img :src="item.image" alt="" />
      </div>
      <div class="name"></div>
      <div class="price">$<input type="text" v-model="item.price" /></div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      isShow: false,
      rotate: false,
      data: [],
      filter: [],
      range_1: [],
      range_2: [],
      range_3: [],
      newData: [],
      index: [],
    };
  },
  watch: {
    filter: {
      handler(newVal) {
    
        for (let i = 0; i < newVal.length; i++) {
          this.range_1 = newVal[i].split("-");

         console.log(this.range_1) 
         
          this.data = this.data.filter(
            (item) =>
              item.price > this.range_1[0] && item.price < this.range_1[1]
          );

        }
            
      },
    },
    data: {
      handler(newVal) {
        if (newVal.length == 0) {
          this.data = this.info;
        }
      },
    },
  },
  created() {
    this.axios.get("https://fakestoreapi.com/products/").then((res) => {
      this.data = res.data;
      this.info = res.data;

      // console.log(this.data.filter(item=>item.price>100))
    });
  },
};
</script>
<style lang="scss">
* {
  padding: 0;
  margin: 0;
  list-style: none;
}
.container {
  width: 960px;
  display: flex;
  flex-wrap: wrap;
  .card {
    width: 300px;
    p {
      font-size: 20px;
    }
  }
}
img {
  width: 20%;
}
.active1 {
  position: absolute;
  transform: rotate(45deg);
  transition: 0.4s;
}
.active2 {
  position: absolute;
  transform: rotate(-45deg);
  transition: 0.4s;
}
.slide-enter-active,
.slide-leave-active {
  width: 50%;
  height: 50%;
  transition: 0.4s;
}
.slide-enter-from,
.slide-leave-to {
  width: 0;
  height: 0;
  font-size: 0;
  border-radius: 50%;
  background-color: red;
}
.slide-enter-to {
  width: 100%;
  height: 100%;
  background-color: blue;
}

.slide-leave-from {
  font-size: 0;
  background-color: blue;
}

header {
  display: flex;
  align-items: center;

  font-size: 30px;
  font-weight: 800;
  nav {
    margin: auto;

    ul {
      width: 100%;
      max-width: 400px;
      height: 100vh;
      position: absolute;
      right: 0;
      top: 0;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      background-color: red;

      li {
        margin: 20px 20px;
      }
    }
  }
  .control {
    width: 30px;
    height: 50px;
    margin: 0 20px;
    position: relative;
    z-index: 5;
    display: flex;

    flex-direction: column;
    .line {
      width: 30px;
      height: 4px;
      background-color: black;
      margin: 5px 0;
    }
  }
}
</style>
