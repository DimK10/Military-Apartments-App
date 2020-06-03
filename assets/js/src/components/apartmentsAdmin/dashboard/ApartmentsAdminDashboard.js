import React, { Fragment } from "react";
import PropTypes from "prop-types";
import { logout } from "../../../actions/auth";
import { connect } from "react-redux";

const ApartmentsAdminDashboard = ({ logout }) => {
  return (
    <Fragment>
      Apartments Admin Dashboard page
      <button className="btn btn-primary" onClick={logout}>
        Αποσύνδεση
      </button>
    </Fragment>
  );
};

ApartmentsAdminDashboard.propTypes = {
  logout: PropTypes.func.isRequired,
};

export default connect(null, { logout })(ApartmentsAdminDashboard);
