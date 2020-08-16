import { GET_APARTMENTS, APARTMENT_ERROR } from "../actions/types";

const initialState = {
  apartments: [],
  loading: true,
  error: {},
};

export default (state = initialState, action) => {
  const { type, payload } = action;

  switch (type) {
    case GET_APARTMENTS:
      return {
        ...state,
        apartments: payload,
        loading: false,
      };
    case APARTMENT_ERROR:
      return {
        ...state,
        loading: false,
        error: payload,
      };
    default:
      return state;
  }
};
