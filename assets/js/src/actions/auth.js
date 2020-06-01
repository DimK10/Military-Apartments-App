import axios from 'axios';

import {
  USER_LOADED,
  UPDATE_USER,
  USER_ERROR,
  AUTH_ERROR,
  LOGIN_SUCCESS,
  LOGIN_FAIL,
  LOGOUT,
  REGISTER_SUCCESS,
  REGISTER_FAIL,
  LOGOUT_ERROR,
} from './types';

import { setAlert } from './alert';
import { Redirect } from 'react-router';

// Add session cookie in each request on axios
let config = {
  withCredentials: true,
};

// Load user
// export const loadUser = () => async (dispatch) => {
//   try {
//       let res = await axios.post('/api/auth');

//       dispatch({
//           type: USER_LOADED,
//           payload: res.data,
//       });

//       // If user has an avatar, load it to redux as base64
//       if (res.data.user.avatarId) {
//           dispatch(loadUserAvatar(res.data.user.avatarId));
//       }
//   } catch (err) {
//       console.error(err.message);
//       dispatch({
//           type: AUTH_ERROR,
//       });
//   }
// };

// Login user
export const login = (email, password) => async (dispatch) => {
  config = {
    ...config,
    headers: {
      'Content-Type': 'application/json',
    },
  };

  const body = JSON.stringify({ email, password });

  try {
    const res = await axios.post('/api/login', body, config);

    dispatch({
      type: LOGIN_SUCCESS,
      payload: res.data,
    });
    // dispatch(loadUser());

    window.location.reload(true);
  } catch (err) {
    const errors = err.response.data.errors;

    if (errors) {
      errors.forEach((error) => dispatch(setAlert(error.msg, 'danger')));
    }
    dispatch({
      type: LOGIN_FAIL,
    });
  }
};

// Sign up user
export const registerUser = (formData) => async (dispatch) => {
  const config = {
    headers: {
      'Content-Type': 'multipart/form-data',
    },
  };

  try {
    const res = await axios.post('/api/signup', formData, config);

    dispatch({
      type: REGISTER_SUCCESS,
      payload: res.data,
    });

    dispatch(setAlert('You have been registered successfully!', 'success'));
  } catch (err) {
    dispatch({
      type: REGISTER_FAIL,
    });
    const errors = err.response.data.errors;

    if (errors) {
      errors.forEach((error) => dispatch(setAlert(error.msg, 'danger')));
    }
  }
};

// Log out
export const logout = () => async (dispatch) => {
  try {
    await axios.get('/api/logout', config);

    // window.location.reload(true);
    dispatch({
      type: LOGOUT,
    });
    dispatch(setAlert('You have been logged out successfully!', 'success'));
  } catch (err) {
    dispatch({
      type: LOGOUT_ERROR,
      payload: {
        msg: err.response.statusText,
        status: err.response.status,
      },
    });
  }
};
