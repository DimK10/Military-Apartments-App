import React, { Fragment }from 'react'
import PropTypes from 'prop-types'
import {connect} from 'react-redux';

const BuildingAdminDashboard = ({ auth: { user: { personInArmy: usr } }}) => {
  return (
    <Fragment>
      <div className="jumbotron">
        <h1 className="display-4">Καλώς Ήλθατε Στο Πάνελ Διαχειριστή ΣΟΑ!</h1>

        <p className="lead">Για να συνεχίσετε, επιλέξτε μία από τις κατηγορίες αριστερά.</p>
        <hr className="my-4"></hr>
        <p>Χρήστης: {usr.rank} {usr.specialty} {usr.surname} {usr.firstname}</p>
        <p>Μονάδα: {usr.unit.length > 0 ? usr.unit[0] : 'Δεν έχει οριστεί'}</p>
        <p>Συμβάντα: Κανένα</p>
      </div>
    </Fragment>
  )
}

BuildingAdminDashboard.propTypes = {

}

const mapStateToProps = state => ({
    auth: state.authReducer
})

export default connect(mapStateToProps)(BuildingAdminDashboard);
