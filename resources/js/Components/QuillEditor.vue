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

const emit = defineEmits(['update:modelValue'])
const editor = ref(null)
const quill = ref(null)
let isInternalChange = false

const fontSizeArr = ['10px', '11px', '12px', '13px', '14px', '15px', '16px', '17px', '18px']

const Size = Quill.import('attributors/style/size')
Size.whitelist = fontSizeArr
Quill.register(Size, true)

onMounted(() => {
  quill.value = new Quill(editor.value, {
    theme: 'snow',
    modules: {
      toolbar: [
        ['bold', 'italic', 'underline', 'strike'],
        ['blockquote', 'code-block'],
        [{ 'header': 1 }, { 'header': 2 }],
        [{ 'list': 'ordered'}, { 'list': 'bullet' }],
        [{ 'script': 'sub'}, { 'script': 'super' }],
        [{ 'indent': '-1'}, { 'indent': '+1' }],
        [{ 'direction': 'rtl' }],
        [{ 'size': fontSizeArr }],
        [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
        [{ 'color': [] }, { 'background': [] }],
        [{ 'font': [] }],
        [{ 'align': [] }],
        ['clean']
      ]
    }
  })

  quill.value.root.innerHTML = props.modelValue

  quill.value.on('text-change', () => {
    if (!isInternalChange) {
      emit('update:modelValue', quill.value.root.innerHTML)
    }
  })
})

watch(() => props.modelValue, (newValue) => {
  if (quill.value && newValue !== quill.value.root.innerHTML) {
    isInternalChange = true
    quill.value.root.innerHTML = newValue
    isInternalChange = false
  }
})

onBeforeUnmount(() => {
  if (quill.value) {
    quill.value = null
  }
})
</script>

<template>
  <div class="quill-editor">
    <div ref="editor"></div>
  </div>
</template>

<style lang="scss">
.quill-editor {
  border: 1px solid #ccc;
  border-radius: 0.5rem;
  overflow: hidden;

  .ql-editor {
    min-height: 200px;
    font-size: 16px;
    line-height: 1.5;
  }

  .ql-toolbar {
    border: {
      top: none !important;
      left: none !important;
      right: none !important;
      bottom: 1px solid #e2e8f0 !important;
    }
    background-color: #f8fafc;
  }

  .ql-container {
    border: none !important;
  }
}

.ql-snow {
  .ql-picker.ql-size {
    .ql-picker-label, .ql-picker-item {
      @for $size from 10 through 18 {
        &[data-value="#{$size}px"]::before {
          content: '#{$size}px';
          font-size: #{$size}px;
        }
      }
    }

    .ql-picker-label::before {
      content: 'Size';
    }
  }
}
</style>