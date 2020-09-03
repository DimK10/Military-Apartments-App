import React from "react";

const StepFive = () => (
  <div className="form-row mt-md-5">
    <div className="form-group col-md-4">
      <label htmlFor="inputToilets">Καζανάκι WC</label>
      <input type="text" className="form-control" id="inputToilets" />
    </div>
    <div className="form-group col-md-4">
      <label htmlFor="inputFaucetBatteries">Μπαταρια Μπάνιου</label>
      <input type="text" className="form-control" id="inputFaucetBatteries" />
    </div>
    <div className="form-group col-md-4">
      <label htmlFor="inputFaucets">Βρύσες</label>
      <input type="text" className="form-control" id="inputFaucets" />
    </div>
    <button type="submit" className="btn btn-primary">
      Δημιουργία
    </button>
  </div>
);

export default StepFive;
