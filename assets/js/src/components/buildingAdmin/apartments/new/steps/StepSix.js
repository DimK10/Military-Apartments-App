import React, { Fragment } from "react";

const StepSix = () => (
  <Fragment>
    <div className="form-row mt-md-5">
      <div className="form-group col-md-3">
        <label htmlFor="inputToiletRimsWithSeats">Λεκάνη Με Κάλυμμα</label>
        <input
          type="text"
          className="form-control"
          id="inputToiletRimsWithSeats"
        />
      </div>
      <div className="form-group col-md-3">
        <label htmlFor="inputBathtubs">Μπανιέρα</label>
        <input type="text" className="form-control" id="inputBathtubs" />
      </div>
      <div className="form-group col-md-3">
        <label htmlFor="inputBathSinks">Νιπτήρας</label>
        <input type="text" className="form-control" id="inputBathSinks" />
      </div>
      <div className="form-group col-md-3">
        <label htmlFor="inputShelvesWithMirror">Εταζέρα Με Καθρέπτη</label>
        <input
          type="text"
          className="form-control"
          id="inputShelvesWithMirror"
        />
      </div>
    </div>
    <div className="form-row">
      <div className="form-group col-md-3">
        <label htmlFor="inputTowelHolders">Πετσετοθήκη</label>
        <input type="text" className="form-control" id="inputTowelHolders" />
      </div>
      <div className="form-group col-md-3">
        <label htmlFor="inputPaperHolders">Χαρτοθήκη</label>
        <input type="text" className="form-control" id="inputPaperHolders" />
      </div>
      <div className="form-group col-md-3">
        <label htmlFor="inputSoapHolders">Σαπουνοθήκη</label>
        <input type="text" className="form-control" id="inputSoapHolders" />
      </div>
      <div className="form-group col-md-3">
        <label htmlFor="inputSpongeHolders">Σφουγγαροθήκη</label>
        <input type="text" className="form-control" id="inputSpongeHolders" />
      </div>
    </div>
  </Fragment>
);

export default StepSix;
