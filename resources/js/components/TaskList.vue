<template>
  <div class="task-list">
    <h2>Liste des Tâches</h2>
    <transition-group name="fade" mode="out-in">
      <div v-for="task in tasks" :key="task.id" class="task-item">
        <input
          type="checkbox"
          v-model="task.completed"
          @change="updateTask(task)"
          class="task-checkbox"
        />
        <div class="task-content">
          <h3 :class="{ completed: task.completed }">{{ task.title }}</h3>
          <p>{{ task.description }}</p>
          <p>Priorité : {{ task.priority }}</p>
          <p>Catégorie : {{ task.category }}</p>
          <button @click="deleteTask(task.id)" class="delete-btn">Supprimer</button>
        </div>
      </div>
    </transition-group>
  </div>
</template>

<script>
export default {
  props: ['tasks'],
  methods: {
    updateTask(task) {
      this.$emit('update-task', task);
    },
    deleteTask(id) {
      this.$emit('delete-task', id);
    },
  },
};
</script>

<style scoped>
.task-list {
  margin: 20px 0;
}

.task-item {
  display: flex;
  align-items: center;
  padding: 15px;
  background-color: #ffffff;
  border: 1px solid #ddd;
  border-radius: 10px;
  margin-bottom: 12px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  transition: box-shadow 0.3s;
}

.task-item:hover {
  box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
}

.task-checkbox {
  margin-right: 15px;
}

.task-content {
  flex-grow: 1;
}

.completed {
  text-decoration: line-through;
  color: #999;
}

.delete-btn {
  background-color: #e3342f;
  color: white;
  padding: 8px 12px;
  border: none;
  cursor: pointer;
  border-radius: 8px;
  font-size: 14px;
  transition: background-color 0.3s;
}

.delete-btn:hover {
  background-color: #c82333;
}
</style>
