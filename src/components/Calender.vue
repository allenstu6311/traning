<template>
  <a-calendar v-model:value="value" @panelChange="onPanelChange">
    <template #dateCellRender> </template>
  </a-calendar>
  <div class="123">
    

  </div>
</template>
<script>
import "ant-design-vue/dist/antd.css";
import { defineComponent, ref } from "vue";
import { Calendar } from "ant-design-vue";

export default defineComponent({
  components: {
    ACalendar: Calendar,
  },
  setup() {
    const value = ref();
    const onPanelChange = (value, mode) => {
      console.log(value, mode);
    };

    return {
      value,
      onPanelChange,
    };
  },
});
</script>
