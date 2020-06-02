import React, { Fragment } from "react";
import PropTypes from "prop-types";

const Sidebar = (props) => {
  return (
    <Fragment>
      <div className={`c-sidebar c-sidebar-dark c-sidebar-fixed `} id="sidebar">
        <div className="c-sidebar-brand d-md-down-none">
          {/* Main category name */}
          <h4 className="c-sidebar-nav-title">
            Εφαρμογή Στρατιωτικών Οικημάτων
          </h4>
        </div>
        <ul className="c-sidebar-nav ps ps--active-y">
          <li className="c-sidebar-nav-title">Μενού Επιλογών</li>
        </ul>
      </div>
    </Fragment>
  );
};

Sidebar.propTypes = {};

export default Sidebar;
