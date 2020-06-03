import React, { Fragment } from "react";
import PropTypes from "prop-types";

const Navbar = (props) => {
  return (
    <Fragment>
      <header className="c-header c-header-light c-header-fixed">
        <button
          className="c-header-toggler c-class-toggler d-lg-none mfe-auto"
          type="button"
          data-target="#sidebar"
          data-class="c-sidebar-show"
        >
          <i className="cil-menu"></i>
        </button>
        <a
          className="c-header-brand d-lg-none c-header-brand-sm-up-center"
          href="#"
        >
          <svg width="118" height="46" alt="CoreUI Logo"></svg>
        </a>
        <button
          className="c-header-toggler c-class-toggler mfs-3 d-md-down-none"
          type="button"
          data-target="#sidebar"
          data-class="c-sidebar-lg-show"
          responsive="true"
        >
          <i className="cil-menu"></i>
        </button>
      </header>
    </Fragment>
  );
};

Navbar.propTypes = {};

export default Navbar;
