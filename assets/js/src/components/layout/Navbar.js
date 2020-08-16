import React, { Fragment } from "react";
import PropTypes from "prop-types";
import { connect } from "react-redux";
import { logout } from "../../actions/auth";

const Navbar = ({
  auth: {
    user: { loading, personInArmy: usr },
  },
  logout,
}) => {
  return (
    !loading && (
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
          <ul className="c-header-nav d-md-down-none"></ul>
          <ul className="c-header-nav mfs-auto"></ul>
          <ul className="c-header-nav">
            <li className="c-header-nav-item px-3 c-d-legacy-none">
              {/*<button*/}
              {/*  className="c-class-toggler c-header-nav-btn"*/}
              {/*  type="button"*/}
              {/*  id="header-tooltip"*/}
              {/*  data-target="body"*/}
              {/*  data-class="c-dark-theme"*/}
              {/*  data-toggle="c-tooltip"*/}
              {/*  data-placement="bottom"*/}
              {/*  title=""*/}
              {/*  data-original-title="Toggle Light/Dark Mode"*/}
              {/*>*/}
              {/*  <i className="c-icon c-d-dark-none"></i>*/}
              {/*  <i className="c-icon c-d-default-none"></i>*/}
              {/*</button>*/}
            </li>
            <li className="c-header-nav-item dropdown">
              <a
                className="c-header-nav-link"
                data-toggle="dropdown"
                href="#"
                role="button"
                aria-haspopup="true"
                aria-expanded="true"
              >
                <div className="c-avatar">
                  <img
                    className="c-avatar-img"
                    src="https://www.gravatar.com/avatar/205e460b479e2e5b48aec07710c08d50"
                    alt="user@email.com"
                  ></img>
                </div>
              </a>

              <div className="dropdown-menu dropdown-menu-right pt-0">
                <div className="dropdown-header bg-light py-2">
                  <strong>
                    {usr
                      ? usr.rank.rankInGreek +
                        " " +
                        usr.specialty +
                        " " +
                        usr.surname +
                        " " +
                        usr.firstname
                      : "χρήστης"}
                  </strong>
                </div>
                <a className="dropdown-item text-center" href="#">
                  <span className="text-center" style={{ width: "inherit" }}>
                    Ρυθμίσεις Λογαριασμού
                  </span>
                </a>
                <a className="dropdown-item" href="" onClick={logout}>
                  <span className="text-center" style={{ width: "inherit" }}>
                    Αποσύνδεση
                  </span>
                </a>
              </div>
            </li>
          </ul>
        </header>
      </Fragment>
    )
  );
};

Navbar.propTypes = {
  auth: PropTypes.object.isRequired,
  logout: PropTypes.func.isRequired,
};

const mapStateToProps = (state) => ({
  auth: state.authReducer,
});

export default connect(mapStateToProps, { logout })(Navbar);
