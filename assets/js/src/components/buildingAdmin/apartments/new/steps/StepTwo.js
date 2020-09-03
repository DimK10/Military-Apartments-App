import React from "react";

const StepTwo = () => (
  <div className="form-row mt-md-5">
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
      <label htmlFor="inputLivingRoomFloor">Δάπεδο Σαλονιού - καθιστικού</label>
      <input
        type="text"
        className="form-control"
        id="inputLivingRoomFloor"
        placeholder="πχ Ξύλινο"
      />
    </div>
    <div className="form-group col-md-3">
      <label htmlFor="inputWCFloor">Δάπεδο Κουζίνας - WC</label>
      <input
        type="text"
        className="form-control"
        id="inputWCFloor"
        placeholder="πχ Ξύλινο"
      />
    </div>
    <div className="form-group col-md-3">
      <label htmlFor="inputHallFloor">Δάπεδο Χωλ - Διαδρόμου</label>
      <input
        type="text"
        className="form-control"
        id="inputHallFloor"
        placeholder="πχ Ξύλινο"
      />
    </div>
  </div>
);

export default StepTwo;
