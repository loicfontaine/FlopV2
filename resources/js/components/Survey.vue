<template>
    <div>
      <p>Il vous reste {{ timeLeft }} minutes pour participer au sondage</p>
      <h1>{{ dernierSondage.title }}</h1>
      <p>{{ dernierSondage.description }}</p>
      <p>Choix:</p>
      <!-- Boucle sur les réponses -->
      <div v-for="reponse in reponses" :key="reponse.id" id="conteneur-options">
        <label>{{ reponse.title }}</label>
        <input type="radio" name="options[]" :value="reponse.id" required>
      </div>
      <br>
      <button @click="submitForm">Valider</button>
    </div>
  </template>
  
  <script>
  export default {
    props: {
      timeLeft: {
        type: Number,
        required: true
      },
      dernierSondage: {
        type: Object,
        required: true
      },
      reponses: {
        type: Array,
        required: true
      }
    },
    methods: {
      submitForm() {
        // Code pour soumettre le formulaire
      }
    }
  }
  </script>
  