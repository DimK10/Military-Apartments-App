import React, { Fragment, useState } from "react";
import PropTypes from "prop-types";
import municipalValues from "../../../utils/municipalValues";
import { v4 as uuidv4 } from "uuid";
import Modal from "react-modal";

export const ScoringNewEntryModal = ({ isOpen = false }) => {
  const [isModalOpen, setIsModalOpen] = useState(isOpen);

  const styles = {
    content: {
      top: "50%",
      left: "50%",
      right: "auto",
      bottom: "auto",
      marginRight: "-50%",
      transform: "translate(-50%, -50%)",
      border: "none",
      padding: "0px",
    },
  };

  function openModal() {
    setIsModalOpen(true);
  }

  function closeModal() {
    setIsModalOpen(false);
  }

  return (
    <Fragment>
      <Modal
        isOpen={isModalOpen}
        onRequestClose={closeModal}
        style={styles}
        contentLabel="Scoring Add New Modal"
        shouldCloseOnOverlayClick={true}
      >
        <button onClick={closeModal}>Κλέισιμο</button>
        <select
          value={selectedLocation}
          className="form-control"
          onChange={(e) => onChange(e)}
        >
          <option value="">--Επιλέξτε Ένα Δήμο--</option>
          {municipalValues.map((municipal) => (
            <option key={uuidv4()} value={municipal}>
              {municipal}
            </option>
          ))}
        </select>
      </Modal>
      <form noValidate>
        <div className="form-group">
          <label htmlFor=""></label>
          <input
            id=""
            className="form-control"
            type="text"
            placeholder="Default input"
          />
        </div>
      </form>
    </Fragment>
  );
};

ScoringNewEntryModal.propTypes = {
  isOpen: PropTypes.bool.isRequired,
};

export default ScoringNewEntryModal;
