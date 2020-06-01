import React from 'react';
import {Redirect} from "react-router-dom";

export const choosePath = (isAuthenticated, loading, user) => {
    if (isAuthenticated && user) {
        // User is authenticated -- check where he/she is authorized to go
        if (user.roles.includes('ROLE_USER')) {
            // TODO ApartmentsAdminDashboard route for user
            return <Redirect to={"/user/apartmentsAdmin"} />
        } else if (user.roles.includes('ROLE_APARTMENTS_ADMIN')) {
            return <Redirect to={"/apartments-admin/dashboard"} />
        } else if (user.roles.includes('ROLE_BUILDING_ADMIN')) {
            return <Redirect to={"/building-admin/dashboard"} />
        } else if (user.roles.includes('ROLE_ADMIN')) {
            return <Redirect to={"/admin/apartmentsAdmin"} />
        }
    } else {
        return <Redirect to="/login" />
    }
};