import {
  GET_MILITARY_RESIDENCE,
  MILITARY_RESIDENCE_ERROR,
} from "../actions/types";

const initialState = {
  militaryResidence: {},
  loading: true,
  error: {},
};

export default (state = initialState, action) => {
  const { type, payload } = action;

  switch (type) {
    case GET_MILITARY_RESIDENCE:
      return {
        ...state,
        militaryResidence: payload,
        loading: false,
      };
    case MILITARY_RESIDENCE_ERROR:
      return {
        ...state,
        loading: false,
        error: payload,
      };
    default:
      return state;
  }
};
