<template>
    <div>
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
      console.log("api survey", this.data);
    } catch (error) {
      console.error(error);
    }
  }
  }
};
</script>

