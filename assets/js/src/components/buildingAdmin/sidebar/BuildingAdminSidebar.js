import React, { Fragment } from "react";
import PropTypes from "prop-types";
import { NavLink } from "react-router-dom";

const BuildingAdminSidebar = (props) => {
  return (
    <Fragment>
      <li className="c-sidebar-nav-item">
        <NavLink
          to={"/building-admin/shared-rent"}
          className="c-sidebar-nav-link text-wrap"
        >
          <i className="fa fa-calculator fa-2x" aria-hidden="true"></i>
          <span className="ml-2">Υπολογισμός Μηνιαίων Κοινοχρήστων</span>
        </NavLink>
      </li>
      {/*<li className="c-sidebar-nav-item">*/}
      {/*  <NavLink*/}
      {/*    to={"/building-admin/receipts"}*/}
      {/*    className="c-sidebar-nav-link text-wrap"*/}
      {/*  >*/}
      {/*    <i className="fas fa-ticket-alt fa-2x" aria-hidden="true"></i>*/}
      {/*    <span className="ml-2">Εκτύπωση Αποδείξεων</span>*/}
      {/*  </NavLink>*/}
      {/*</li>*/}
      <li className="c-sidebar-nav-item">
        <NavLink
          to="/building-admin/protocols"
          className="c-sidebar-nav-link text-wrap"
        >
          <i className="fas fa-file-alt fa-2x"></i>
          <span className="ml-2">
            Εκτύπωση Πρωτοκόλλου Παράδοσης Παραλαβής Δχστη ΣΟΑ
          </span>
        </NavLink>
      </li>
      {/*<li className="c-sidebar-nav-item">*/}
      {/*  <NavLink*/}
      {/*    to="/building-admin/tenants"*/}
      {/*    className="c-sidebar-nav-link text-wrap"*/}
      {/*  >*/}
      {/*    <i className="fas fa-address-book fa-2x"></i>*/}
      {/*    <span className="ml-2">Αναλυτική Κατάσταση Στελεχών</span>*/}
      {/*  </NavLink>*/}
      {/*</li>*/}
      <li className="c-sidebar-nav-item">
        <NavLink
          to="/building-admin/apartments"
          className="c-sidebar-nav-link text-wrap"
        >
          <i className="fas fa-building fa-2x"></i>
          <span className="ml-2">Διαμερίσματατα</span>
        </NavLink>
      </li>
      <li className="c-sidebar-nav-item">
        <NavLink
          to="/building-admin/tenants"
          className="c-sidebar-nav-link text-wrap"
        >
          <i className="fas fa-user-friends fa-2x"></i>
          <span className="ml-2">Ένοικοι</span>
        </NavLink>
      </li>
    </Fragment>
  );
};

BuildingAdminSidebar.propTypes = {};

export default BuildingAdminSidebar;
