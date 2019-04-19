import React, { Component } from 'react';
import './Result.scss';
import {commafy} from '../../common/commafy';
import t from '../../i18n/i18n';
import Parser from 'html-react-parser';
import { Link } from 'react-router-dom';

import levels from '../../assets/levels.json'

export interface ResultProps {
  location: any;
};
export interface ResultState {
  currentLevel: any;
  currentXPAmount: any;
  currentEarningAmount: any;
  rewardsOpen: number[];
};

export default class Result extends Component <ResultProps, ResultState> {
  constructor(props: any) {
    super(props);
    const query = new URLSearchParams(this.props.location.search);

    this.state = {
      currentLevel: query.get('currentLevel'),
      currentXPAmount: query.get('currentXPAmount'),
      currentEarningAmount: query.get('currentEarningAmount'),
      rewardsOpen: []
    }
  }

  getCurrentLevelObject = (level: number) => {
    let currentLevel = levels[0]

    for (let i = 0; i < levels.length; i++) {
      if (levels[i].level == this.state.currentLevel)
      currentLevel = levels[i]
      break
    }

    return currentLevel
  }

  convertMinutesToHoursAndMinutes = (minutes: number) => {
    return {
      hours: Math.floor(minutes/60),
      minutes: minutes%60
    }
  }

  formatTime = (time: any) => {
    const hours = time.hours > 0 ? commafy(time.hours)+" "+t.t('hour', {count: time.hours}) : ""
    const space = time.hours > 0 && time.minutes > 0 ? ", " : ""
    const minutes = time.minutes > 0 ? time.minutes+" "+t.t('minute',{count: time.minutes}) : ""
    return hours+space+minutes
  }

  createListItems = () => {
    let listItems = []
    let currentLevel = this.getCurrentLevelObject(this.state.currentLevel)

    for (let i = 0; i < levels.length; i++) {
      let children = []
      let forLevel = levels[i]

      if (this.state.currentLevel >= forLevel.level){
        continue;
      }

      let open = ""
      if (this.state.rewardsOpen.includes(forLevel.level)){
        open = "open"
      }

      let xpToGo = forLevel.totalXpReq - (currentLevel.totalXpReq+this.state.currentXPAmount)
      let timeToGetTo = Math.ceil(xpToGo / this.state.currentEarningAmount) * 5
      let time = this.convertMinutesToHoursAndMinutes(timeToGetTo)

      if (time.minutes <= 0 && time.hours <= 0){
        continue;
      }

      children.push(<div key={i+"a"} className="first">{forLevel.level}</div>)
      children.push(<div key={i+"b"} className="second">{this.formatTime(time).toLocaleString()}</div>)
      children.push(<div key={i+"c"} className="third">
                      <div className="redButton small" onClick={() => this.openRewards(forLevel.level)}>{t.t('rewards')}</div>
                    </div>)
      children.push(<div key={i+"d"} className={"rewards "+open}>{t.t(''+forLevel.rewards+'')}</div>)

      listItems.push(<li key={i}>{children}</li>)
    }

    return listItems
  }

  openRewards = (level:number) => {

    let index = this.state.rewardsOpen.indexOf(level)
    let newState = this.state.rewardsOpen
    if (index == -1){
      //add
      newState.push(level)
    }else{
      //remove
      newState.splice(index, 1);
    }

    this.setState({
      rewardsOpen: newState
    });
  }

  render() {

    const listItems = this.createListItems();

    return (
      <div className="result">
        <Link className="back" to="/">{t.t('back2')}</Link>
        <Link className="raw-data-button" to="/raw-data">{t.t('rawdata')}</Link>
        {/* <a className="back" href={process.env.PUBLIC_URL+"/"}>{t.t('back2')}</a> */}
        {/* <a className="raw-data-button" href={process.env.PUBLIC_URL+"/raw-data"}>{t.t('rawdata')}</a> */}
        <h3 className="intro-text">
          {Parser(t.t('main1', {
            currentLevel: this.state.currentLevel,
            currentXp: this.state.currentXPAmount, 
            xpEarned: this.state.currentEarningAmount,
          }))}
        </h3>

        <div className="results-ul-header">
          <div className="first">{t.t('lvl')}</div>
          <div className="second">{t.t('time_to_reach_level')}</div> 
        </div>
        <ul className="results-ul">
          {listItems}
        </ul>
        <div className="results-share-div">
          <div className="fb-share-button fb_iframe_widget" data-href="http://www.pokemongoxp.com" data-layout="button" data-size="large" data-mobile-iframe="true" fb-xfbml-state="rendered" fb-iframe-plugin-query="app_id=520425911493829&amp;container_width=43&amp;href=http%3A%2F%2Fwww.pokemongoxp.com%2F%3Flg%3Den&amp;layout=button&amp;locale=en_US&amp;mobile_iframe=true&amp;sdk=joey&amp;size=large"><span><iframe scrolling="no" allow="encrypted-media" title="fb:share_button Facebook Social Plugin" src="https://www.facebook.com/v2.7/plugins/share_button.php?app_id=520425911493829&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2Fd_vbiawPdxB.js%3Fversion%3D44%23cb%3Df139a5ec669445%26domain%3Dwww.pokemongoxp.com%26origin%3Dhttp%253A%252F%252Fwww.pokemongoxp.com%252Ff339c3f47835308%26relation%3Dparent.parent&amp;container_width=43&amp;href=http%3A%2F%2Fwww.pokemongoxp.com%2F%3Flg%3Den&amp;layout=button&amp;locale=en_US&amp;mobile_iframe=true&amp;sdk=joey&amp;size=large"></iframe></span></div>

          <a className="twitter-share-button" target="_blank" href={"https://twitter.com/intent/tweet?text="+t.t('twittermessage')+"&url="+"https://www.pokemongoxp.com"}>Tweet</a>
        </div>
        <div className="results-footer-div">
          <p>This website is not affiliated with Niantic or The Pokemon Company.</p>
          <p>Made by Trevor Wood - <a href="https://twitter.com/frogg616">Twitter</a> - <a href="https://github.com/trevorwood222">Github</a></p>
        </div>
      </div>
    );
  }
}
