import axios from "axios";

import { GET_APARTMENTS, APARTMENT_ERROR } from "./types";

export const getAllApartmentsFromAMilitaryResidence = (
  MilitaryResidenceId
) => async (dispatch) => {
  try {
    const res = await axios.get(
      `/api/apartments-by-military-residence/${MilitaryResidenceId}`
    );
    dispatch({
      type: GET_APARTMENTS,
      payload: res.data,
    });
  } catch (err) {
    dispatch({
      APARTMENT_ERROR,
      payload: {
        msg: err.response.data.msg,
        status: err.response.status,
      },
    });
  }
};
