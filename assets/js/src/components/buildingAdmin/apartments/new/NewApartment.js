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
                <div className="card-body">
                  <form>
                    {/*<label htmlFor="form-row">*/}
                    {/*  Βασικά Στοιχέια Διαμερίσματος*/}
                    {/*</label>*/}
                    {/*<hr />*/}
                    <div className="form-row">
                      <div className="form-group col-md-2">
                        <label htmlFor="inputName">Όνομα Διαμερίσματος:</label>
                        <input
                          type="text"
                          className="form-control"
                          id="inputName"
                        />
                      </div>
                      <div className="form-group col-md-1">
                        <label htmlFor="inputFloor">Όροφος</label>
                        <input
                          type="text"
                          className="form-control"
                          id="inputFloor"
                        />
                      </div>
                      <div className="form-group col-md-2">
                        <label htmlFor="selectMasterBedrooms">
                          Κύρια Υπνοδωμάτια
                        </label>

                        <select
                          id="selectMasterBedrooms"
                          className="form-control"
                          defaultValue={"1"}
                        >
                          <option value={"1"}>1</option>
                          <option value={"2"}>2</option>
                        </select>
                      </div>
                    </div>
                    <hr />
                    <div className="form-row">
                      <div className="form-group col-md-3">
                        <label htmlFor="inputMasterBedroomFloor">
                          Δάπεδο Κυρίων υπνοδωματίων
                        </label>
                        <input
                          type="text"
                          className="form-control"
                          id="inputMasterBedroomFloor"
                          placeholder="πχ Ξύλινο"
                        />
                      </div>
                      <div className="form-group col-md-3">
                        <label htmlFor="inputLivingRoomFloor">
                          Δάπεδο Σαλονιού - καθιστικού
                        </label>
                        <input
                          type="text"
                          className="form-control"
                          id="inputLivingRoomFloor"
                          placeholder="πχ Ξύλινο"
                        />
                      </div>
                      <div className="form-group col-md-3">
                        <label htmlFor="inputWCFloor">
                          Δάπεδο Κουζίνας - WC
                        </label>
                        <input
                          type="text"
                          className="form-control"
                          id="inputWCFloor"
                          placeholder="πχ Ξύλινο"
                        />
                      </div>
                      <div className="form-group col-md-3">
                        <label htmlFor="inputHallFloor">
                          Δάπεδο Χωλ - Διαδρόμου
                        </label>
                        <input
                          type="text"
                          className="form-control"
                          id="inputHallFloor"
                          placeholder="πχ Ξύλινο"
                        />
                      </div>
                    </div>
                    <hr />
                    <div className="form-row">
                      <div className="form-group col-md-3">
                        <label htmlFor="inputMainEntranceDoors">
                          Πόρτα Κυρίας Εισόδου
                        </label>
                        <input
                          type="text"
                          className="form-control"
                          id="inputMainEntranceDoors"
                        />
                      </div>
                      <div className="form-group col-md-2">
                        <label htmlFor="inputMainInteriorDoors">
                          Εσωτερικές Πόρτες
                        </label>
                        <input
                          type="text"
                          className="form-control"
                          id="inputMainInteriorDoors"
                        />
                      </div>
                      <div className="form-group col-md-2">
                        <label htmlFor="inputMainBalconyDoors">
                          Πόρτες Μπαλκονιού
                        </label>
                        <input
                          type="text"
                          className="form-control"
                          id="inputMainBalconyDoors"
                        />
                      </div>
                      <div className="form-group col-md-2">
                        <label htmlFor="inputWCWindows">Παράθυρο WC</label>
                        <input
                          type="text"
                          className="form-control"
                          id="inputWCWindows"
                        />
                      </div>
                      <div className="form-group col-md-3">
                        <label htmlFor="inputKitchenWindows">
                          Παράθυρο Κουζίνας
                        </label>
                        <input
                          type="text"
                          className="form-control"
                          id="inputKitchenWindows"
                        />
                      </div>
                    </div>
                    <div className="form-row">
                      <div className="form-group col-md-2">
                        <label htmlFor="inputElectricPanels">
                          Πίνακας Ρεύματος
                        </label>
                        <input
                          type="text"
                          className="form-control"
                          id="inputElectricPanels"
                        />
                      </div>
                      <div className="form-group col-md-1">
                        <label htmlFor="inputElectricSockets">Πρίζες</label>
                        <input
                          type="text"
                          className="form-control"
                          id="inputElectricSockets"
                        />
                      </div>
                      <div className="form-group col-md-2">
                        <label htmlFor="inputBathHeaters">
                          Θερμοσίφωνας Μπάνιου
                        </label>
                        <input
                          type="text"
                          className="form-control"
                          id="inputBathHeaters"
                        />
                      </div>
                      <div className="form-group col-md-2">
                        <label htmlFor="inputKitchenAbsorbers">
                          Απορροφητήρας
                        </label>
                        <input
                          type="text"
                          className="form-control"
                          id="inputKitchenAbsorbers"
                        />
                      </div>
                      <div className="form-group col-md-2">
                        <label htmlFor="inputTelephoneSockets">
                          Παροχή Τηλεφώνου
                        </label>
                        <input
                          type="text"
                          className="form-control"
                          id="inputTelephoneSockets"
                        />
                      </div>
                      <div className="form-group col-md-1">
                        <label htmlFor="inputTvSockets">Παροχή TV</label>
                        <input
                          type="text"
                          className="form-control"
                          id="inputTvSockets"
                        />
                      </div>
                      <div className="form-group col-md-2">
                        <label htmlFor="inputKitchenHeaters">
                          Θερμοσίφωνας κουζίνας
                        </label>
                        <input
                          type="text"
                          className="form-control"
                          id="inputKitchenHeaters"
                        />
                      </div>
                    </div>
                    <hr />
                    <div className="form-row">
                      <div className="form-group col-md-4">
                        <label htmlFor="inputToilets">Καζανάκι WC</label>
                        <input
                          type="text"
                          className="form-control"
                          id="inputToilets"
                        />
                      </div>
                      <div className="form-group col-md-4">
                        <label htmlFor="inputFaucetBatteries">
                          Μπαταρια Μπάνιου
                        </label>
                        <input
                          type="text"
                          className="form-control"
                          id="inputFaucetBatteries"
                        />
                      </div>
                      <div className="form-group col-md-4">
                        <label htmlFor="inputFaucets">Βρύσες</label>
                        <input
                          type="text"
                          className="form-control"
                          id="inputFaucets"
                        />
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div className="d-flex justify-content-center" role="group">
            <button type="submit" className="btn btn-primary">
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
