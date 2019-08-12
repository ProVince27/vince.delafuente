import { registerComponentIfExists } from 'utils/bundle'

registerComponentIfExists('dashboard-admin', () => import('./dashboard-admin/dashboard-admin.vue'))