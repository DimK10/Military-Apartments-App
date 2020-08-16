import React, { Fragment, useEffect, useState } from "react";
import PropTypes from "prop-types";
import Modal from "react-modal";
import { connect } from "react-redux";
import { v4 as uuidv4 } from "uuid";
import { fetchPeoplesScoresOnLocation } from "../../../actions/scoring";
import municipalValues from "../../../utils/municipalValues";
import { NavLink } from "react-router-dom";
import ScoringNewEntry from "./ScoringNewEntry";

Modal.setAppElement("#root");

const ApartmentsAdminScoring = ({
  fetchPeoplesScoresOnLocation,
  scoresObj: { scores },
}) => {
  const [modalIsOpen, setIsOpen] = React.useState(false);

  const [selectedLocation, setSelectedLocation] = useState("");

  const onChange = (e) => {
    setSelectedLocation(e.target.value);
  };

  const onSubmit = () => {
    closeModal();
  };

  useEffect(() => {
    setIsOpen(true);
  }, []);

  useEffect(() => {
    if (selectedLocation !== "") fetchPeoplesScoresOnLocation(selectedLocation);
  }, [selectedLocation]);

  const customStyles = {
    content: {
      top: "50%",
      left: "50%",
      right: "auto",
      bottom: "auto",
      marginRight: "-50%",
      transform: "translate(-50%, -50%)",
      border: "none",
      padding: "0px",
    },
  };

  function openModal() {
    setIsOpen(true);
  }

  function closeModal() {
    setIsOpen(false);
  }

  return (
    <div className="c-main">
      <div className="container">
        <Modal
          isOpen={modalIsOpen}
          onRequestClose={closeModal}
          style={customStyles}
          contentLabel="Example Modal"
          shouldCloseOnOverlayClick={false}
        >
          {/*<button onClick={closeModal}>close</button>*/}
          <div
            className=""
            id="exampleModal"
            tabIndex="-1"
            role="dialog"
            aria-labelledby="exampleModalLabel"
            aria-hidden="true"
          >
            <div className="modal-content">
              <div className="modal-header">
                <h5 className="modal-title" id="exampleModalLabel">
                  Παρακαλώ Επιλέξτε Περιοχή:
                </h5>
              </div>
              <div className="modal-body">
                <select
                  value={selectedLocation}
                  className="form-control"
                  onChange={(e) => onChange(e)}
                >
                  <option value="">--Επιλέξτε Ένα Δήμο--</option>
                  {municipalValues.map((municipal) => (
                    <option key={uuidv4()} value={municipal}>
                      {municipal}
                    </option>
                  ))}
                </select>
              </div>
              <div className="modal-footer">
                <button
                  disabled={selectedLocation === "" ? true : false}
                  type="button"
                  className="btn btn-primary"
                  onClick={onSubmit}
                >
                  Εισαγωγή
                </button>
              </div>
            </div>
          </div>
        </Modal>
        <div className="page-header text-center">
          <h1>Μόρια Στελεχών</h1>
        </div>
        <hr />
        <div className="row">
          <div className="col-md-12">
            <div className="card">
              <div className="card-header d-flex">
                <h3 className="mr-auto">
                  Αναλυτικός πίνακας στελεχών που μοριοδοτούνται στην περιοχή{" "}
                  {selectedLocation}:
                </h3>
                <NavLink
                  to={`/apartments-admin/scoring/${selectedLocation}/new`}
                  className="btn btn-primary pull-right"
                >
                  Εισαγωγή Νέου <span className="fa fa-plus-circle"></span>
                </NavLink>
              </div>
              <div className="card-body table-responsive">
                <table className="table table-striped table-hover">
                  <thead>
                    <tr>
                      <th>
                        Α<span>/</span>A
                      </th>
                      <th>Βαθμός</th>
                      <th className="hidden-md">Όνομα</th>
                      <th>Έπώνυμο</th>
                      <th>Μονάδα</th>
                      <th>Οικογ. Κατάσταση</th>
                      <th>Παιδιά</th>
                      <th>Μέλος Οικογ. Με Ειδικές Ανάγκες</th>
                      <th>Σύνολο Θετικών Μορίων</th>
                      <th>Σύνολο Αρνητικών Μορίων</th>
                      <th>Γενικό Σύνολο Μορίων</th>
                      <th>Επιθυμία Στέγασης</th>
                    </tr>
                  </thead>
                  <tbody>
                    {scores.map((score, index) => (
                      <tr key={uuidv4()}>
                        <td key={uuidv4()}>{index + 1}</td>
                        <td
                          key={uuidv4()}
                        >{`${score.personInArmy.rank.rankInGreek} ${score.personInArmy.specialty}`}</td>
                        <td className="hidden-md" key={uuidv4()}>
                          {score.personInArmy.firstname}
                        </td>
                        <td key={uuidv4()}>{score.personInArmy.surname}</td>
                        <td key={uuidv4()}>
                          {score.personInArmy.unit
                            ? score.personInArmy.unit.name
                            : "Δεν Έχει Οριστεί"}
                        </td>
                        <td key={uuidv4()}>
                          {score.isMarried ? "Έγγαμος" : "Άγαμος"}
                        </td>
                        <td key={uuidv4()}>{score.hasNumOfChildren}</td>
                        <td key={uuidv4()}>
                          {score.hasRelativeWithDisability ? "Ναί" : "Όχι"}
                        </td>
                        <td key={uuidv4()}>{score.positiveScore}</td>
                        <td key={uuidv4()}>{score.negativeScore}</td>
                        <td key={uuidv4()}>{score.generalScore}</td>
                        <td key={uuidv4()}>
                          <div className="d-flex justify-content-start">
                            <p className="p-2">
                              {score.wishesToBeHoused ? "NAI" : "OXI"}
                            </p>
                            <span role="button" className="p-2">
                              <i
                                className="fa fa-pencil"
                                aria-hidden="true"
                              ></i>
                            </span>
                            <span role="button" className="p-2">
                              <i className="fa fa-trash" aria-hidden="true"></i>
                            </span>
                          </div>
                        </td>
                        <td></td>
                      </tr>
                    ))}
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
};

ApartmentsAdminScoring.propTypes = {
  fetchPeoplesScoresOnLocation: PropTypes.func.isRequired,
};

const mapStateToProps = (state) => ({
  scoresObj: state.scoringReducer,
});

export default connect(mapStateToProps, { fetchPeoplesScoresOnLocation })(
  ApartmentsAdminScoring
);
