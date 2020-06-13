import React from "react";
import PropTypes from "prop-types";
import { connect } from "react-redux";
import { withRouter } from "react-router";

const NotAuthorized = ({ history }) => {
  const redirectToMainPage = () => {
    localStorage.removeItem("lastRoute");
    history.push("/");
  };

  return (
    <div className="c-app flex-row align-items-center">
      <div className="container">
        <div className="row justify-content-center">
          <div className="col-md-6">
            <div className="clearfix">
              <h1 className="float-left display-3 mr-4">403</h1>
              <h4 className="pt-3">Απαγορεύεται</h4>
              <p className="text-muted">
                Δεν είστε εξουσιοδοτημένος να δείτε αυτή την σελίδα
              </p>
              <button className="btn btn-primary" onClick={redirectToMainPage}>
                Επιστροφή στην Αρχική Σελίδα
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
};

NotAuthorized.propTypes = {
  history: PropTypes.object.isRequired,
};

export default withRouter(NotAuthorized);
