import i18n from 'i18next';
import { initReactI18next } from "react-i18next";

// import {English} from './english.js';
// import {Japanese} from './japanese.js';
// import {Chinese} from './chinese';
// import {French} from './french';
// import {German} from './german';
// import {Spanish} from './spanish';
import {
  English,
  Japanese,
  Chinese,
  French,
  German,
  Spanish
} from './translations';

export const i18nInitOptions = {
  resources: {
    en: { translation: English },
    ja: { translation: Japanese },
    de: { translation: German },
    es: { translation: Spanish },
    fr: { translation: French },
    zh: { translation: Chinese },
  },
  lng: localStorage.language,
  fallbackLng: "en",

  interpolation: {
    escapeValue: false
  }
}

i18n
  .use(initReactI18next) // passes i18n down to react-i18next
  .init(i18nInitOptions);

export default i18n;
