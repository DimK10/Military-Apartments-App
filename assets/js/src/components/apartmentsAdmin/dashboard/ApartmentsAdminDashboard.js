import React, { Fragment } from "react";
import PropTypes from "prop-types";
import { NavLink } from "react-router-dom";
import { logout } from "../../../actions/auth";
import { connect } from "react-redux";
import NavbarAndSidebar from "../../layout/NavbarAndSidebar";

const ApartmentsAdminDashboard = ({ logout }) => {
  return (
    <Fragment>
      <NavbarAndSidebar />
      Apartments Admin Dashboard page
      <button className="btn btn-primary" onClick={logout}>
        Log Out
      </button>
    </Fragment>
  );
};

ApartmentsAdminDashboard.propTypes = {};

export default connect(null, { logout })(ApartmentsAdminDashboard);
