import React, { Fragment, useState, useEffect } from "react";
import PropTypes from "prop-types";
import municipalValues from "../../../utils/municipalValues";
import { v4 as uuidv4 } from "uuid";
import { connect } from "react-redux";
import { fetchNewPeopleForScoring } from "../../../actions/peopleInArmy";

export const ScoringNewEntry = ({
  peopleInArmyObj: { peopleInArmy, loading },
  fetchNewPeopleForScoring,
  match,
}) => {
  useEffect(() => {
    let location = match.params.location;
    fetchNewPeopleForScoring(location);
  }, []);

  const [selectedPerson, setSelectedPerson] = useState("");

  const onChange = (e) => {
    setSelectedPerson(e.target.value);
  };

  return (
    <Fragment>
      {!loading && (
        <div className="c-app flex-row align-items-center">
          <div className="container">
            <div className="row justify-content-center">
              <div className="col-md-8">
                <div className="card-group">
                  <div className="card p-4">
                    <div className="card-body">
                      <h3>
                        Χρήστες που υπηρετούν στην περιοχή{" "}
                        {match.params.location} και δεν μοριοδοτούνται:
                      </h3>

                      {peopleInArmy.length > 0 ? (
                        <Fragment>
                          <div className="form-group">
                            <select
                              className="form-control"
                              onChange={(e) => onChange(e)}
                            >
                              {/*<option value="">--Επιλέξτε Ένα Δήμο--</option>*/}
                              {peopleInArmy.map((person) => (
                                <option key={uuidv4()} value={person.id}>
                                  {person.rank} {person.specialty}{" "}
                                  {person.firstname} {person.surname}{" "}
                                  {person.unit.name}
                                </option>
                              ))}
                            </select>
                          </div>

                          <div className="form-group d-flex justify-content-center">
                            <button className="btn btn-primary col-2">
                              OK
                            </button>
                          </div>
                        </Fragment>
                      ) : (
                        <p>Δεν υπάρχουν Στελέχη</p>
                      )}
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      )}
    </Fragment>
  );
};

ScoringNewEntry.propTypes = {
  fetchNewPeopleForScoring: PropTypes.func.isRequired,
  match: PropTypes.object.isRequired,
};

const mapStateToProps = (state) => ({
  peopleInArmyObj: state.peopleInArmyReducer,
});

export default connect(mapStateToProps, { fetchNewPeopleForScoring })(
  ScoringNewEntry
);
