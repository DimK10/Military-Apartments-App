import React, { Fragment } from "react";
import { Redirect, Route, Switch } from "react-router-dom";
import { connect } from "react-redux";
import BuildingAdminRoute from "./BuildingAdminRoute";
import BuildingAdminDashboard from "../../buildingAdmin/dashboard/BuildingAdminDashboard";
import SharedRent from "../../buildingAdmin/dashboard/sharedRent/SharedRent";
import Receipts from "../../buildingAdmin/receipts/Receipts";

const BuildingAdminRoutes = ({ auth: { isAuthenticated, loading, user } }) => {
  return (
    <Switch>
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
        path={"/building-admin/dashboard"}
        component={BuildingAdminDashboard}
      />
    </Switch>
  );
};

BuildingAdminRoutes.propTypes = {};

const mapStateToProps = (state) => ({
  auth: state.authReducer,
});

export default connect(mapStateToProps)(BuildingAdminRoutes);
