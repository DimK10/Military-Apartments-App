import React from "react";
import PropTypes from "prop-types";
import { connect } from "react-redux";

const GeneralAlert = ({ alerts }) => {
  return (
    alerts !== null &&
    alerts.length > 0 &&
    alerts.map((alert) => (
      <div key={alert.id} className={`alert alert-${alert.alertType} mt-5`}>
        {alert.msg}
      </div>
    ))
  );
};

// GeneralAlert.propTypes = {
//   alerts: PropTypes.array.isRequired,
// };

const mapStateToProps = (state) => ({
  alerts: state.generalAlertReducer,
});

export default connect(mapStateToProps)(GeneralAlert);
