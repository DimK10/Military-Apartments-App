import React, { Fragment, useEffect } from 'react';
import ReactDOM from 'react-dom';
import { BrowserRouter as Router, Route, Switch } from "react-router-dom";
import '@coreui/coreui';
import Login from './src/components/auth/Login';

import { Provider } from 'react-redux';
import store from './store';
// import { loadUser } from './actions/auth';


const App = () => {

  return (
      <Provider store={store}>
        <Router>
          <Fragment>
            <Switch>
              <Route exact path='/' component={Login}/>
            </Switch>
          </Fragment>
        </Router>
      </Provider>
  )
};

ReactDOM.render(<App />, document.getElementById('root'));
