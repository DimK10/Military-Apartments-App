import React, { useEffect } from 'react'
import PropTypes from 'prop-types'
import { logout } from "../../actions/auth";
import { connect } from 'react-redux';
import {Redirect} from "react-router";


const Logout = ({ logout }) => {

    useEffect(() => {
        logout();
    }, []);

    return (
        <Redirect to='/login' />
    )
}

Logout.propTypes = {
    logout: PropTypes.func.isRequired,
}

export default connect(null, { logout })(Logout);
