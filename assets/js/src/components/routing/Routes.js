import React, { Fragment } from "react";
import { Redirect, Route, Switch } from "react-router-dom";
import { connect } from "react-redux";
import Login from "../auth/Login";
import Logout from "../auth/Logout";
import SelectDashboard from "../auth/SelectDashboard";
import AuthenticatedRoute from "./AuthenticatedRoute";
import ApartmentsAdminRoute from "./ApartmentsAdminRoute";
import UserDashboard from "../user/dashboard/UserDashboard";
import ApartmentsAdminDashboard from "../apartmentsAdmin/dashboard/ApartmentsAdminDashboard";
import UserRoute from "./UserRoute";
import Sidebar from "../layout/Sidebar";
import Navbar from "../layout/Navbar";
import BuildingAdminRoute from "./BuildingAdminRoute";
import BuildingAdminDashboard from "../buildingAdmin/dashboard/BuildingAdminDashboard";

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
      } else if (user.roles.includes("ROLE_USER")) {
        return <Redirect to="/user/dashboard" />;
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
    <div className="c-app">
      <Sidebar />
      <div className="c-wrapper">
        <Navbar />
        <Switch>
          <Route exact path="/" render={choosePath} />

          <UserRoute exact path="/user/dashboard" component={UserDashboard} />
          <ApartmentsAdminRoute
            exact
            path="/apartments-admin/dashboard"
            component={ApartmentsAdminDashboard}
          />
          <BuildingAdminRoute
            exact
            path={"/building-admin/dashboard"}
            component={BuildingAdminDashboard}
          />
        </Switch>
      </div>
    </div>
  );
};

Routes.propTypes = {};

const mapStateToProps = (state) => ({
  auth: state.authReducer,
});

export default connect(mapStateToProps)(Routes);
