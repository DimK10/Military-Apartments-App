import React, { Fragment, useEffect } from "react";
import { BrowserRouter as Router, Route, Switch } from "react-router-dom";
import "@coreui/coreui";
import { Provider } from "react-redux";
import store from "./store";
import Routes from "./src/components/routing/Routes";
import { loadUser } from "./src/actions/auth";
import setAuthToken from "./src/utils/setAuthToken";
import Navbar from "./src/components/layout/Navbar";
import Sidebar from "./src/components/layout/Sidebar";
import Login from "./src/components/auth/Login";
import AuthenticatedRoute from "./src/components/routing/AuthenticatedRoute";
import SelectDashboard from "./src/components/auth/SelectDashboard";
import NotAuthorized from "./src/components/layout/NotAuthorized";

if (localStorage.getItem("jwt")) {
  const token = JSON.parse(localStorage.getItem("jwt")).token;

  setAuthToken(token);
}

const App = () => {
  useEffect(() => {
    store.dispatch(loadUser());
  }, []);
  return (
    <Provider store={store}>
      <Router>
        <Fragment>
          <Switch>
            <Route exact path="/login" component={Login} />
            <Route exact path="/not-authorized" component={NotAuthorized} />
            <AuthenticatedRoute
              exact
              path="/select-dashboard"
              component={SelectDashboard}
            />
            <Route component={Routes} />
          </Switch>
        </Fragment>
      </Router>
    </Provider>
  );
};

export default App;
