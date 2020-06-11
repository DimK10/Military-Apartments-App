import React, { Fragment } from "react";
import { Redirect, Route, Switch } from "react-router-dom";
import { connect } from "react-redux";
import ApartmentsAdminRoute from "./ApartmentsAdminRoute";
import UserDashboard from "../user/dashboard/UserDashboard";
import ApartmentsAdminDashboard from "../apartmentsAdmin/dashboard/ApartmentsAdminDashboard";
import UserRoute from "./UserRoute";
import Sidebar from "../layout/Sidebar";
import Navbar from "../layout/Navbar";
import BuildingAdminRoute from "./BuildingAdminRoute";
import Receipts from "../buildingAdmin/receipts/Receipts";
import SharedRent from "../buildingAdmin/sharedRent/SharedRent";
import BuildingAdminDashboard from "../buildingAdmin/dashboard/BuildingAdminDashboard";
import Protocols from "../buildingAdmin/protocols/Protocols";
import BuildingAdminTenants from "../buildingAdmin/tenants/BuildingAdminTenants";
import Apartments from "../buildingAdmin/apartments/Apartments";
import ApartmentsAdminScoring from "../apartmentsAdmin/scoring/ApartmentsAdminScoring";

const Routes = ({ auth: { isAuthenticated, loading, user } }) => {
  const choosePath = () => {
    if (isAuthenticated && user) {
      console.log(localStorage.getItem("lastRoute"));
      console.log(localStorage.getItem("lastRoute") === "/");
      if (
        localStorage.getItem("lastRoute") !== null &&
        localStorage.getItem("lastRoute") !== "/"
      ) {
        // User refreshed the page - redirect to that page
        let url = localStorage.getItem("lastRoute");
        return <Redirect to={url} />;
      }

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
              path="/apartments-admin/scoring"
              component={ApartmentsAdminScoring}
            />

            <ApartmentsAdminRoute
              exact
              path="/apartments-admin/dashboard"
              component={ApartmentsAdminDashboard}
            />

            <BuildingAdminRoute
              exact
              path={"/building-admin/receipts"}
              component={Receipts}
            />
            <BuildingAdminRoute
              exact
              path={"/building-admin/shared-rent"}
              component={SharedRent}
            />
            <BuildingAdminRoute
              exact
              path={"/building-admin/protocols"}
              component={Protocols}
            />
            <BuildingAdminRoute
              exact
              path={"/building-admin/tenants"}
              component={BuildingAdminTenants}
            />
            <BuildingAdminRoute
              exact
              path={"/building-admin/apartments"}
              component={Apartments}
            />
            <BuildingAdminRoute
              exact
              path={"/building-admin/dashboard"}
              component={BuildingAdminDashboard}
            />

            <Route exact path="/" render={choosePath} />
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
