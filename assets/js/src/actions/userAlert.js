import { v4 as uuidv4 } from "uuid";
import { SET_USER_ALERT, REMOVE_USER_ALERT } from "./types";

export const setUserAlert = (msg, alertType, timeout = 5000) => (dispatch) => {
  const id = uuidv4();
  dispatch({
    type: SET_USER_ALERT,
    payload: { msg, alertType, id },
  });

  setTimeout(() => dispatch({ type: REMOVE_USER_ALERT, payload: id }), timeout);
};
