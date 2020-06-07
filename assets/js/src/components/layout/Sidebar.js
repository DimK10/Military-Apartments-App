import React, { Fragment } from "react";
import PropTypes from "prop-types";
import BuildingAdminSidebar from "../buildingAdmin/sidebar/BuildingAdminSidebar";
import { withRouter } from "react-router";

const Sidebar = ({ location }) => {
  const showAppropriateSidebar = () => {
    let url = location.pathname;
    console.log(url);

    if (url.includes("/user/")) {
      // TODO - Show user sidebar
      return null;
    } else if (url.includes("/building-admin/")) {
      // Show building administrator sidebar
      return <BuildingAdminSidebar />;
    } else if (url.includes("/apartments-admin/")) {
      //    TODO - Show apartments admin sidebar
    } else if (url.includes("/admin/")) {
      //    TODO - Show admin sidebar
    }
  };

  return (
    <Fragment>
      <div
        className={`c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show`}
        id="sidebar"
      >
        <div className="c-sidebar-brand d-md-down-none">
          {/* Main category name */}
          <h4 className="c-sidebar-nav-title">
            Εφαρμογή Στρατιωτικών Οικημάτων
          </h4>
        </div>
        <ul className="c-sidebar-nav ps ps--active-y">
          <li className="c-sidebar-nav-title">Μενού Επιλογών</li>
          {showAppropriateSidebar()}
        </ul>
      </div>
    </Fragment>
  );
};

Sidebar.propTypes = {
  location: PropTypes.object.isRequired,
};

export default withRouter(Sidebar);
