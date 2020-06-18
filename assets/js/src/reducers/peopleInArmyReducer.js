import { GET_PEOPLE_NO_SCORE, GET_PEOPLE_ERROR } from "../actions/types";

const initialState = {
  peopleInArmy: [],
  loading: true,
  error: {},
};

export default (state = initialState, action) => {
  const { type, payload } = action;

  switch (type) {
    case GET_PEOPLE_NO_SCORE:
      return {
        ...state,
        peopleInArmy: payload,
        loading: false,
      };
    //TODO - Manage custom errors in controller
    case GET_PEOPLE_ERROR:
      return {
        ...state,
        loading: false,
        error: payload,
      };
    default:
      return state;
  }
};
