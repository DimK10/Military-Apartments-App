import React, { Fragment } from "react";
import { withRouter } from "react-router";
import PropTypes from "prop-types";
import { connect } from "react-redux";
import BuildingAdminSidebar from "../buildingAdmin/sidebar/BuildingAdminSidebar";
import ApartmentsAdminSidebar from "../apartmentsAdmin/sidebar/ApartmentsAdminSidebar";

const Sidebar = ({ location, rerouterShowing }) => {
  const showAppropriateSidebar = () => {
    let url = location.pathname;
    // console.log(url);

    // store url to localStorage
    if (url !== "/login" && url !== "/") localStorage.setItem("lastRoute", url);

    if (url.includes("/user/")) {
      // TODO - Show user sidebar
      return null;
    } else if (url.includes("/building-admin/")) {
      // Show building administrator sidebar
      return <BuildingAdminSidebar />;
    } else if (url.includes("/apartments-admin/")) {
      return <ApartmentsAdminSidebar />;
    } else if (url.includes("/admin/")) {
      //    TODO - Show admin sidebar
    }
  };

  return (
    <Fragment>
      {!rerouterShowing && (
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
      )}
    </Fragment>
  );
};

Sidebar.propTypes = {
  location: PropTypes.object.isRequired,
};

const mapStateToProps = (state) => ({
  loading: state.authReducer.loading,
});

export default withRouter(connect(mapStateToProps)(Sidebar));
