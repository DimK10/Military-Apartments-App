import React, { Fragment } from "react";
import PropTypes from "prop-types";

import StepProgressBar from "react-step-progress";
// import "modules/react-step-progress/dist/index.css";

import StepOne from "./steps/StepOne";
import StepTwo from "./steps/StepTwo";
import StepThree from "./steps/StepThree";
import StepFour from "./steps/StepFour";
import StepFive from "./steps/StepFive";
import StepSix from "./steps/StepSix";
import StepSeven from "./steps/StepSeven";

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
                  <form noValidate>
                    <StepProgressBar
                      startingStep={0}
                      primaryBtnClass={"btn btn-primary"}
                      steps={[
                        {
                          label: "Βασικά Στοιχεία",
                          name: "step_1",
                          content: <StepOne />,
                        },
                        {
                          label: "Δάπεδα",
                          name: "step_2",
                          content: <StepTwo />,
                        },
                        {
                          label: "Πόρτες-Παράθυρα",
                          name: "step_3",
                          content: <StepThree />,
                        },
                        {
                          label: "Ηλεκτρική Εγκατάσταση",
                          name: "step_4",
                          content: <StepFour />,
                        },
                        {
                          label: "Υδραυλική Εγκατάσταση - Κουζίνα",
                          name: "step_5",
                          content: <StepFive />,
                        },
                        {
                          label: "WC (τουαλέτα)",
                          name: "step_6",
                          content: <StepSix />,
                        },
                        {
                          label: "WC (τουαλέτα)",
                          name: "step_7",
                          content: <StepSeven />,
                        },
                      ]}
                    />
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
