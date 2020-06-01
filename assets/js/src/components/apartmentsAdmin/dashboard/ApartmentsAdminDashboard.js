import React, { Fragment } from 'react';
import PropTypes from 'prop-types';
import { NavLink } from 'react-router-dom';
import { logout } from '../../../actions/auth';
import { connect } from 'react-redux';
import NavbarAndSidebar from '../../layout/NavbarAndSidebar';

const ApartmentsAdminDashboard = () => {
  return (
    <Fragment>
      <NavbarAndSidebar />
      Apartments Admin Dashboard page
      <NavLink className='btn btn-primary' to='/api/logout'>
        Log Out
      </NavLink>
    </Fragment>
  );
};

ApartmentsAdminDashboard.propTypes = {};

export default ApartmentsAdminDashboard;
