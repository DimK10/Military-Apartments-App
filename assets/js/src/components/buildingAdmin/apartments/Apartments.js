import React, { useEffect, useState } from "react";
import PropTypes from "prop-types";
import { NavLink } from "react-router-dom";
import { v4 as uuidv4 } from "uuid";
import { connect } from "react-redux";
import { getAllApartmentsFromAMilitaryResidence } from "../../../actions/apartment";

const Apartments = ({
  getAllApartmentsFromAMilitaryResidence,
  auth: { user, loading },
  apartmentsObj: { apartments, loading: apartmentsLoading },
}) => {
  // TODO - Add loading animation

  useEffect(() => {
    getAllApartmentsFromAMilitaryResidence(
      user.personInArmy.tenant.apartment.militaryResidence.id
    );
  }, []);
  return (
    !loading && (
      <div className="c-main">
        <div className="container">
          <div className="page-header text-center">
            <h1>
              Διαμερίσματα{" "}
              {user.personInArmy.tenant.apartment.militaryResidence.type.title +
                ":"}
            </h1>
            <h3>
              Τοποθεσια:{" "}
              {user.personInArmy.tenant.apartment.militaryResidence.location}
            </h3>
            <h3>
              Διεύθυνση:{" "}
              {user.personInArmy.tenant.apartment.militaryResidence.address}
            </h3>
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
                      <th>Όνομα Διαμερίσματος</th>
                      <th>Ένοικος</th>
                      <th>Όροφος</th>
                    </tr>
                  </thead>
                  <tbody>
                    {apartments.map((apartment, index) => (
                      <tr key={uuidv4()}>
                        <td key={uuidv4()}>{index + 1}</td>
                        <td key={uuidv4()}>{apartment.name}</td>
                        <td key={uuidv4()}>
                          {apartment.tenant.personInArmy.rank.rankInGreek +
                            apartment.tenant.personInArmy.specialty +
                            " " +
                            apartment.tenant.personInArmy.firstname +
                            " " +
                            apartment.tenant.personInArmy.surname}
                        </td>
                        <td key={uuidv4()}>{apartment.floor}</td>
                      </tr>
                    ))}
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    )
  );
};

Apartments.propTypes = {
  auth: PropTypes.object.isRequired,
  apartmentsObj: PropTypes.object.isRequired,
  getAllApartmentsFromAMilitaryResidence: PropTypes.func.isRequired,
};

const mapStateToProps = (state) => ({
  auth: state.authReducer,
  apartmentsObj: state.apartmentReducer,
});

export default connect(mapStateToProps, {
  getAllApartmentsFromAMilitaryResidence,
})(Apartments);
