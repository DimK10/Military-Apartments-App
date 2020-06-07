import React, { Fragment } from "react";
import PropTypes from "prop-types";

const BuildingAdminSidebar = (props) => {
  return (
    <Fragment>
      <li className="c-sidebar-nav-item">
        <a href="#!" className="c-sidebar-nav-link text-wrap">
          <i className="fa fa-calculator fa-2x" aria-hidden="true"></i>
          <span className="ml-2">Υπολογισμός Μηνιαίων Κοινοχρήστων</span>
        </a>
      </li>
      <li className="c-sidebar-nav-item">
        <a href="#!" className="c-sidebar-nav-link text-wrap">
          <i className="fas fa-ticket-alt fa-2x" aria-hidden="true"></i>
          <span className="ml-2">Εκτύπωση Αποδείξεων</span>
        </a>
      </li>
      <li className="c-sidebar-nav-item">
        <a href="#!" className="c-sidebar-nav-link text-wrap">
          <i className="fas fa-file-alt fa-2x"></i>
          <span className="ml-2">
            Εκτύπωση Πρωτοκόλλου Παράδοσης Παραλαβής Δχστη ΣΟΑ
          </span>
        </a>
      </li>
      <li className="c-sidebar-nav-item">
        <a href="#!" className="c-sidebar-nav-link text-wrap">
          <i className="fas fa-address-book fa-2x"></i>
          <span className="ml-2">Αναλυτική Κατάσταση Στελεχών</span>
        </a>
      </li>
      <li className="c-sidebar-nav-item">
        <a href="#!" className="c-sidebar-nav-link text-wrap">
          <i className="fas fa-building fa-2x"></i>
          <span className="ml-2">Διαμερίσματα</span>
        </a>
      </li>
    </Fragment>
  );
};

BuildingAdminSidebar.propTypes = {};

export default BuildingAdminSidebar;
