import React, { Fragment, useEffect } from 'react';
import ReactDOM from 'react-dom';
import { IndexR } from 'react-router';
import { BrowserRouter as Router, Route, Switch } from 'react-router-dom';
import '@coreui/coreui';
import Login from './src/components/auth/Login';

import {connect, Provider} from 'react-redux';
import {store, persistor} from './store';
import Routes from './src/components/routing/Routes';
import Sidebar from './src/components/layout/Sidebar';
import NavbarAndSidebar from './src/components/layout/NavbarAndSidebar';
import { login } from './src/actions/auth';
import {choosePath} from "./src/helpers/routingHelpers";

import { PersistGate } from 'redux-persist/integration/react'

const App = ({ login }) => {

  return (
    <Provider store={store}>
        <PersistGate loading={null} persistor={persistor}>
          <Router>
            <Fragment>
              <Switch>

                <Route component={Routes} />
              </Switch>
            </Fragment>
          </Router>
        </PersistGate>
    </Provider>
  );
};

export default App;
