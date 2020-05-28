import React, { Fragment, useEffect } from 'react';
import ReactDOM from 'react-dom';
import { BrowserRouter as Router, Route, Switch } from 'react-router-dom';
import '@coreui/coreui';
import Login from './src/components/auth/Login';

import { Provider } from 'react-redux';
import store from './store';
import Routes from './src/components/routing/Routes';
import Sidebar from './src/components/layout/Sidebar';
import NavbarAndSidebar from './src/components/layout/NavbarAndSidebar';
// import { loadUser } from './actions/auth';

const App = () => {
  return (
    <Provider store={store}>
      <Router>
        <Fragment>
          <NavbarAndSidebar />
          <Sidebar />
          <Switch>
            <Route exact path='/login' component={Login} />
            <Route component={Routes} />
          </Switch>
        </Fragment>
      </Router>
    </Provider>
  );
};

ReactDOM.render(<App />, document.getElementById('root'));
