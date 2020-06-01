import React, { Fragment, useState } from 'react';
import PropTypes from 'prop-types';
import { v4 as uuidv4 } from 'uuid';
import { NavLink, withRouter } from 'react-router-dom';
import { connect } from 'react-redux';

const SelectDashboard = ({ auth: { user }, history }) => {
  const [selectedDashboard, setSelectedDashboard] = useState('');

  const chooseDashboard = () => {
    if (selectedDashboard !== '') {
      history.push(selectedDashboard);
    } else {
      // TODO - set alert error
    }
  };

  const onChange = (e) => {
    setSelectedDashboard(e.target.value);
  };

  return (
    <Fragment>
      <div className='c-app flex-row align-items-center'>
        <div className='container'>
          <div className='row justify-content-center'>
            <div className='col-md-8'>
              <div className='card-group'>
                <div className='card p-4'>
                  <div className='card-body'>
                    Επιλέξτε αν θέλετε να εισέλθετε ως:
                    <select
                      className='custom-select'
                      onChange={(e) => onChange(e)}
                    >
                      <option defaultValue>--Επιλογές--</option>
                      {user.roles.map((role) => {
                        switch (role) {
                          case 'ROLE_USER':
                            return (
                              <option
                                key={uuidv4()}
                                className='dropdown-item'
                                value='/user/dashboard'
                              >
                                Απλός Χρήστης
                              </option>
                            );
                          case 'ROLE_APARTMENTS_ADMIN':
                            return (
                              <option
                                key={uuidv4()}
                                className='dropdown-item'
                                value='/apartments-admin/dashboard'
                              >
                                Διαχειριστής Πολυκατοικιών - 4οΕΓ
                              </option>
                            );
                          case 'ROLE_BUILDING_ADMIN':
                            return (
                              <option
                                key={uuidv4()}
                                className='dropdown-item'
                                value='building-admin/dashboard'
                              >
                                Διχειριστης Πολυκατοικίας
                              </option>
                            );
                        }
                      })}
                    </select>
                    <button
                      className='btn btn-primary'
                      onClick={chooseDashboard}
                    >
                      Είσοδος
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </Fragment>
  );
};

SelectDashboard.propTypes = {
  auth: PropTypes.object.isRequired,
};

const mapStateToProps = (state) => ({
  auth: state.authReducer,
});

export default connect(mapStateToProps)(SelectDashboard);
