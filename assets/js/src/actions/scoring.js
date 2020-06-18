import axios from "axios";

import { GET_SCORES, SCORE_ERROR } from "./types";

// Get people's scores

export const getScores = () => async (dispatch) => {
  try {
    const res = await axios.get("/api/scores");

    dispatch({
      type: GET_SCORES,
      payload: res.data,
    });
  } catch (err) {
    console.log(err.response.statusText);
    dispatch({
      type: SCORE_ERROR,
      payload: {
        msg: err.response.statusText,
        status: err.response.status,
      },
    });
  }
};

export const fetchPeoplesScoresOnLocation = (location) => async (dispatch) => {
  try {
    const res = await axios.get(`/api/scores?query=${location}`);

    dispatch({
      type: GET_SCORES,
      payload: res.data,
    });
  } catch (err) {
    console.log(err.response.statusText);
    dispatch({
      type: SCORE_ERROR,
      payload: {
        msg: err.response.statusText,
        status: err.response.status,
      },
    });
  }
};
