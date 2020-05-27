import React, {Fragment} from 'react'
import PropTypes from 'prop-types'

const Login = props => {
    return (
        <Fragment>
            <div className="container">
                <div className="row justify-content-center">
                    <div className="col-md-8">
                        <div className="card-group">
                            <div className="card p-4">
                                <div className="card-body">
                                    <h1>Login</h1>
                                    <p className="text-muted">Sign In to your account</p>
                                    <div className="input-group mb-3">
                                        <div className="input-group-prepend cil-user"><span
                                            className="input-group-text">
</span></div>
                                        <input className="form-control" type="text" placeholder="Username"/>
                                    </div>
                                    <div className="input-group mb-4">
                                        <div className="input-group-prepend cil-lock-locked"><span
                                            className="input-group-text"></span>
                                        </div>
                                        <input className="form-control" type="password" placeholder="Password" />
                                    </div>
                                    <div className="row">
                                        <div className="col-6">
                                            <button className="btn btn-primary px-4" type="button">Login</button>
                                        </div>
                                        <div className="col-6 text-right">
                                            <button className="btn btn-link px-0" type="button">Forgot password?
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </Fragment>
)
}

Login.propTypes = {

}

export default Login
