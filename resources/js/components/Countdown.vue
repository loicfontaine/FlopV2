<template>
  <div v-for="item in data" :key="item.id" class="countdown-container" :class="{ 'expanded': item.isExpanded }" >
      <form @submit.prevent="uploadFiles(item)" :class="{ 'expanded': item.isExpanded }" >

      <div class="arrow-container" @click="toggleExpand(item)">
        <i class="arrow-icon" :class="{ expanded: item.isExpanded }"></i>
    </div>
    <div class="image-container-title">
      <img :src="getImage(item.is_contest)" alt="Image">
    </div>
    <div class="text-container">
      <p class="countdown FontInter rose">{{ getCountdown(item.end_time) }}</p>
      <div class="description FontInter">{{ item.description }}</div>
      <div class="titre FontInter">{{ getText(item.is_contest) }} </div>
    </div>
    <div class="expanded-content" v-if="item.isExpanded">
      <label for="video-upload" class="custom-file-upload FontMonserrat" v-if="afficherChampsVideo(item)">
        Choisir une vidéo
        <input id="video-upload" class="expanded-input FontMonserrat champsVideo" type="file" accept="video/*" ref="video" name="video" @change="handleVideoUpload">
        <video class="selectedMedia" v-if="selectedVideo" :src="selectedVideo" controls></video>
      </label>

      <label for="image-upload" class="custom-file-upload FontMonserrat" v-if="afficherChampsPhoto(item)">
        Choisir une image
        <input id="image-upload" class="expanded-input FontMonserrat champsImage" type="file" ref="image" accept="image/*" name="image" @change="handleImageUpload">
        <img class="selectedMedia" v-if="selectedImage" :src="selectedImage" alt="Image">
      </label>
      <div class="partieAudio" v-if="afficherChampsAudio(item)"><audio v-if="audioBlob" controls>
        <source :src="audioUrl" type="audio/webm">
        Votre navigateur ne prend pas en charge la lecture audio
      </audio>
      <button class="expanded-button audio FontMonserrat" @click="startRecording" v-if="!isRecording">Enregistrer</button>
      <button class="expanded-button audio FontMonserrat" @click="stopRecording" v-if="isRecording">Arrêter l'enregistrement</button>
      <input type="hidden" ref="audio" name="audioBlob"></div>
      <input class="expanded-input FontMonserrat champsTexte" type="text" placeholder="Envoyer un message..." name="message" v-model="message" ref="expandedInput" v-if="afficherChampsTexte(item)">
      <button class="expanded-button envoi FontMonserrat" type="submit">Envoyer ma participation</button>
      
    </div> </form>
  </div>

</template>

