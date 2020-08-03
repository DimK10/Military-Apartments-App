import React, { Fragment } from "react";
import { Redirect, Route, Switch } from "react-router-dom";
import { connect } from "react-redux";
import UserDashboard from "../user/dashboard/UserDashboard";
import ApartmentsAdminDashboard from "../apartmentsAdmin/dashboard/ApartmentsAdminDashboard";
import UserRoute from "./UserRoute";
import Sidebar from "../layout/Sidebar";
import Navbar from "../layout/Navbar";
import Receipts from "../buildingAdmin/receipts/Receipts";
import SharedRent from "../buildingAdmin/sharedRent/SharedRent";
import BuildingAdminDashboard from "../buildingAdmin/dashboard/BuildingAdminDashboard";
import Protocols from "../buildingAdmin/protocols/Protocols";
import BuildingAdminTenants from "../buildingAdmin/tenants/BuildingAdminTenants";
import Apartments from "../buildingAdmin/apartments/Apartments";
import ApartmentsAdminScoring from "../apartmentsAdmin/scoring/ApartmentsAdminScoring";
import RestrictedRoute from "./RestrictedRoute";
import Rerouter from "./Rerouter";
import ScoringNewEntry from "../apartmentsAdmin/scoring/ScoringNewEntry";
import UserAlert from "../layout/UserAlert";
import NewApartment from "../buildingAdmin/apartments/new/NewApartment";

const Routes = () => {
  // FIXME - Maybe create a component for / and redirect with history.push? That way a loading modal can be shown
  // const choosePath = () => {
  //   if (isAuthenticated && user) {
  //     if (
  //       localStorage.getItem("lastRoute") !== null &&
  //       localStorage.getItem("lastRoute") !== "/"
  //     ) {
  //       // User refreshed the page - redirect to that page
  //       let url = localStorage.getItem("lastRoute");
  //       return <Redirect to={url} />;
  //     }
  //
  //     if (user.roles.length > 1) {
  //       return <Redirect to="/select-dashboard" />;
  //     } else if (user.roles.includes("ROLE_USER")) {
  //       return <Redirect to="/user/dashboard" />;
  //     } else if (user.roles.includes("ROLE_APARTMENTS_ADMIN")) {
  //       return <Redirect to={"/apartments-admin/dashboard"} />;
  //     } else if (user.roles.includes("ROLE_BUILDING_ADMIN")) {
  //       return <Redirect to={"/building-admin/dashboard"} />;
  //     } else if (user.roles.includes("ROLE_ADMIN")) {
  //       return <Redirect to={"/admin/apartmentsAdmin"} />;
  //     }
  //   } else {
  //     return <Redirect to="/login" />;
  //   }
  // };

  return (
    <div className="c-app">
      <Sidebar />
      <div className="c-wrapper">
        <Navbar />
        <div className="c-body">
          <div className="container">
            <UserAlert />
          </div>
          <Switch>
            <UserRoute exact path="/user/dashboard" component={UserDashboard} />

            <RestrictedRoute
              exact
              path="/apartments-admin/scoring"
              component={ApartmentsAdminScoring}
              role="ROLE_APARTMENTS_ADMIN"
            />
            <RestrictedRoute
              exact
              path="/apartments-admin/scoring/:location/new"
              component={ScoringNewEntry}
              role="ROLE_APARTMENTS_ADMIN"
            />

            <RestrictedRoute
              exact
              path="/apartments-admin/dashboard"
              component={ApartmentsAdminDashboard}
              role="ROLE_APARTMENTS_ADMIN"
            />

            <RestrictedRoute
              exact
              path={"/building-admin/receipts"}
              component={Receipts}
              role="ROLE_BUILDING_ADMIN"
            />
            <RestrictedRoute
              exact
              path={"/building-admin/shared-rent"}
              component={SharedRent}
              role="ROLE_BUILDING_ADMIN"
            />
            <RestrictedRoute
              exact
              path={"/building-admin/protocols"}
              component={Protocols}
              role="ROLE_BUILDING_ADMIN"
            />
            <RestrictedRoute
              exact
              path={"/building-admin/tenants"}
              component={BuildingAdminTenants}
              role="ROLE_BUILDING_ADMIN"
            />
            <RestrictedRoute
              exact
              path={"/building-admin/apartments"}
              component={Apartments}
              role="ROLE_BUILDING_ADMIN"
            />
            <RestrictedRoute
              exact
              path={"/building-admin/apartments/new"}
              component={NewApartment}
              role="ROLE_BUILDING_ADMIN"
            />
            <RestrictedRoute
              exact
              path={"/building-admin/dashboard"}
              component={BuildingAdminDashboard}
              role="ROLE_BUILDING_ADMIN"
            />

            <Route exact path="/" component={Rerouter} />
          </Switch>
        </div>
      </div>
    </div>
  );
};

Routes.propTypes = {};

export default Routes;
