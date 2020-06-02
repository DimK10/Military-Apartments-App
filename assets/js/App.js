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
          <Sidebar />
          <div className="c-wrapper">
            <Navbar />
            <Switch>
              <Route component={Routes} />
            </Switch>
          </div>
        </Fragment>
      </Router>
    </Provider>
  );
};

export default App;
