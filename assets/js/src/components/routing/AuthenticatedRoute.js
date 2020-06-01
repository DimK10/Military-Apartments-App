import React, { Fragment } from 'react';
import PropTypes from 'prop-types';
import { connect } from 'react-redux';
import { Redirect, Route, Switch } from 'react-router-dom';
import NavbarAndSidebar from '../layout/NavbarAndSidebar';

const AuthenticatedRoute = ({
  component: Component,
  auth: { isAuthenticated, loading, user },
  ...rest
}) => (
  <Route
    {...rest}
    render={(props) =>
      !isAuthenticated && !loading && !user ? (
        <Redirect to='/login' />
      ) : (
        <Fragment>
          <Component {...props} />
        </Fragment>
      )
    }
  />
);

AuthenticatedRoute.propTypes = {
  auth: PropTypes.object.isRequired,
};

const mapStateToProps = (state) => ({
  auth: state.authReducer,
});

export default connect(mapStateToProps)(AuthenticatedRoute);
