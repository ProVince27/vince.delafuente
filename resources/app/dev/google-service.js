import { registerComponentIfExists } from 'utils/bundle'

registerComponentIfExists('google-map-container', () => import('./google-service/google-map-container.vue'))