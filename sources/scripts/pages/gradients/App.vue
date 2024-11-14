<template>
  Gradients Editor

  <div 
    class="c-gradient" 
    :style="`background: linear-gradient(${color});`">
    test
  </div>


  <aside>
    <button @click="addColor">Add Color</button>
    
    <div v-for="(item, index) in colorPalette" :key="index">
      <ColorItem
        :item="item"
        :index="index"
        @remove="removeColor(index)"/>
    </div>

    <button @click="revertGradient">Reverse</button>

    <fieldset>
      <legend>Color mode:</legend>

      <div>
        <input type="radio" id="hexa" name="colorMode" value="hexa" />
        <label for="colorMode">hexa</label>
      </div>
      <div>
        <input type="radio" id="rgba" name="colorMode" value="rgba" />
        <label for="colorMode">rgba</label>
      </div>
  
      <div>
        <input type="radio" id="hsla" name="colorMode" value="hsla" />
        <label for="colorMode">hsla</label>
      </div>
      <div>
        <input type="radio" id="cymk" name="colorMode" value="cymk" />
        <label for="colorMode">cymk</label>
      </div>
      <div>
        <input type="radio" id="hsl" name="colorMode" value="hsl" />
        <label for="colorMode">hsl</label>
      </div>
  </fieldset>

    <input type="range" min="0" max="360" step="1" v-model="paletteRotation"> {{ paletteRotation }}°
    <pre>{{ color }}</pre>
  </aside>

  <pre>
    background: background: linear-gradient({{ color }});
  </pre>
  <button type="button" @click="copyToClipboard">Copy code</button>
</template>

<script setup>
import { ref, computed } from 'vue'
import ColorItem from './ColorItem.vue';

const colorPalette = ref([
  { color: '#ff0000', position: 0 },
  // { color: '#00ff00', position: 50 },
  // { color: '#0000ff', position: 100 },
])

const paletteRotation = ref(0)


const addColor = () => {
  colorPalette.value.push({ color: '#000000', position: 0.5 })
}

const removeColor = (index) => {
  colorPalette.value.splice(index, 1)
}

const updateColor = (index, color) => {
  colorPalette.value[index].color = color
}

const color = computed(() => {
  const colorList = colorPalette.value.map(item => {
    return `${ item.color } ${ item.position }%`
  }).join(', ')

  return `${ paletteRotation.value }deg, ${ colorList }`
})

const copyToClipboard = () => {
  clipboard.writeText(`background: linear-gradient(${ color.value });`)
}

const revertGradient = () => {
  colorPalette.value = colorPalette.value.reverse().map(item => {
    item.position = 100 - item.position
    return item
  })
}
</script>
<style>
  .c-gradient {
    border: solid 1px red;
    display: block;
    width: 100%;
    height: 100px;
  }
</style>