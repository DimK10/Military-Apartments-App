import axios from "axios";

import { GET_PEOPLE_NO_SCORE, GET_PEOPLE_ERROR } from "./types";
import { setUserAlert } from "./userAlert";

// Fetch new people that exist in db, but haven't gotten any scoring data, and are in the same location
// Provided
export const fetchNewPeopleForScoring = (location) => async (dispatch) => {
  try {
    const res = await axios.get(
      `/api/people-in-army/no-score?location=${location}`
    );

    dispatch({
      type: GET_PEOPLE_NO_SCORE,
      payload: res.data,
    });
  } catch (err) {
    // console.log(err.response);
    dispatch({
      type: GET_PEOPLE_ERROR,
      payload: {
        msg: err.response.data.msg,
        status: err.response.status,
      },
    });
    dispatch(setUserAlert(err.response.data.msg, "danger"));
  }
};
