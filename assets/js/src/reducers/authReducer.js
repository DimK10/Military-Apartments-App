import {
  LOGIN_SUCCESS,
  LOGIN_FAIL,
  USER_LOADED,
  UPDATE_USER,
  USER_ERROR,
  AUTH_ERROR,
  REGISTER_SUCCESS,
  REGISTER_FAIL,
  LOGOUT,
  LOGOUT_ERROR,
} from "../actions/types";

const token = JSON.parse(localStorage.getItem("jwt"))
  ? JSON.parse(localStorage.getItem("jwt")).token
  : null;

const initialState = {
  token,
  isAuthenticated: false,
  loading: true,
  user: { email: null, roles: [] },
  errors: [],
};

export default (state = initialState, action) => {
  const { type, payload } = action;

  switch (type) {
    case USER_LOADED:
      return {
        ...state,
        user: { ...payload },
        isAuthenticated: true,
        loading: false,
      };
    case REGISTER_SUCCESS:
    case LOGIN_SUCCESS:
      localStorage.setItem("jwt", JSON.stringify(payload));
      return {
        ...state,
        ...payload,
        isAuthenticated: true,
        loading: false,
      };
    case REGISTER_FAIL:
    case LOGIN_FAIL:
    case LOGOUT:
    case AUTH_ERROR:
      localStorage.removeItem("jwt");
      return {
        ...state,
        token: null,
        user: { email: null, roles: [] },
        isAuthenticated: false,
        loading: false,
      };
    default:
      return state;
  }
};
