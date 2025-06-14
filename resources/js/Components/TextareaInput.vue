<script setup>
import { ref, onMounted } from 'vue';

// Définir la prop pour v-model
const { modelValue } = defineProps({
  modelValue: {
    type: String,
    default: ""
  },
});

// Définir l'événement pour émettre les mises à jour de la prop
const emit = defineEmits(['update:modelValue']);

// Référence à l'élément textarea
const input = ref(null);

// Méthode pour mettre à jour la valeur de modelValue
const updateValue = (newValue) => {
  emit('update:modelValue', newValue);
};
</script>

<template>
  <textarea
    :value="modelValue"
    @input="updateValue($event)"
    ref="input"
    class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm"
  ></textarea>
</template>
