<template>
    <div>
      <p>Il vous reste {{ sondageData.timeLeft }} minutes pour participer au sondage</p>
      <h1>{{ sondageData.dernierSondage.title }}</h1>
      <p>{{ sondageData.dernierSondage.description }}</p>
      <p>Choix:</p>
      <!-- Boucle sur les réponses -->
      <div v-for="reponse in sondageData.reponses" :key="reponse.id" id="conteneur-options">
        <label>{{ reponse.title }}</label>
        <input type="radio" :name="'options[]'" :value="reponse.id" required>
      </div>
      <br>
      <button @click="submitForm">Valider</button>
    </div>
  </template>
  
  <script>
  export default {
    created() {
      console.log('Component Survey created.');
    },
    computed: {
      sondageData() {
        return window.sondageData;
      }
    },
    methods: {
      submitForm() {
        // Code pour soumettre le formulaire
      }
    }
  }
  </script>
  