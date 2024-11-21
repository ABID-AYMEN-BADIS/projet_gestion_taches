<template>
  <div id="app">
    <TaskApp />
  </div>
</template>

<script>
import TaskApp from './components/TaskApp.vue';

export default {
  components: {
    TaskApp,
  },
};
</script>

<style>
/* Styles globaux si nécessaires */
body {
  font-family: Arial, sans-serif;
  background-color: #f9f9f9;
}
</style>

