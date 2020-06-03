import React, { Fragment } from "react";
import PropTypes from "prop-types";
import { logout } from "../../../actions/auth";
import { connect } from "react-redux";

const UserDashboard = ({ logout }) => {
  return (
    <Fragment>
      <h2>User dashboard</h2>
      <button className="btn btn-primary" onClick={logout}>
        Αποσύνδεση
      </button>
    </Fragment>
  );
};

UserDashboard.propTypes = {
  logout: PropTypes.func.isRequired,
};

export default connect(null, { logout })(UserDashboard);
