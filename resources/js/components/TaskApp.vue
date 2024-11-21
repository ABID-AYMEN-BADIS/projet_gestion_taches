<template>
  <div class="container">
    <h1>Gestion des Tâches</h1>

    <!-- Barre de recherche avec bouton -->
    <div class="search-container">
      <input
        type="text"
        v-model="searchQuery"
        placeholder="Rechercher des tâches"
        class="search-bar"
      />
    </div>

    <!-- Filtre de catégorie -->
    <select v-model="filterCategory" class="filter-select">
      <option value="">Toutes les catégories</option>
      <option value="Travail">Travail</option>
      <option value="Personnel">Personnel</option>
      <option value="Autre">Autre</option>
    </select>

    <TaskForm @add-task="addTask" />
    <TaskList :tasks="filteredTasks" @update-task="updateTask" @delete-task="deleteTask" />
  </div>
</template>

<script>
import TaskForm from './TaskForm.vue';
import TaskList from './TaskList.vue';

export default {
  components: { TaskForm, TaskList },
  data() {
    return {
      tasks: [],
      searchQuery: '',
      filterCategory: '',
    };
  },
  computed: {
    filteredTasks() {
      return this.tasks.filter(task => {
        const matchesSearch = task.title.toLowerCase().includes(this.searchQuery.toLowerCase());
        const matchesCategory = !this.filterCategory || task.category === this.filterCategory;
        return matchesSearch && matchesCategory;
      });
    },
  },
  methods: {
    addTask(task) {
      const newTask = {
        id: Date.now(),
        ...task,
        completed: false,
        created_at: new Date().toLocaleString(),
      };
      this.tasks.push(newTask);
      localStorage.setItem('tasks', JSON.stringify(this.tasks));
    },
    updateTask(updatedTask) {
      const index = this.tasks.findIndex(task => task.id === updatedTask.id);
      if (index !== -1) {
        this.tasks[index].completed = updatedTask.completed;
        localStorage.setItem('tasks', JSON.stringify(this.tasks));
      }
    },
    deleteTask(id) {
      this.tasks = this.tasks.filter(task => task.id !== id);
      localStorage.setItem('tasks', JSON.stringify(this.tasks));
    },
  },
  mounted() {
    const tasks = JSON.parse(localStorage.getItem('tasks')) || [];
    this.tasks = tasks;
  },
};
</script>

<style scoped>
.container {
  max-width: 700px;
  margin: 0 auto;
  padding: 40px;
  background-color: #f4f5f7;
  border-radius: 15px;
  box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
  font-family: Arial, sans-serif;
}

h1 {
  color: #444;
  text-align: center;
  font-size: 28px;
  font-weight: 600;
  margin-bottom: 30px;
}

.search-container {
  display: flex;
  justify-content: center;
  margin-bottom: 20px;
}

.search-bar {
  flex: 1;
  padding: 10px;
  border: 1px solid #ddd;
  border-radius: 8px;
  font-size: 16px;
  max-width: 500px;
  margin-right: 10px;
}

.filter-select {
  width: 100%;
  padding: 12px;
  border: 1px solid #ddd;
  border-radius: 8px;
  font-size: 16px;
  max-width: 500px;
  margin: 0 auto 20px auto;
  display: block;
}
</style>

