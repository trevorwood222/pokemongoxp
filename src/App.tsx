import React, { Component } from 'react';
import './App.scss';
import i18n from './i18n/i18n'

import { Route, Link, BrowserRouter as Router, Switch } from 'react-router-dom'
import Calculator from './components/Calculator/Calculator'
import Result from './components/Result/Result';
import RawData from './components/RawData/RawData';
import NotFound from './components/NotFound/NotFound';

export default class App extends Component {
  render() {
    
    document.documentElement.lang = i18n.t('lang');

    return (
      <div className="app">
        <Switch>
          <Route exact path="/" component={Calculator} />
          <Route path="/result" component={Result} />
          <Route path="/rawdata" component={RawData} />
          <Route path="/raw-data" component={RawData} />
          <Route component={NotFound} />
        </Switch>
      </div>
    );
  }
}

