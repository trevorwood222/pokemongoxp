enum Env {
  production,
  development
}

const environment = (!process.env.NODE_ENV || process.env.NODE_ENV === 'development') ? Env.development: Env.production;

export const Config = {
  env: environment,
  urlpath: (environment === Env.production) 
            ? "/pokemongoxp" 
            : "", 
}



