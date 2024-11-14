<template>
  <input type="range" min="0" max="100" v-model="item.position" step="1">
  <input type="number" min="0" max="100" v-model="item.position" step="1">%
  <input type="color" v-model="item.color">
  <button @click="remove">Remove</button>

  <div class="c-cardItemHexa">
    Hexa:
    <input type="text" v-model="item.color" />
  </div>

  <div class="c-cardItemRgba">
    Rgba:
    <input type="text" :value="convertToRgba" />
  </div>

  <div class="c-cardItemHsla">
    Hsla:
    <input type="text" :value="convertToHsla()" />
  </div>

  <div 
    class="c-cardItem_map"
    @mousemove="onMouseMove"
    @click="onClick"
  >
    <div class="-1"></div>
    <div class="-2"></div>
    <span 
      class="c-cardItem_mapCursor"
      :style="{ cursor: isDragging ? 'grabbing' : 'grab' }"
      @mouseup="onMouseUp"
      @mousedown="onMouseDown"></span>
  </div>
</template>
<script setup>
import { ref, computed } from 'vue'

const isDragging = ref(false)

const props = defineProps({
  item: Object,
  index: Number,
  updateColor: Function,
  removeColor: Function,
  colorMode: String,
})

const emit = defineEmits(['update', 'remove'])

const remove = () => {
  emit('remove', props.index)
}

const convertToRgba = () => {
  const r = parseInt(props.item.color.value.substring(1, 3), 16)
  const g = parseInt(props.item.color.value.substring(3, 5), 16)
  const b = parseInt(props.item.color.value.substring(5, 7), 16)

  return `rgba(${ r }, ${ g }, ${ b }, 1)`
}

const convertToHsla = () => {
  return `hsla(0, 0%, 0%, 1)`
}

// Events

const onMouseDown = (e) => {
  isDragging.value = true
  console.log('onMouseDown', e);
}

const onMouseMove = (e) => {
  // console.log('onMouseMove', e);
  if (isDragging.value === true) {
    console.log('isDragging', isDragging.value);
  }
}

const onMouseUp = (e) => {
  isDragging.value = false
  console.log('onMouseUp', e);
}

const onClick = (e) => {
  console.log('onClick', e);
}
</script>
<style lang="scss">
.c-cardItem {

  &_map {
    position: relative;
    width: 400px;
    height: 300px;
    border: 1px solid #000;
  }

  &_mapItem {
    
  }

  &_mapCursor {
    left: 0;
    top: 0;
    position: absolute;
    width: 10px;
    height: 10px;
    background-color: red;
    border-radius: 50%;
  }
}
</style>