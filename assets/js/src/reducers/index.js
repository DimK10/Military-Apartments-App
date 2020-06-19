import { combineReducers } from "redux";
import alertReducer from "./alertReducer";
import authReducer from "./authReducer";
import scoringReducer from "./scoringReducer";
import peopleInArmyReducer from "./peopleInArmyReducer";

export default combineReducers({
  alertReducer,
  authReducer,
  scoringReducer,
  peopleInArmyReducer,
});
