import "./bootstrap";
import { createApp } from "vue";
import ExampleComponent from "./components/ExampleComponent.vue";
import MBTIChatbot from "./components/MBTIChatbot.vue";

const app = createApp({});
app.component("example-component", ExampleComponent);
app.component("mbti-chatbot", MBTIChatbot);
app.mount("#app");
