import React, { Fragment } from "react";
import PropTypes from "prop-types";
import { connect } from "react-redux";
import { Redirect, Route, Switch } from "react-router-dom";
import NavbarAndSidebar from "../layout/NavbarAndSidebar";

const ApartmentsAdminRoute = ({
  component: Component,
  auth: { isAuthenticated, loading, user },
  ...rest
}) => (
  <Route
    {...rest}
    render={(props) =>
      (!isAuthenticated && !loading && !user.email) ||
      (!user.email && !user.roles.includes("ROLE_APARTMENTS_ADMIN")) ? (
        <Redirect to="/login" />
      ) : (
        <Component {...props} />
      )
    }
  />
);

ApartmentsAdminRoute.propTypes = {
  auth: PropTypes.object.isRequired,
};

const mapStateToProps = (state) => ({
  auth: state.authReducer,
});

export default connect(mapStateToProps)(ApartmentsAdminRoute);
