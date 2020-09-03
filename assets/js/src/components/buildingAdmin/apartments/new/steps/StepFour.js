import React, { Fragment } from "react";

const StepFour = () => (
  <Fragment>
    <div className="form-row mt-md-5">
      <div className="form-group col-md-2">
        <label htmlFor="inputElectricPanels">Πίνακας Ρεύματος</label>
        <input type="text" className="form-control" id="inputElectricPanels" />
      </div>
      <div className="form-group col-md-2">
        <label htmlFor="inputElectricSockets">Πρίζες</label>
        <input type="text" className="form-control" id="inputElectricSockets" />
      </div>
      <div className="form-group col-md-2">
        <label htmlFor="inputBathHeaters">Θερμ. Μπάνιου</label>
        <input type="text" className="form-control" id="inputBathHeaters" />
      </div>
      <div className="form-group col-md-2">
        <label htmlFor="inputKitchenAbsorbers">Απορροφητήρας</label>
        <input
          type="text"
          className="form-control"
          id="inputKitchenAbsorbers"
        />
      </div>
      <div className="form-group col-md-2">
        <label htmlFor="inputTelephoneSockets">Παροχή Τηλεφώνου</label>
        <input
          type="text"
          className="form-control"
          id="inputTelephoneSockets"
        />
      </div>
      <div className="form-group col-md-2">
        <label htmlFor="inputTvSockets">Παροχή TV</label>
        <input type="text" className="form-control" id="inputTvSockets" />
      </div>
    </div>
    <div className="form-row">
      <div className="form-group col-md-2">
        <label htmlFor="inputKitchenHeaters">Θερμοσίφωνας κουζίνας</label>
        <input type="text" className="form-control" id="inputKitchenHeaters" />
      </div>
    </div>
  </Fragment>
);

export default StepFour;
