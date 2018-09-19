import Vue from 'vue';
import Cookies from 'js-cookie';
import VueInternationalization from 'vue-i18n';
import Locale from '../vue-i18n-locales.generated';
import elementEnLocale from 'element-ui/lib/locale/lang/en' // element-ui lang
import elementViLocale from 'element-ui/lib/locale/lang/vi' // element-ui lang
Vue.use(VueInternationalization);

const messages = {
    en: {
      ...Locale.en,
      ...elementEnLocale
    },
    vi: {
      ...Locale.vi,
      ...elementViLocale
    }
}

const i18n = new VueInternationalization({
  // set locale
  // options: en or zh
  locale: Cookies.get('language') || 'en',
  messages
})

export default i18n
