import React from "react";

const StepFive = () => (
  <div className="form-row mt-md-5">
    <div className="form-group col-md-2">
      <label htmlFor="inputToilets">Καζανάκι WC</label>
      <input type="text" className="form-control" id="inputToilets" />
    </div>
    <div className="form-group col-md-2">
      <label htmlFor="inputFaucetBatteries">Μπαταρια Μπάνιου</label>
      <input type="text" className="form-control" id="inputFaucetBatteries" />
    </div>
    <div className="form-group col-md-2">
      <label htmlFor="inputFaucets">Βρύσες</label>
      <input type="text" className="form-control" id="inputFaucets" />
    </div>
    <div className="form-group col-md-2">
      <label htmlFor="inputDoubleSinks">Νεροχύτης Διπλός</label>
      <input type="text" className="form-control" id="inputDoubleSinks" />
    </div>
    <div className="form-group col-md-2">
      <label htmlFor="inputKitchenCabinets">Έπιπλα Κουζίνας (ντουλάπια)</label>
      <input type="text" className="form-control" id="inputKitchenCabinets" />
    </div>
    <div className="form-group col-md-2">
      <label htmlFor="inputKitchenDrawers">Πάγκος Μαρμάρινος</label>
      <input type="text" className="form-control" id="inputKitchenDrawers" />
    </div>
  </div>
);

export default StepFive;
