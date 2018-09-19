import { authService } from '../../_services';
import { getToken, setToken, removeToken } from '../../_utils/auth'

const user = {
  state: {
    user: '',
    status: '',
    code: '',
    token: getToken(),
    name: '',
    avatar: '',
    introduction: '',
    role: '',
    setting: {
      articlePlatform: []
    }
  },

  mutations: {
    SET_CODE: (state, code) => {
      state.code = code
    },
    SET_TOKEN: (state, token) => {
      state.token = token
    },
    SET_INTRODUCTION: (state, introduction) => {
      state.introduction = introduction
    },
    SET_SETTING: (state, setting) => {
      state.setting = setting
    },
    SET_STATUS: (state, status) => {
      state.status = status
    },
    SET_NAME: (state, name) => {
      state.name = name
    },
    SET_AVATAR: (state, avatar) => {
      state.avatar = avatar
    },
    SET_ROLE: (state, role) => {
      state.role = role
    }
  },

  actions: {
    // email login
    login({ commit }, userInfo) {
      const email = userInfo.email.trim()
      return new Promise((resolve, reject) => {
        authService.login(email, userInfo.password, userInfo.remember_me)
            .then(
                response => {
                  const data = response
                  commit('SET_TOKEN', data.access_token)
                  setToken(data.access_token)
                  resolve(response)
                },
                error => {
                  reject(error);
                }
            );
          })
    },

    // Get user infomation
    user({ commit, state }) {
      console.log("Working")
      return new Promise((resolve, reject) => {
        authService.user()
            .then(
                response => {
                   if (!response.data) { // Since mockjs does not support custom status codes, it can only be hacked like this.
                      //reject('error')
                       console.log(error);
                    }
                    const data = response.data

                    commit('SET_ROLE', data.role.type)

                    commit('SET_NAME', data.username)
                    //commit('SET_AVATAR', data.avatar)
                    //commit('SET_INTRODUCTION', data.introduction)
                    resolve(response)
                },
                error => {
                  reject(error)
                }
            )
          })
    },

    // Third party verification login
    // LoginByThirdparty({ commit, state }, code) {
    //   return new Promise((resolve, reject) => {
    //     commit('SET_CODE', code)
    //     loginByThirdparty(state.status, state.email, state.code).then(response => {
    //       commit('SET_TOKEN', response.data.token)
    //       setToken(response.data.token)
    //       resolve()
    //     }).catch(error => {
    //       reject(error)
    //     })
    //   })
    // },

    // Sign out
    logout({ commit, state }) {
      return new Promise((resolve, reject) => {
        authService.logout(state.token)
            .then(
                response => {
                    commit('SET_TOKEN', '')
                    commit('SET_ROLE', [])
                    removeToken()
                    resolve()
                },
                error => {
                  reject(error)
                }
            );
      })
    },

    // Frontent
    FedLogOut({ commit }) {
      return new Promise(resolve => {
        commit('SET_TOKEN', '')
        removeToken()
        resolve()
      })
    },

    // // Dynamically modify permissions
    // ChangeRoles({ commit }, role) {
    //   return new Promise(resolve => {
    //     commit('SET_TOKEN', role)
    //     setToken(role)
    //     getUserInfo(role).then(response => {
    //       const data = response.data
    //       commit('SET_ROLES', data.roles)
    //       commit('SET_NAME', data.name)
    //       commit('SET_AVATAR', data.avatar)
    //       commit('SET_INTRODUCTION', data.introduction)
    //       resolve()
    //     })
    //   })
    // }
  }
}

export default user
