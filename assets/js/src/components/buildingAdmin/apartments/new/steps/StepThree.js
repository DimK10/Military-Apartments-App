import React from "react";

const StepThree = () => (
  <div className="form-row mt-md-5">
    <div className="form-group col-md-3">
      <label htmlFor="inputMainEntranceDoors">Πόρτα Κυρίας Εισόδου</label>
      <input type="text" className="form-control" id="inputMainEntranceDoors" />
    </div>
    <div className="form-group col-md-2">
      <label htmlFor="inputMainInteriorDoors">Εσωτερικές Πόρτες</label>
      <input type="text" className="form-control" id="inputMainInteriorDoors" />
    </div>
    <div className="form-group col-md-2">
      <label htmlFor="inputMainBalconyDoors">Πόρτες Μπαλκονιού</label>
      <input type="text" className="form-control" id="inputMainBalconyDoors" />
    </div>
    <div className="form-group col-md-2">
      <label htmlFor="inputWCWindows">Παράθυρο WC</label>
      <input type="text" className="form-control" id="inputWCWindows" />
    </div>
    <div className="form-group col-md-3">
      <label htmlFor="inputKitchenWindows">Παράθυρο Κουζίνας</label>
      <input type="text" className="form-control" id="inputKitchenWindows" />
    </div>
  </div>
);

export default StepThree;
