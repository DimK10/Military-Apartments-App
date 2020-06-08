import React, { Fragment } from "react";
import { Redirect, Route, Switch } from "react-router-dom";
import { connect } from "react-redux";
import ApartmentsAdminRoute from "./ApartmentsAdminRoute";
import UserDashboard from "../user/dashboard/UserDashboard";
import ApartmentsAdminDashboard from "../apartmentsAdmin/dashboard/ApartmentsAdminDashboard";
import UserRoute from "./UserRoute";
import Sidebar from "../layout/Sidebar";
import Navbar from "../layout/Navbar";
// import BuildingAdminRoute from "./buildingAdmin/BuildingAdminRoute";
// import BuildingAdminDashboard from "../buildingAdmin/dashboard/BuildingAdminDashboard";
// import SharedRent from "../buildingAdmin/dashboard/sharedRent/SharedRent";
// import Receipts from "../buildingAdmin/receipts/Receipts";
import BuildingAdminRoutes from "./buildingAdmin/BuildingAdminRoutes";

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
        <div className="c-body">
          <Switch>
            <UserRoute exact path="/user/dashboard" component={UserDashboard} />
            <ApartmentsAdminRoute
              exact
              path="/apartments-admin/dashboard"
              component={ApartmentsAdminDashboard}
            />
            <Route exact path="/" render={choosePath} />

            <Route component={BuildingAdminRoutes} />
          </Switch>
        </div>
      </div>
    </div>
  );
};

Routes.propTypes = {};

const mapStateToProps = (state) => ({
  auth: state.authReducer,
});

export default connect(mapStateToProps)(Routes);