<script>
/* import json from './../../../public/data/challenges.json'; */
import axios from 'axios';
import moment from 'moment';
export default{
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

mounted() {

},
beforeDestroy() {
    clearInterval(this.countdownIntervalId);
  },


methods: {
  async fetchData() {
    try {
      const response = await axios.get('https://flop-pingouin.heig-vd.ch/api/home');
      this.data = response.data.challenges; // Assign the API response to the data property
      this.data = response.data.challenges.map(item => ({
          ...item,
          isExpanded: false}));
      console.log("api", this.data);
      this.startCountdown();
    } catch (error) {
      console.error(error);
    }
  },
  getCountdown(endTime) {
  const now = new Date();
  const endDate = new Date(endTime);
  const timeDiff = endDate - now;

  if (timeDiff <= 0) {
    return 'Le délai est écoulé';
  }

  const hours = Math.floor(timeDiff / (1000 * 60 * 60));
  const minutes = Math.floor((timeDiff % (1000 * 60 * 60)) / (1000 * 60));
  const seconds = Math.floor((timeDiff % (1000 * 60)) / 1000);

  return `${hours}h ${minutes}m ${seconds}s pour participer !`;
},
    startCountdown() {
      this.countdownIntervalId = setInterval(() => {
        this.data.forEach(item => {
          item.countdown = this.getCountdown(item.end_time);
        });
      }, 1000);
    },
  getImage(isContest) {
return isContest === 1 ? 'img/concours.png' : 'img/défis.png';
},
getText(isContest) {
return isContest === 1 ? 'Participe et gagne un des prix !' : 'Participe et gagne des ColorCoins !';
},
afficherChampsVideo(item) {
const participationTypes = [];
item.participation_types.forEach((participationType) => {
  participationTypes.push(participationType.title);
});
return participationTypes.includes('video');

},

afficherChampsPhoto(item) {
const participationTypes = [];
item.participation_types.forEach((participationType) => {
  participationTypes.push(participationType.title);
});
return participationTypes.includes('photo'); 
},
afficherChampsTexte(item) {
const participationTypes = [];
item.participation_types.forEach((participationType) => {
  participationTypes.push(participationType.title);
});
return participationTypes.includes('texte'); 
},
afficherChampsAudio(item) {
const participationTypes = [];
item.participation_types.forEach((participationType) => {
  participationTypes.push(participationType.title);
});
return participationTypes.includes('audio'); },

  uploadFiles(item) {
      const formData = new FormData();
formData.append('challenge_id', item.id);
      formData.append('message', this.message);
      formData.append('audioBlob', this.audioBlob);
      formData.append('image', this.image);
      formData.append('video', this.video)
      console.log(formData.get('image'));
     console.log(formData.get('challenge_id'));
      console.log(formData.get('message'));
      console.log(formData.get('video'));
      axios.post('/formSubmit', formData)
        .then(response => {
          console.log(response.data);
          window.location.reload();
        })
        .catch(error => {
          console.error(error);
        });
    },
    
  formatTime(time) {
    const hours = Math.floor(time / 3600);
    const minutes = Math.floor((time % 3600) / 60);
    const seconds = time % 60;

    return `${this.padNumber(hours)}:${this.padNumber(minutes)}:${this.padNumber(seconds)}`;
  },
  padNumber(number) {
    return String(number).padStart(2, '0');
  },

toggleExpand(item) {
      item.isExpanded = !item.isExpanded;
    },
  startRecording() {
    this.isRecording = true;
    this.chunks = [];

    navigator.mediaDevices.getUserMedia({ audio: true })
      .then((stream) => {
        this.mediaRecorder = new MediaRecorder(stream);
        this.mediaRecorder.addEventListener('dataavailable', this.onDataAvailable);
        this.mediaRecorder.addEventListener('stop', this.onRecordingStop);
        this.mediaRecorder.start();
      })
      .catch((error) => {
        console.error('Erreur lors de l\'accès à l\'enregistrement audio :', error);
      });
  },
  stopRecording() {
    this.isRecording = false;
    this.mediaRecorder.stop();
    this.mediaRecorder.stream.getAudioTracks()[0].stop();
  },
  
  onDataAvailable(event) {
    if (event.data.size > 0) {
      this.chunks.push(event.data);
    }
  },
  onRecordingStop() {
    this.audioBlob = new Blob(this.chunks, { type: 'audio/webm' });
    //export audioBlod to a file  

  },
  handleImageUpload(event) {
    const file = event.target.files[0];
    this.form.image = file;
    this.image = file;
    this.selectedImage = URL.createObjectURL(file);
  },
  handleVideoUpload(event) {
    const file = event.target.files[0];
    this.form.video = file;
    this.video = file;
    this.selectedVideo = URL.createObjectURL(file);
  },},

computed: {
  audioUrl() {
    return this.audioBlob ? URL.createObjectURL(this.audioBlob) : '';
  },
  
},
}
</script>



<style scoped>

.partieAudio{
  display: flex;;
  flex-direction: column;
  align-items: center;
}

.partieAudio .expanded-button{
  width: 107% !important;
}
.countdown-container {
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

.countdown-container.expanded {
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

.countdown-container.expanded .image-container-title {
padding: 0px;
height: 20%;
width:auto;
}

.countdown-container.expanded .image-container-title img {
border-radius: 0px;
width: 100%;
}

.text-container {
padding: 20px;
padding-top: 10px;
}

.countdown {
  font-size: 20px;
font-weight: bold;
margin-bottom: 10px; /* Ajout de la marge inférieure */
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

.custom-file-upload {
width: 85%;
padding: 8px;
border-radius: 8px;
border: none;
margin-bottom: 10px;
background-color: #E60099;
color: #fff;
font-weight: bold;
text-align: center;
cursor: pointer;
font-size: 18px;

}

.selectedMedia {
width: 100%;
height: auto;
border-radius: 8px;
}

#image-upload, #video-upload {
display: none;
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