import React, { Fragment } from "react";
import PropTypes from "prop-types";
import { NavLink } from "react-router-dom";

const ApartmentsAdminSidebar = (props) => {
  return (
    <Fragment>
      <li className="c-sidebar-nav-item">
        <NavLink
          to={"/apartments-admin/scoring"}
          className="c-sidebar-nav-link text-wrap"
        >
          <i className="fas fa-list-ol fa-2x"></i>
          <span className="ml-2">Μόρια Στελεχών</span>
        </NavLink>
      </li>
    </Fragment>
  );
};

ApartmentsAdminSidebar.propTypes = {};

export default ApartmentsAdminSidebar;
