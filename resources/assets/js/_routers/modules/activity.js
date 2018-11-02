/** When your routing activity is too long, you can split it into small modules**/

import Layout from '../../_layouts/Layout'

const activityRouter = {
  path: '/activity',
  component: Layout,
  redirect: '/activity/index',
  name: 'activity',
  meta: {
    title: 'activity',
    icon: 'activity'
  },
  children: [
    {
      path: 'index',
      component: () => import('../../_views/activity/Index'),
      name: 'activity.index',
      meta: { title: 'listActivity' }
    },
    {
      path: 'type',
      component: () => import('../../_views/activity/type/Index'),
      name: 'activity.type.index',
      meta: { title: 'listActivityType' }
    },
  ]
}
export default activityRouter
