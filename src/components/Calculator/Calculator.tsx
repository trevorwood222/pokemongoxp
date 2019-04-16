import React, { Component } from 'react';
import './Calculator.scss';
import t, {i18nInitOptions} from '../../i18n/i18n';
import Parser from 'html-react-parser';
import i18n from 'i18next';
import { initReactI18next } from "react-i18next";

export interface CalculatorProps {};
export interface CalculatorState {
  currentLevel: number;
  currentXPAmount: number;
  currentEarningAmount: number;
};

export default class Calculator extends Component <CalculatorProps, CalculatorState> {
  constructor(props: CalculatorProps) {
    super(props);
    this.state = {
      currentLevel: (localStorage.currentLevel === undefined) ? 1 : localStorage.currentLevel,
      currentXPAmount: (localStorage.currentXPAmount === undefined) ? 100 : localStorage.currentXPAmount,
      currentEarningAmount: (localStorage.currentEarningAmount === undefined) ? 350 : localStorage.currentEarningAmount,
    };

    this.handleChange = this.handleChange.bind(this);
    this.selectOnChange = this.selectOnChange.bind(this);
  }

  // beleive it or not, this is the best way... in TypeScript
  handleChange(e: React.ChangeEvent<HTMLInputElement>) {
    const key = e.currentTarget.name;
    const value = parseInt(e.currentTarget.value);
    switch(key){
      case "currentLevel":
        this.setState({currentLevel: value});
        break;
      case "currentXPAmount":
        this.setState({currentXPAmount: value});
        break;
      case "currentEarningAmount":
        this.setState({currentEarningAmount: value});
        break;
      default:
        return;
    }
    localStorage[key] = value;
  }

  selectOnChange(event: any) {
    localStorage.language = event.target.value;
    i18nInitOptions.lng = event.target.value;
    i18n.use(initReactI18next).init(i18nInitOptions);
    this.forceUpdate();
  }

  render() {
    return (  
      <div className="calculator">
        <div className="logo">
          <i>Pokemon Go</i>
          <h1>{t.t('header')}</h1>
        </div>
        <form action={process.env.PUBLIC_URL+"/result"} method="get">
          <div className="form-div">
            <label>{t.t('curlvl')}</label>
            <input 
              name="currentLevel" 
              type="number" 
              defaultValue={this.state.currentLevel+""}
              onChange={this.handleChange} />
          </div>
          <div className="form-div">
            <label>{t.t('curxp')}</label>
            <input 
              name="currentXPAmount" 
              type="number" 
              defaultValue={this.state.currentXPAmount+""}
              onChange={this.handleChange} />
          </div>
          <div className="form-div">
            <label>{Parser(t.t('xpe'))}</label>
            <input 
              name="currentEarningAmount" 
              type="number" 
              defaultValue={this.state.currentEarningAmount+""}
              onChange={this.handleChange} />
          </div>
          <div className="form-div button">
            <input type="submit" value={''+t.t('calculate')+''}/>
          </div>
        </form>

        <div className="language-option">
          <p>Language: </p>
          <select onChange={this.selectOnChange} value={localStorage.language}>
            <option value="de">Deutsch</option>
            <option value="en">English</option>
            <option value="es">Español</option>
            <option value="fr">français</option>
            <option value="zh">中文</option>
            <option value="ja">日本語</option>
          </select>
        </div>
        <div className="clear"></div>
      </div>
    );
  }
}
