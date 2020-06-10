import { combineReducers } from "redux";
import alertReducer from "./alertReducer";
import authReducer from "./authReducer";
import scoringReducer from "./scoringReducer";

export default combineReducers({
  alertReducer,
  authReducer,
  scoringReducer,
});
