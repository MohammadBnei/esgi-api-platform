import React from 'react';
import { Route } from 'react-router-dom';
import { List, Create, Update, Show } from '../components/drink/';

export default [
  <Route path="/drinks/create" component={Create} exact key="create" />,
  <Route path="/drinks/edit/:id" component={Update} exact key="update" />,
  <Route path="/drinks/show/:id" component={Show} exact key="show" />,
  <Route path="/drinks/" component={List} exact strict key="list" />,
  <Route path="/drinks/:page" component={List} exact strict key="page" />
];
