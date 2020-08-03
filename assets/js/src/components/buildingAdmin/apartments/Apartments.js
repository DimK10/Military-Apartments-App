import React from "react";
import PropTypes from "prop-types";
import { NavLink } from "react-router-dom";
import { v4 as uuidv4 } from "uuid";

const Apartments = (props) => {
  return (
    <div className="c-main">
      <div className="container">
        <div className="page-header text-center">
          <h1>Διαμερίσματα ΣΟΑ:</h1>
        </div>
        <hr />
        <div className="row">
          <div className="col-md-12">
            <div className="card">
              <div className="card-header d-flex">
                <h3 className="mr-auto">Επιλέξτε από την λίστα παρακάτω:</h3>
                <NavLink
                  to={`/building-admin/apartments/new`}
                  className="btn btn-primary pull-right"
                >
                  Εισαγωγή Νέου Διαμερίσματος{" "}
                  <span className="fa fa-plus-circle"></span>
                </NavLink>
              </div>
            </div>
            <div className="card-body table-responsive">
              <table className="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>
                      Α<span>/</span>A
                    </th>
                    <th>Τύπος Στρ. Οικήματος</th>
                    <th className="hidden-md">Περιοχή</th>
                    <th>Διέυθυνση</th>
                    <th>Ένοικος</th>
                    <th>Όνομα Διαμερίσματος</th>
                    <th>Όροφος</th>
                  </tr>
                </thead>
                <tbody>Δεδομένα εδώ</tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
};

Apartments.propTypes = {};

export default Apartments;
