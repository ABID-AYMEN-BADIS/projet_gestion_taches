<template>
  <div class="task-form">
    <input
      type="text"
      v-model="title"
      placeholder="Titre de la tâche"
      required
      class="input-field"
    />
    <textarea
      v-model="description"
      placeholder="Description de la tâche"
      required
      class="input-field"
    ></textarea>

    <select v-model="priority" required class="input-field">
      <option disabled value="">Sélectionnez la priorité</option>
      <option value="basse">Basse</option>
      <option value="moyenne">Moyenne</option>
      <option value="haute">Haute</option>
    </select>

    <select v-model="category" required class="input-field">
      <option disabled value="">Sélectionnez la catégorie</option>
      <option value="Travail">Travail</option>
      <option value="Personnel">Personnel</option>
      <option value="Autre">Autre</option>
    </select>

    <button @click="submitTask" class="submit-btn">Ajouter la tâche</button>
  </div>
</template>

<script>
export default {
  data() {
    return {
      title: '',
      description: '',
      priority: '',
      category: '',
    };
  },
  methods: {
    submitTask() {
      if (this.title && this.description && this.priority && this.category) {
        this.$emit('add-task', {
          title: this.title,
          description: this.description,
          priority: this.priority,
          category: this.category,
        });
        this.title = '';
        this.description = '';
        this.priority = '';
        this.category = '';
      }
    },
  },
};
</script>

<style scoped>
.task-form {
  display: flex;
  flex-direction: column;
  gap: 15px;
  margin: 20px 0;
  background-color: #ffffff;
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
}

.input-field {
  width: 100%;
  padding: 12px;
  border: 1px solid #ddd;
  border-radius: 8px;
  font-size: 15px;
}

.input-field:focus {
  border-color: #007bff;
  outline: none;
}

.submit-btn {
  background-color: #28a745;
  color: white;
  padding: 12px;
  border: none;
  cursor: pointer;
  border-radius: 8px;
  font-size: 16px;
  font-weight: bold;
  transition: background-color 0.3s;
}

.submit-btn:hover {
  background-color: #218838;
}
</style>
