import React, { Fragment, useEffect } from "react";
import ReactDOM from "react-dom";
import { IndexR } from "react-router";
import { BrowserRouter as Router, Route, Switch } from "react-router-dom";
import "@coreui/coreui";
import Login from "./src/components/auth/Login";

import { connect, Provider } from "react-redux";
import store from "./store";
import Routes from "./src/components/routing/Routes";
import Sidebar from "./src/components/layout/Sidebar";
import NavbarAndSidebar from "./src/components/layout/NavbarAndSidebar";
import { login } from "./src/actions/auth";
import { choosePath } from "./src/helpers/routingHelpers";

const App = ({ login }) => {
  return (
    <Provider store={store}>
      <Router>
        <Fragment>
          <Switch>
            <Route component={Routes} />
          </Switch>
        </Fragment>
      </Router>
    </Provider>
  );
};

export default App;
