import { registerComponentIfExists } from 'utils/bundle'

registerComponentIfExists('media-index', () => import('./media-index.vue'))