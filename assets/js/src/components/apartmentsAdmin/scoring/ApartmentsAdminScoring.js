import React, { Fragment, useEffect, useState } from "react";
import PropTypes from "prop-types";
import Modal from "react-modal";
import { connect } from "react-redux";
import { v4 as uuidv4 } from "uuid";
import { getScores } from "../../../actions/scoring";
import { CSSTransition } from "react-transition-group";

Modal.setAppElement("#root");

const ApartmentsAdminScoring = ({ getScores, scoresObj: { scores } }) => {
  const [showModal, setShowModal] = useState("");

  const [modalIsOpen, setIsOpen] = React.useState(false);

  useEffect(() => {
    // getScores();
    // TODO - getLocations
    setIsOpen(true);
  }, [getScores]);

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

  function afterOpenModal() {
    // references are now sync'd and can be accessed.
  }

  function closeModal() {
    setIsOpen(false);
  }

  return (
    <div className="c-main">
      <div className="container">
        <Modal
          isOpen={modalIsOpen}
          onAfterOpen={afterOpenModal}
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
              <div className="modal-body">...</div>
              <div className="modal-footer">
                <button type="button" className="btn btn-primary">
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
              <div className="card-header">
                <h3>Αναλυτικός πίνακας στελεχών που μοριοδοτούνται:</h3>
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
                      {/*<th>Μόρια Βαθμόυ</th>*/}
                      {/*<th>Μόρια Συζύγου</th>*/}
                      {/*<th>*/}
                      {/*  1<sup>ου</sup> Παδιού*/}
                      {/*</th>*/}
                      {/*<th>*/}
                      {/*  3<sup>ου</sup> 4<sup>ου</sup> Παδιού Και Άνω*/}
                      {/*</th>*/}
                      <th>Μέλος Οικογ. Με Ειδικές Ανάγκες</th>
                      {/*<th>Μήνες Αναμονής Χ1</th>*/}
                      {/*<th>Μήνες Αναμονής Χ2</th>*/}
                      <th>Σύνολο Θετικών Μορίων</th>
                      {/*<th>Μήνες Προηγ. Στέγασης Χ2</th>*/}
                      {/*<th>Μήνες Προηγ. Στέγασης Χ3</th>*/}
                      {/*<th>Χρ. Υπηρετ. Στο Εξωτ.</th>*/}
                      {/*<th>Ετήσιο Εισόδημα</th>*/}
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
                        >{`${score.personInArmy.rank} ${score.personInArmy.specialty}`}</td>
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
  getScores: PropTypes.func.isRequired,
};

const mapStateToProps = (state) => ({
  scoresObj: state.scoringReducer,
});

export default connect(mapStateToProps, { getScores })(ApartmentsAdminScoring);
