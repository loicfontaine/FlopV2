<template>
    <div v-for="item in data" :key="item.id" class="survey-container" :class="{ 'expanded': item.isExpanded }" >
        <form @submit.prevent="uploadFiles(item)" :class="{ 'expanded': item.isExpanded }" >
  
        <div class="arrow-container" @click="toggleExpand(item)">
          <i class="arrow-icon" :class="{ expanded: item.isExpanded }"></i>
      </div>
      <div class="image-container-title">
        <img src="img/sondages.png" alt="Image">
      </div>
      <div class="text-container">
      <p class="countdown FontInter rose">{{ item.duration }}</p>
      <div class="description FontInter">{{ item.description }}</div>
      <div class="titre FontInter">Compare-toi aux autres auditeurs! </div>
    </div>
      <div class="expanded-content" v-if="item.isExpanded">

      <button class="expanded-button envoi FontMonserrat" type="submit">Envoyer</button>
    </div></form>
    </div> 
    
    </template>


<script>
import axios from 'axios';
export default {
    data() {
  return {
    countdowns: {},
    countdownIntervalId: null,
    data: [],
    intervalId: null,
    isExpanded: false,
    isArrowClicked: false,
    isRecording: false,
    mediaRecorder: null,
    chunks: [],
    audioBlob: null,
    selectedVideo: null,
    selectedImage: null,
    audioUrl: null,
    message: '',
    form: {
      video: null,
      image: null,
      message: '',
      audioBlob: null,
    },
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
  },
  toggleExpand(item) {
      item.isExpanded = !item.isExpanded;
    }
  }
};
</script>

<style scoped>

.survey-container {
display: flex;
align-items: center;
justify-content: center;
margin-top: 50px;
background-color: #303030;
border-radius: 8px;
margin-left: auto;
margin-right: auto;
width: 359px;
position: relative;
overflow: hidden;
transition: all 0.3s ease;

}

.survey-container.expanded {
height: auto;
align-items: flex-start;
padding-bottom: 20px;
display: flex; /* Ajouter cette ligne */
flex-direction: column;
}

.arrow-container {
position: absolute;
bottom: 0;
right: 0;
width: 30px;
height: 30px;
border-radius: 50% 0 0 0;
display: flex;
align-items: center;
justify-content: center;
cursor: pointer;
transition: all 0.3s ease;
transform: rotate(45deg);
}

.arrow-icon {
width: 12px;
height: 12px;
border-right: 2px solid #fff;
border-top: 2px solid #fff;
transform: rotate(90deg);
transition: all 0.3s ease;
}

.arrow-icon.expanded {
transform: rotate(-90deg);
}

form .image-container-title {
padding-top: 36px;
padding-bottom: 20px;
padding-left: 20px;
padding-right: 20px;
}

.image-container-title img {
width: 100px;
height: auto;
border-radius: 8px;
}

.survey-container.expanded .image-container-title {
padding: 0px;
height: 20%;
width:auto;
}

.survey-container.expanded .image-container-title img {
border-radius: 0px;
width: 100%;
}

.text-container {
padding: 20px;
padding-top: 10px;
}


.titre {
font-size: 20px;
font-weight: bold;
margin-top: 10px;
margin-bottom: 10px;
}


.expanded-input {
width: 85%;
padding: 8px;
border-radius: 8px;
border: none;
margin-bottom: 10px;
color: black;
}

.expanded-content {
width: 100%;
bottom: 40px;
display: flex;
align-items: center;
flex-direction: column;

}
.expanded-button{
border-radius: 8px;
background-color: #E60099;
font-weight: bold;
border: none;
width: 90%;
font-size: 18px;
margin-bottom: 10px;
text-align: center;
height: auto;
padding:8px;
}


.description{
font-size: 15px;
margin-top: 10px;
margin-bottom: 10px;
}

form:not(.expanded) {
display: flex;
}
</style>

