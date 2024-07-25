<!-- Button.vue -->
<template>
    <button :class="buttonClass" @click="handleClick">
      <i v-html="icon"></i> {{ buttonText }}
    </button>
  </template>
  
  <script>
  export default {
    props: {
      buttonText: String,
      icon: String,
      buttonClass: String,
      handleClick: Function
    }
  };
  </script>
  
  <style scoped>
  /* Estilos opcionales para los botones */
  .button {
    /* Estilos generales para los botones */
  }
  </style>
  