import { GET_SCORES, SCORE_ERROR } from "../actions/types";

const initialState = {
  scores: [],
  loading: true,
  error: {},
};

export default (state = initialState, action) => {
  const { type, payload } = action;

  switch (type) {
    case GET_SCORES:
      return {
        ...state,
        scores: payload,
        loading: false,
      };

    case SCORE_ERROR:
      return {
        ...state,
        loading: false,
        error: payload,
      };
    default:
      return state;
  }
};
