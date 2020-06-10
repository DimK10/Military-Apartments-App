import React, { Fragment } from "react";
import PropTypes from "prop-types";
import { NavLink } from "react-router-dom";

const ApartmentsAdminScoring = (props) => {
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

ApartmentsAdminScoring.propTypes = {};

export default ApartmentsAdminScoring;
