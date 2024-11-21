import { createRouter, createWebHistory } from 'vue-router';
import TaskApp from './components/TaskApp.vue';

const routes = [
  {
    path: '/',
    name: 'TaskApp',
    component: TaskApp,
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
