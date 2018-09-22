/** When your routing notification is too long, you can split it into small modules**/

import Layout from '../../_layouts/Layout'

const notificationRouter = {
  path: '/notification',
  component: Layout,
  redirect: '/notification/index',
  name: 'notification',
  meta: {
    title: 'notification',
    icon: 'notification'
  },
  children: [
    {
      path: 'index',
      component: () => import('../../_views/notification/Index'),
      name: 'notification.index',
      meta: { title: 'listNotification' }
    }
  ]
}
export default notificationRouter
