import { SET_USER_ALERT, REMOVE_USER_ALERT } from "../actions/types";
const initialState = [];

export default function (state = initialState, action) {
  const { type, payload } = action;

  switch (type) {
    case SET_USER_ALERT:
      return [...state, payload];
    case REMOVE_USER_ALERT:
      return state.filter((alert) => alert.id !== payload);
    default:
      return state;
  }
}
