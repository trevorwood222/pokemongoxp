import React, { Component } from 'react';
import './App.scss';
import i18n from './i18n/i18n';
import {Config} from './Config';

import { Route, Link, BrowserRouter as Router, Switch } from 'react-router-dom'
import Calculator from './components/Calculator/Calculator'
import Result from './components/Result/Result';
import RawData from './components/RawData/RawData';
import NotFound from './components/NotFound/NotFound';

export default class App extends Component {
  render() {
    
    document.documentElement.lang = i18n.t('lang');
    
    // console.log("location.protocol",location.protocol);
    // console.log("location.hostname",location.hostname);
    // console.log("location.pathname",location.pathname);
    // console.log("location.hash",location.hash);
    // console.log("location.href",location.href);

    console.log(process.env.PUBLIC_URL);
    console.log("test1");

    return (
      <div className="app">
        <Switch>
          <Route exact path={"/"} component={Calculator} />
          <Route path={"/result"} component={Result} />
          <Route path={"/rawdata"} component={RawData} />
          <Route path={"/raw-data"} component={RawData} />
          <Route component={NotFound} />
        </Switch>
      </div>
    );
  }
}

