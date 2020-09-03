import React from "react";
import PropTypes from "prop-types";

const StepOne = () => (
  <div className="form-row mt-md-5">
    <div className="form-group col-md-2">
      <label htmlFor="inputName">Όνομα Διαμερίσματος:</label>
      <input type="text" className="form-control" id="inputName" />
    </div>
    <div className="form-group col-md-1">
      <label htmlFor="inputFloor">Όροφος</label>
      <input type="text" className="form-control" id="inputFloor" />
    </div>
    <div className="form-group col-md-2">
      <label htmlFor="selectMasterBedrooms">Κύρια Υπνοδωμάτια</label>

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
);

export default StepOne;
