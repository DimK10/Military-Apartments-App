import React, { Fragment } from "react";

const StepSeven = () => (
  <Fragment>
    <div className="form-row mt-md-5">
      <div className="form-group col-md-3">
        <label htmlFor="inputRadiatorBodies">Σώματα Καλοριφέρ</label>
        <input type="text" className="form-control" id="inputRadiatorBodies" />
      </div>
      <div className="form-group col-md-3">
        <label htmlFor="inputRadiatorKeys">Κλειδί Εξαέρωσης</label>
        <input type="text" className="form-control" id="inputRadiatorKeys" />
      </div>
      <div className="form-group col-md-3">
        <label htmlFor="inputWardrobes">Ντουλάπες 2 Φύλλων</label>
        <input type="text" className="form-control" id="inputWardrobes" />
      </div>
      <div className="form-group col-md-3">
        <label htmlFor="inputBalconyLights">Φωτιστικά Μπαλκονιού</label>
        <input type="text" className="form-control" id="inputBalconyLights" />
      </div>
    </div>
    <div className="form-row">
      <div className="form-group col-md-4">
        <label htmlFor="inputHouseKeys">Κλειδιά Οικίας</label>
        <input type="text" className="form-control" id="inputHouseKeys" />
      </div>
      <div className="form-group col-md-4">
        <label htmlFor="inputTents">Τέντες</label>
        <input type="text" className="form-control" id="inputTents" />
      </div>
      <div className="form-group col-md-4">
        <label htmlFor="inputFlags">Σημαία</label>
        <input type="text" className="form-control" id="inputFlags" />
      </div>
    </div>
  </Fragment>
);

export default StepSeven;
