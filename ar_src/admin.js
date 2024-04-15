// Library
import { createApp } from 'vue';
import PrimeVue from 'primevue/config';
import 'primevue/resources/themes/aura-light-green/theme.css'

// Components
import Admin from './Admin.vue'

const app = createApp(Admin);
app.use(PrimeVue);
app.mount('#proshots-admin');
