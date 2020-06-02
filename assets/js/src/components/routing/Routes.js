import React from "react";
import { Redirect, Route, Switch } from "react-router-dom";
import ApartmentsAdminDashboard from "../apartmentsAdmin/dashboard/ApartmentsAdminDashboard";
// import ApartmentsAdminRoute from './ApartmentsAdminRoute';
import { connect } from "react-redux";
import Login from "../auth/Login";
import Logout from "../auth/Logout";
import SelectDashboard from "../auth/SelectDashboard";
import AuthenticatedRoute from "./AuthenticatedRoute";
// import {choosePath} from "../../helpers/routingHelpers";

const Routes = ({ auth: { isAuthenticated, loading, user } }) => {
  const choosePath = () => {
    if (isAuthenticated && user) {
      // User is authenticated -- check where he/she is authorized to go
      // if (user.roles.includes('ROLE_APARTMENTS_ADMIN')) {
      //     return <Redirect to={"/apartments-admin/dashboard"} />
      // } else if (user.roles.includes('ROLE_BUILDING_ADMIN')) {
      //     return <Redirect to={"/building-admin/dashboard"} />
      // } else if (user.roles.includes('ROLE_ADMIN')) {
      //     return <Redirect to={"/admin/apartmentsAdmin"} />
      // }
      if (user.roles.length > 1) {
        return <Redirect to="/select-dashboard" />;
      } else if (user.roles.includes("ROLE_APARTMENTS_ADMIN")) {
        return <Redirect to={"/apartments-admin/dashboard"} />;
      } else if (user.roles.includes("ROLE_BUILDING_ADMIN")) {
        return <Redirect to={"/building-admin/dashboard"} />;
      } else if (user.roles.includes("ROLE_ADMIN")) {
        return <Redirect to={"/admin/apartmentsAdmin"} />;
      }
    } else {
      return <Redirect to="/login" />;
    }
  };

  return (
    <Switch>
      <Route exact path="/" render={choosePath} />
      <Route exact path="/login" component={Login} />
      <Route exact path="/api/logout" component={Logout} />
      <AuthenticatedRoute
        exact
        path="/select-dashboard"
        component={SelectDashboard}
      />
      <AuthenticatedRoute
        exact
        path="/apartments-admin/dashboard"
        component={ApartmentsAdminDashboard}
      />
    </Switch>
  );
};

Routes.propTypes = {};

const mapStateToProps = (state) => ({
  auth: state.authReducer,
});

export default connect(mapStateToProps)(Routes);
