import axios from "axios";

import { GET_MILITARY_RESIDENCE, MILITARY_RESIDENCE_ERROR } from "./types";
import { setUserAlert } from "./userAlert";

export const fetchMilitaryResidenceById = (id) => async (dispatch) => {
  try {
    const res = await axios.get(`/api/military-residence/${id}`);

    dispatch({
      type: GET_MILITARY_RESIDENCE,
      payload: res.data,
    });
  } catch (err) {
    // console.log(err.response);
    dispatch({
      type: MILITARY_RESIDENCE_ERROR,
      payload: {
        msg: err.response.data.msg,
        status: err.response.status,
      },
    });
    dispatch(setUserAlert(err.response.data.msg, "danger"));
  }
};
