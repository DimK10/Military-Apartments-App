import React, { Fragment, useEffect } from "react";
import PropTypes from "prop-types";
import { connect } from "react-redux";
import { getScores } from "../../../actions/scoring";

const ApartmentsAdminScoring = ({ getScores }) => {
  useEffect(() => {
    getScores();
  }, [getScores]);

  return (
    <div className="c-main">
      <div className="container">
        <div className="page-header text-center">
          <h1>Μόρια Στελεχών</h1>
        </div>
        <hr />
        <h3 className="mt-3">
          Αναλυτικός πίνακας στελεχών που μοριοδοτούνται:{" "}
        </h3>
      </div>
    </div>
  );
};

ApartmentsAdminScoring.propTypes = {
  getScores: PropTypes.func.isRequired,
};

const mapStateToProps = (state) => ({
  scores: state.scoreReducer,
});

export default connect(mapStateToProps, { getScores })(ApartmentsAdminScoring);
