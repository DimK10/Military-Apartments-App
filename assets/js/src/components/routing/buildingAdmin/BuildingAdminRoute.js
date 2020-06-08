import React from "react";
import PropTypes from "prop-types";
import { connect } from "react-redux";
import { Redirect, Route } from "react-router-dom";

const BuildingAdminRoute = ({
  component: Component,
  auth: { isAuthenticated, loading, user },
  ...rest
}) => (
  <Route
    {...rest}
    render={(props) =>
      (!isAuthenticated && !loading && !user.email) ||
      (!user.email && !user.roles.includes("ROLE_BUILDING_ADMIN")) ? (
        <Redirect to="/login" />
      ) : (
        <Component {...props} />
      )
    }
  />
);

BuildingAdminRoute.propTypes = {
  auth: PropTypes.object.isRequired,
};

const mapStateToProps = (state) => ({
  auth: state.authReducer,
});

export default connect(mapStateToProps)(BuildingAdminRoute);
