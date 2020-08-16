import { combineReducers } from "redux";
import userAlertReducer from "./userAlertReducer";
import authReducer from "./authReducer";
import scoringReducer from "./scoringReducer";
import peopleInArmyReducer from "./peopleInArmyReducer";
import generalAlertReducer from "./generalAlertReducer";
import apartmentReducer from "./apartmentReducer";

export default combineReducers({
  userAlertReducer,
  generalAlertReducer,
  authReducer,
  scoringReducer,
  peopleInArmyReducer,
  apartmentReducer,
});
