const getters = {
  size: state => state.app.size,
  name: state => state.user.name,
  role: state => state.user.role,
  token: state => state.user.token,
  status: state => state.user.status,
  avatar: state => state.user.avatar,
  setting: state => state.user.setting,
  language: state => state.app.language,
  errorLogs: state => state.errorLog.logs,
  introduction: state => state.user.introduction,
  cachedViews: state => state.tagsView.cachedViews,
  addRouters: state => state.permission.addRouters,
  visitedViews: state => state.tagsView.visitedViews,
  permission_routers: state => state.permission.routers,
}
export default getters
