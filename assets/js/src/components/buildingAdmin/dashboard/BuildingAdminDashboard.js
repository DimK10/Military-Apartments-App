import React, { Fragment }from 'react'
import PropTypes from 'prop-types'
import {connect} from 'react-redux';

const BuildingAdminDashboard = ({ auth: { user: { personInArmy: usr = null } }}) => {
  return (
      <div className="jumbotron mb-0" style={{ height: '100vh' }}>
        <h1 className="display-4">Καλώς Ήλθατε Στο Πάνελ Διαχειριστή ΣΟΑ!</h1>

        <p className="lead">Για να συνεχίσετε, επιλέξτε μία από τις κατηγορίες αριστερά.</p>
        <hr className="my-4"></hr>
        <p>Χρήστης: {usr && usr.rank + ' ' + usr.specialty + ' ' + usr.surname + ' ' + usr.firstname}</p>
        <p>Μονάδα: {usr.unit ? usr.unit : 'Δεν έχει οριστεί'}</p>
        <p>Συμβάντα: Κανένα</p>
      </div>
  )
};

BuildingAdminDashboard.propTypes = {
  auth: PropTypes.object.isRequired,
}

const mapStateToProps = state => ({
    auth: state.authReducer
})

export default connect(mapStateToProps)(BuildingAdminDashboard);
