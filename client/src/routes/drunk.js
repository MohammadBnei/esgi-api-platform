import React from 'react';
import { Route } from 'react-router-dom';
import { List, Create, Update, Show } from '../components/drunk/';

export default [
  <Route path="/drunks/create" component={Create} exact key="create" />,
  <Route path="/drunks/edit/:id" component={Update} exact key="update" />,
  <Route path="/drunks/show/:id" component={Show} exact key="show" />,
  <Route path="/drunks/" component={List} exact strict key="list" />,
  <Route path="/drunks/:page" component={List} exact strict key="page" />
];
