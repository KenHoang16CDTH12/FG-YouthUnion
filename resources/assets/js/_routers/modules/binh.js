/** When your routing binh is too long, you can split it into small modules**/

import Layout from '../../_layouts/Layout'

const binhRouter = {
  path: '/binh',
  component: Layout,
  redirect: '/binh/index',
  name: 'binh',
  meta: {
    title: 'binh',
    icon: 'binh'
  },
  children: [
    {
      path: 'index',
      component: () => import('../../_views/binh/Index'),
      name: 'binh.index',
      meta: { title: 'listActivity' }
    }
  ]
}
export default binhRouter
