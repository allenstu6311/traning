import { createApp } from 'vue'
import axios from 'axios'
// import VueAxios from 'vue-axios'
import App from './App.vue'
import Antd from 'ant-design-vue';
import './registerServiceWorker'
import router from './router'
import store from './store/store'
import { DatePicker } from 'ant-design-vue';
// import Vue from 'vue';
import ElementPlus from 'element-plus'
import 'element-plus/dist/index.css'
// import VueCropper from 'vue-cropper'
// import { apply } from 'core-js/fn/reflect'

const app =createApp(App)

app.use(ElementPlus)
app.use(store)
app.use(Antd)
app.use(router)
app.use(DatePicker)
// app.use(VueCropper)
app.config.globalProperties.axios=axios


app.mount("#app")

// createApp(App).use(store).use(router).use(VueAxios,axios).use(ElementPlus).mount('#app')

