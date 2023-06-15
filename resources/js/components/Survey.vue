<template>
    <div v-for="item in data" :key="item.id" class="countdown-container" :class="{ 'expanded': item.isExpanded }" >
        <form @submit.prevent="uploadFiles(item)" :class="{ 'expanded': item.isExpanded }" >
  
        <div class="arrow-container" @click="toggleExpand(item)">
          <i class="arrow-icon" :class="{ expanded: item.isExpanded }"></i>
      </div>
      <div class="image-container-title">
        <img src="img/sondages.png" alt="Image">
      </div>
      </form>
    </div> 
    
    </template>


<script>
import axios from 'axios';
export default {
  data() {
    return {
      textField: ''
    };
  },
  created() {
    this.fetchData();
  },
  methods: {
    async fetchData() {
    try {
      const response = await axios.get('https://flop-pingouin.heig-vd.ch/api/home');
      this.data = response.data.sondages; // Assign the API response to the data property
      this.data = response.data.sondages.map(item => ({
          ...item,
          isExpanded: false}));
      console.log("api survey", this.data);

    } catch (error) {
      console.error(error);
    }
  }
  }
};
</script>

<style scoped>
</style>


