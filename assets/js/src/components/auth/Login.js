import React, { Fragment, useState } from 'react';
import PropTypes from 'prop-types';
import { connect } from 'react-redux';
import { login } from '../../actions/auth';

const Login = ({ login }) => {
  const [formData, setFormData] = useState({
    email: '',
    password: '',
  });

  const { email, password } = formData;

  const onChange = (e) => {
    setFormData({ ...formData, [e.target.name]: e.target.value });
  };

  const onSubmit = async (e) => {
    e.preventDefault();
    login(email, password);
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
                    <h1>Είσοδος</h1>
                    <p className='text-muted'>Συνδεθείτε στο λογαριασμό σας</p>
                    <form onSubmit={(e) => onSubmit(e)}>
                      <div className='input-group mb-3'>
                        <div className='input-group-prepend'>
                          <span className='cil-user input-group-text'></span>
                        </div>
                        <input
                          className='form-control'
                          type='text'
                          name='email'
                          placeholder='Username'
                          onChange={(e) => onChange(e)}
                        />
                      </div>
                      <div className='input-group mb-4'>
                        <div className='input-group-prepend'>
                          <span className='cil-lock-locked input-group-text' />
                        </div>
                        <input
                          className='form-control'
                          type='password'
                          name='password'
                          placeholder='Password'
                          onChange={(e) => onChange(e)}
                        />
                      </div>
                      <div className='row'>
                        <div className='col-6'>
                          <button
                            className='btn btn-primary px-4'
                            type='submit'
                          >
                            Είσοδος
                          </button>
                        </div>
                        <div className='col-6 text-right'>
                          <button className='btn btn-link px-0' type='button'>
                            Ξεχασατε το κωδικό σας;
                          </button>
                        </div>
                      </div>
                    </form>
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

Login.propTypes = {
  login: PropTypes.func.isRequired,
};

export default connect(null, { login })(Login);
