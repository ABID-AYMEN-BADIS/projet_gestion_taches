import { createApp } from 'vue';
import App from './App.vue'; // Changez cela si vous utilisez le routing
import router from './router';

createApp(App)
  .use(router)
  .mount('#app');
