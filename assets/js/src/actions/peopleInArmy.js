import axios from "axios";

import { GET_PEOPLE_NO_SCORE, GET_PEOPLE_ERROR } from "./types";

// Fetch new people that exist in db, but haven't gotten any scoring data, and are in the same location
// Provided
export const fetchNewPeopleForScoring = (location) => async (dispatch) => {
  try {
    const res = await axios.get(
      `/api/peopleInArmy/no-score?location=${location}`
    );

    dispatch({
      type: GET_PEOPLE_NO_SCORE,
      payload: res.data,
    });
  } catch (err) {
    console.log(err.response.statusText);
    dispatch({
      type: GET_PEOPLE_ERROR,
      payload: {
        msg: err.response.statusText,
        status: err.response.status,
      },
    });
  }
};
