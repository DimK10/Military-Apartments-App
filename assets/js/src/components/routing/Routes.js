import React from 'react';
import { Route, Switch } from 'react-router-dom';
import Dashboard from '../dashboard/Dashboard';

const Routes = () => {
  return (
    <Switch>
      <Route exact path='/' component={Dashboard} />
    </Switch>
  );
};

Routes.propTypes = {};

export default Routes;
