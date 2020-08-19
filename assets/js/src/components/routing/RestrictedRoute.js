import React from "react";
import PropTypes from "prop-types";
import { connect } from "react-redux";
import { Redirect, Route } from "react-router-dom";
import NotAuthorized from "../layout/NotAuthorized";

const RestrictedRoute = ({
  component: Component,
  auth: { isAuthenticated, loading, user },
  role,
  ...rest
}) => (
  <Route
    {...rest}
    render={(props) => {
      {
        // console.log(role);
        // console.log(user.roles);
        // console.log(user.roles.includes(role));
      }
      if (!isAuthenticated && !loading && !user.email)
        return <Redirect to="/login" />;

      if (isAuthenticated && !user.roles.includes(role))
        return <Redirect to="/not-authorized" />;

      if (isAuthenticated && user.roles.includes(role))
        return <Component {...props} />;
    }}
  />
);

RestrictedRoute.propTypes = {
  auth: PropTypes.object.isRequired,
  role: PropTypes.string.isRequired,
};

const mapStateToProps = (state) => ({
  auth: state.authReducer,
});

export default connect(mapStateToProps)(RestrictedRoute);
