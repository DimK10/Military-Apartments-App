import React, { useEffect } from "react";
import PropTypes from "prop-types";
import { withRouter } from "react-router";
import { connect } from "react-redux";

//  This component will be responsible to re-route the user
//  based on his role, to the appropriate dashboard
//  I created this component in order to show a loading svg or modal in the jsx,
//  and to redirect appropriately with useEffect and history object

const Rerouter = ({
  history,
  auth: { isAuthenticated, loading, user },
  setRerouterShowing,
}) => {
  useEffect(() => {
    setRerouterShowing(true);
    console.log(setRerouterShowing);

    if (isAuthenticated && user) {
      if (
        localStorage.getItem("lastRoute") !== null &&
        localStorage.getItem("lastRoute") !== "/"
      ) {
        // User refreshed the page - redirect to that page
        let url = localStorage.getItem("lastRoute");
        history.push(url);
        // setRerouterShowing(false);
      }

      if (user.roles.length > 1) {
        history.push("/select-dashboard");
      } else if (user.roles.includes("ROLE_USER")) {
        history.push("/user/dashboard");
      } else if (user.roles.includes("ROLE_APARTMENTS_ADMIN")) {
        history.push("/apartments-admin/dashboard");
      } else if (user.roles.includes("ROLE_BUILDING_ADMIN")) {
        history.push("/building-admin/dashboard");
      } else if (user.roles.includes("ROLE_ADMIN")) {
        history.push('/admin/apartmentsAdmin"');
      }
    } else {
      history.push("/login");
    }
    // setRerouterShowing(false);
  }, [user, isAuthenticated]);

  return <div>Some Nice Loading here!!!</div>;
};

Rerouter.propTypes = {
  history: PropTypes.object.isRequired,
  auth: PropTypes.object.isRequired,
};

const mapStateToProps = (state) => ({
  auth: state.authReducer,
});

export default withRouter(connect(mapStateToProps)(Rerouter));
