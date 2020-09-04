import React, { Fragment, useEffect, useState } from "react";
import PropTypes from "prop-types";

const StepOne = () => {
  const [validInputs, setValidInputs] = useState({
    name: "",
    floor: "",
  });

  const [stepOneValues, setValues] = useState({
    name: "",
    floor: "",
  });

  useEffect(() => {});

  const onChange = (e) => {
    if (/[^\w\s]/gi.test(e.target.value)) {
      // input is not valid
      setValidInputs({ ...validInputs, [e.target.name]: "is-invalid" });
      // sanitize
      setValues({
        ...stepOneValues,
        [e.target.name]: e.target.value.replace(/[^\w\s]/gi, ""),
      });
    } else {
      setValidInputs({ ...validInputs, [e.target.name]: "is-valid" });
      setValues({ ...stepOneValues, [e.target.name]: e.target.value });
    }
    // make input look neutral when there is no text
    if (e.target.value === "") {
      setValidInputs({ ...validInputs, [e.target.name]: "" });
    }
  };
  return (
    <Fragment>
      <div className="form-row mt-md-5">
        <div className="form-group col-md-2">
          <label htmlFor="inputName">Όνομα Διαμερίσματος:</label>
          <input
            type="text"
            name="name"
            className={`form-control ${validInputs["name"]}`}
            id="inputName"
            onChange={(e) => onChange(e)}
            value={stepOneValues["name"]}
          />
          <div className="invalid-feedback">
            Δεν μπορείτε να χαρησιμοποιήσετε ειδικούς χαρακτήρες
          </div>
        </div>
        <div className="form-group col-md-1">
          <label htmlFor="inputFloor">Όροφος</label>
          <input
            type="number"
            min={1}
            max={4}
            name="floor"
            className={`form-control ${validInputs["floor"]}`}
            id="inputFloor"
            onChange={(e) => onChange(e)}
            value={stepOneValues["floor"]}
          />
          <div className="invalid-feedback">
            Δεν μπορείτε να χαρησιμοποιήσετε ειδικούς χαρακτήρες
          </div>
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
    </Fragment>
  );
};

export default StepOne;
