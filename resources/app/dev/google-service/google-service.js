import { registerComponentIfExists } from 'utils/bundle'

registerComponentIfExists('google-map-container', () => import('./google-map-container.vue'))