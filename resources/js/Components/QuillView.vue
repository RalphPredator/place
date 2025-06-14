<script setup>
import { onMounted, onBeforeUnmount, ref, watch } from 'vue'
import Quill from 'quill'
import 'quill/dist/quill.snow.css'

const props = defineProps({
  modelValue: {
    type: String,
    default: ''
  }
})

const viewer = ref(null)
const quill = ref(null)

onMounted(() => {
  quill.value = new Quill(viewer.value, {
    theme: 'snow',
    readOnly: true,
    modules: {
      toolbar: false
    }
  })

  quill.value.root.innerHTML = props.modelValue
})

watch(() => props.modelValue, (newValue) => {
  if (quill.value) {
    quill.value.root.innerHTML = newValue
  }
})

onBeforeUnmount(() => {
  if (quill.value) {
    quill.value = null
  }
})
</script>

<template>
  <div class="quill-viewer">
    <div ref="viewer"></div>
  </div>
</template>

<style lang="scss">
.quill-viewer {
  .ql-editor {
    padding: 0;
    font-size: 16px;
    line-height: 1.5;
  }

  .ql-container {
    border: none !important;
  }
}
</style>