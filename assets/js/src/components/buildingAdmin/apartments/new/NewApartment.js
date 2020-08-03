import React, { Fragment } from "react";
import PropTypes from "prop-types";

const NewApartment = (props) => {
  return (
    <Fragment>
      <div className="c-main">
        <div className="container">
          <div className="page-header text-center">
            <h1>Εισαγωγή Νέου Διαμερίσματος</h1>
          </div>
          <hr />

          <div className="row">
            <div className="col-md-12">
              <div className="card">
                <div className="card-header d-flex">
                  <h3 className="mr-auto">Συμπληρώστε τα παρακάτω πεδία:</h3>
                </div>
              </div>
            </div>
          </div>
          <div className="d-flex justify-content-center" role="group">
            <button type="button" className="btn btn-primary">
              Αποθήκευση
            </button>

            <button type="button" className="btn btn-secondary">
              Πίσω
            </button>
          </div>
        </div>
      </div>
    </Fragment>
  );
};

NewApartment.propTypes = {};

export default NewApartment;
