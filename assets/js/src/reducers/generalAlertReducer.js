import { SET_GENERAL_ALERT, REMOVE_GENERAL_ALERT } from "../actions/types";
const initialState = [];

export default function (state = initialState, action) {
  const { type, payload } = action;

  switch (type) {
    case SET_GENERAL_ALERT:
      return [...state, payload];
    case REMOVE_GENERAL_ALERT:
      return state.filter((alert) => alert.id !== payload);
    default:
      return state;
  }
}
