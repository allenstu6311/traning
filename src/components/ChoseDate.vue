<template>
  <a-space direction="vertical" :size="12">
  
    <a-range-picker
      :show-time="{ format: 'HH:mm' }"
      format="YYYY-MM-DD HH:mm"
      :placeholder="['Start Time', 'End Time']"
      @change="onRangeChange"
      @ok="onRangeOk"
    />
  </a-space>
</template>
<style>

</style>
<script>
import { defineComponent } from 'vue';
export default defineComponent({
  setup() {
    const onChange = (value, dateString) => {
      console.log('Selected Time: ', value);
      console.log('Formatted Selected Time: ', dateString);
    };

    const onOk = value => {
      console.log('onOk: ', value);
    };

    const onRangeChange = (value, dateString) => {
      console.log('Selected Time: ', value);
      console.log('Formatted Selected Time: ', dateString);
    };

    const onRangeOk = value => {
      console.log('onOk: ', value);
    };

    return {
      onChange,
      onOk,
      onRangeChange,
      onRangeOk,
    };
  },

});
</script>