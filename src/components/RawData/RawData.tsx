import React, { Component } from 'react';
import './RawData.scss';
import t from '../../i18n/i18n';
import { Link } from 'react-router-dom';

import {commafy} from '../../common/commafy';
import levels from '../../assets/levels.json'

export interface RawDataProps {};
export interface RawDataState {};

export default class RawData extends Component <RawDataProps, RawDataState> {
  constructor(props: RawDataProps) {
    super(props);
  }

  printLevel = (level: number) => {
    return (
      <tr>
        <td>{levels[level].level}</td>
        <td>{levels[level].xpReq} </td>
        <td>{levels[level].totalXpReq} </td>
        <td>{levels[level].unlockedItems}</td>
        <td>{levels[level].rewards} </td>
      </tr>
    )
  }

  render() {

    const listItems = levels.map((d) => 
      <tr key={d.level}>
        <td>{d.level}</td>
        <td>{commafy(d.xpReq)} </td>
        <td>{commafy(d.totalXpReq)} </td>
        <td>{t.t(''+d.unlockedItems+'')}</td>
        <td>{t.t(''+d.rewards+'')} </td>
      </tr>
    );

    return (
      <div className="raw-data">
        <div>
          <h1>{t.t('rawdata.header')}</h1>
          <Link className="raw-data-button" to="/">{t.t('general.back')}</Link>
        </div>

        <table className="rawdata-table">
          <tbody>
            <tr>
              <th>{t.t('rawdata.level')}</th>
              <th>{t.t('rawdata.xpRequired')}</th>
              <th>{t.t('rawdata.totalXPRequired')}</th>
              <th>{t.t('rawdata.unlockedItems')}</th>
              <th>{t.t('general.rewards')}</th>
            </tr>
            {listItems}
          </tbody>
        </table>

      </div>
    );
  }
}
