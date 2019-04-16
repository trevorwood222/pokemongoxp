//
// To make these translations easier we could include a file like this to have side by side translations. 
// Makes maintaining all that much easier
//

/**
 * Converts our message structure to only contain one locale's text. This is required by our i18n library
 *
 * @param {Object} messages A key/value object containing several localisation texts
 * @param {String} locale The key of the locale text we want in the output
 */
const convertToSingularLocale = (messages, locale ) => {
  let singleLocale = Object.assign({}, messages)

  for (let property in singleLocale) {
    if (property === locale) {
      return singleLocale[property]
    } else if (typeof singleLocale[property] === 'object') {
      singleLocale[property] = convertToSingularLocale(singleLocale[property], locale)
    }
  }

  return singleLocale
}

const translations = {
  general: {},
  header: {
    lang: {
      de: "de",
      es: "es",
      en: "en",
      ja: "ja",
      fr: "fr",
      zh: "zh",
    },
    desc: {
      de: "Pokemon Go XP Rechner, Finden Sie heraus, wie lange es sein wird , bis Sie Ihren nächsten Trainer Niveau zu erreichen und sehen, was Belohnungen warten auf Sie!",
      es: "Pokemon Go XP Calculadora, Averigüe cuánto tiempo pasará hasta que llegue a su siguiente nivel entrenador y ver qué recompensas te esperan!",
      en: "Pokémon Go XP Calculator, Find out how long it will be until you reach your next trainer level and see what rewards await you!",
      ja: "Pokémon Go XP計算機, 次のレベルに進む時間を簡単にはかる！そのレベルの賞罰もわかる！",
      fr: "Pokemon Go XP Calculator, Découvrez combien de temps il sera jusqu'à ce que vous atteignez votre niveau d'entraînement suivant et voir quelles récompenses vous attendent!",
      zh: "Pokemon Go XP计算器, 查看需要升级的经验和获得的奖励!",
    }
  },
  calculator: {
    curlvl: {
      de: "Aktuelles Level",
      es: "Nivel Actual",
      en: "Current Level",
      ja: "現在のレベル",
      fr: "Niveau actuel",
      zh: "目前等级",
    }
  },
  result: {

  },
  rawdata: {

  },
  levels: {
    gym: {
      de: "",
      es: "",
      en: "Gym",
      ja: "",
      fr: "",
      zh: "",
    },
    pokeball: {
      de: "",
      es: "",
      en: "Pokéball",
      ja: "",
      fr: "",
      zh: "",
    },
    greatball: {
      de: "",
      es: "",
      en: "Great Ball",
      ja: "",
      fr: "",
      zh: "",
    },
    ultraball: {
      de: "",
      es: "",
      en: "Ultra Ball",
      ja: "",
      fr: "",
      zh: "",
    },
    razzberry: {
      de: "",
      es: "",
      en: "Razz Berry",
      ja: "",
      fr: "",
      zh: "",
    },
    // potion: "Potion",
    // superpotion: "Super Potion",
    // hyperpotion: "Hyper Potion",
    // maxpotion: "Max Potion",
    // revive: "Revive",
    // maxrevive: "Max Revive",
    // incense: "Incense",
    // luremodule: "Lure Module",
    // incubator: "Incubator", // unlimited
    // eggincubator: "Egg Incubator", //limited one
    // luckyegg: "Lucky Egg",
  }
}

export const German = convertToSingularLocale(translations, 'de')
export const Spanish = convertToSingularLocale(translations, 'es')
export const English = convertToSingularLocale(translations, 'en')
export const Japanese = convertToSingularLocale(translations, 'ja')
export const French = convertToSingularLocale(translations, 'fr')
export const Chinese = convertToSingularLocale(translations, 'zh')
