import { v4 as uuidv4 } from "uuid";
import { SET_GENERAL_ALERT, REMOVE_GENERAL_ALERT } from "./types";

export const setGeneralAlert = (msg, alertType, timeout = 5000) => (
  dispatch
) => {
  const id = uuidv4();
  dispatch({
    type: SET_GENERAL_ALERT,
    payload: { msg, alertType, id },
  });

  setTimeout(
    () => dispatch({ type: REMOVE_GENERAL_ALERT, payload: id }),
    timeout
  );
};
