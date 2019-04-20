
import { levels } from './translations/levels';
import { calculator } from './translations/calculator';
import { result } from './translations/result';
import { rawdata } from './translations/rawdata';

//
// To make these translations easier we could include a file like this to have side by side translations. 
// Makes maintaining all that much easier
//

// TODO @Trevor 
// In the event a translation is not there, it will display nothing. Implement a fallback language.

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
  general: {
    languageAbbreviation: {
      de: "de",
      es: "es",
      en: "en",
      ja: "ja",
      fr: "fr",
      zh: "zh",
    },
    back: {
      de: "Zurück",
      es: "Espalda",
      en: "Back",
      ja: "戻る",
      fr: "Arrière",
      zh: "返回",
    },
    rewards: {
      de: "Belohnungen",
      es: "Recompensas",
      en: "Rewards",
      ja: "報酬",
      fr: "Récompenses",
      zh: "奖励",
    },
  },
  header: {
    description: {
      de: "Pokemon Go XP Rechner, Finden Sie heraus, wie lange es sein wird , bis Sie Ihren nächsten Trainer Niveau zu erreichen und sehen, was Belohnungen warten auf Sie!",
      es: "Pokemon Go XP Calculadora, Averigüe cuánto tiempo pasará hasta que llegue a su siguiente nivel entrenador y ver qué recompensas te esperan!",
      en: "Pokémon Go XP Calculator, Find out how long it will be until you reach your next trainer level and see what rewards await you!",
      ja: "Pokémon Go XP計算機, 次のレベルに進む時間を簡単にはかる！そのレベルの賞罰もわかる！",
      fr: "Pokemon Go XP Calculator, Découvrez combien de temps il sera jusqu'à ce que vous atteignez votre niveau d'entraînement suivant et voir quelles récompenses vous attendent!",
      zh: "Pokemon Go XP计算器, 查看需要升级的经验和获得的奖励!",
    },
    keywords: {
      de: "Pokémon GO, Pokemon GO, XP Rechner",
      es: "Pokémon GO, Pokemon Go, XP Calculadora",
      en: "Pokémon GO, Pokemon GO, XP Calculator",
      ja: "Pokémon GO, Pokemon GO, XP計算機",
      fr: "Pokémon GO, Pokemon GO, XP Calculator",
      zh: "Pokémon GO, Pokemon Go, XP计算器",
    }
  },
  calculator: calculator,
  result: result,
  rawdata: rawdata,
  levels: levels
}

export const German = convertToSingularLocale(translations, 'de')
export const Spanish = convertToSingularLocale(translations, 'es')
export const English = convertToSingularLocale(translations, 'en')
export const Japanese = convertToSingularLocale(translations, 'ja')
export const French = convertToSingularLocale(translations, 'fr')
export const Chinese = convertToSingularLocale(translations, 'zh')
