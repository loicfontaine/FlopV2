import { createApp } from "vue";

import App from "./components/Countdown.vue";

import TestForm from "./components/TestForm.vue";

import Survey from "./components/Survey.vue";

const app = createApp(App);
const survey = createApp(Survey);

app.mount("#app");
survey.mount("#survey");
