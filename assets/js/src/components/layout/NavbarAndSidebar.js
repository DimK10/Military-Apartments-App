import React, { Fragment, useState } from 'react';
import PropTypes from 'prop-types';

const Navbar = (props) => {
  const [showSidebar, setShowSidebar] = useState('');

  return (
    <Fragment>
      <div
        className={`c-sidebar c-sidebar-dark c-sidebar-fixed ${showSidebar}`}
        id='sidebar'
      >
        <div className='c-sidebar-brand d-md-down-none'>
          {/* Main category name */}
          <h4 className='c-sidebar-nav-title'>
            Εφαρμογή Στρατιωτικών Οικημάτων
          </h4>
        </div>
        <ul className='c-sidebar-nav ps ps--active-y'>
          <li className='c-sidebar-nav-title'>Μενού Επιλογών</li>
        </ul>
      </div>
      <div className='c-wrapper'>
        <header className='c-header c-header-light c-header-fixed'>
          <button
            className='c-header-toggler c-className-toggler d-lg-none mfe-auto'
            type='button'
            data-target='#sidebar'
            data-classname='c-sidebar-show'
            onClick={() => {
              showSidebar === ''
                ? setShowSidebar('c-sidebar-lg-show')
                : setShowSidebar('');
            }}
          ></button>
          <a
            className='c-header-brand d-lg-none c-header-brand-sm-up-center'
            href='#'
          >
            <svg width='118' height='46' alt='CoreUI Logo'></svg>
          </a>
          <button
            className='c-header-toggler c-className-toggler mfs-3 d-md-down-none'
            type='button'
            data-target='#sidebar'
            data-classname='c-sidebar-lg-show'
            responsive='true'
            onClick={() => {
              showSidebar === ''
                ? setShowSidebar('c-sidebar-lg-show')
                : setShowSidebar('');
            }}
          >
            <i className='cil-menu'></i>
          </button>
          <ul className='c-header-nav d-md-down-none'>
            <li className='c-header-nav-item px-3'>
              <a className='c-header-nav-link' href='#'>
                Dashboard
              </a>
            </li>
            <li className='c-header-nav-item px-3'>
              <a className='c-header-nav-link' href='#'>
                Users
              </a>
            </li>
            <li className='c-header-nav-item px-3'>
              <a className='c-header-nav-link' href='#'>
                Settings
              </a>
            </li>
          </ul>
          <ul className='c-header-nav mfs-auto'>
            <li className='c-header-nav-item px-3 c-d-legacy-none'>
              <button
                className='c-className-toggler c-header-nav-btn'
                type='button'
                id='header-tooltip'
                data-target='body'
                data-classname='c-dark-theme'
                data-toggle='c-tooltip'
                data-placement='bottom'
                title=''
                data-original-title='Toggle Light/Dark Mode'
              >
                <svg className='c-icon c-d-dark-none'></svg>
                <svg className='c-icon c-d-default-none'></svg>
              </button>
            </li>
          </ul>
          <ul className='c-header-nav'>
            <li className='c-header-nav-item dropdown d-md-down-none mx-2'>
              <a
                className='c-header-nav-link'
                data-toggle='dropdown'
                href='#'
                role='button'
                aria-haspopup='true'
                aria-expanded='false'
              >
                <svg className='c-icon'></svg>
                <span className='badge badge-pill badge-danger'>5</span>
              </a>
              <div className='dropdown-menu dropdown-menu-right dropdown-menu-lg pt-0'>
                <div className='dropdown-header bg-light'>
                  <strong>You have 5 notifications</strong>
                </div>
                <a className='dropdown-item' href='#'>
                  <svg className='c-icon mfe-2 text-success'></svg>
                  New user registered
                </a>
                <a className='dropdown-item' href='#'>
                  <svg className='c-icon mfe-2 text-danger'></svg>
                  User deleted
                </a>
                <a className='dropdown-item' href='#'>
                  <svg className='c-icon mfe-2 text-info'></svg>
                  Sales report is ready
                </a>
                <a className='dropdown-item' href='#'>
                  <svg className='c-icon mfe-2 text-success'></svg>
                  New client
                </a>
                <a className='dropdown-item' href='#'>
                  <svg className='c-icon mfe-2 text-warning'></svg>
                  Server overloaded
                </a>
                <div className='dropdown-header bg-light'>
                  <strong>Server</strong>
                </div>
                <a className='dropdown-item d-block' href='#'>
                  <div className='text-uppercase mb-1'>
                    <small>
                      <b>CPU Usage</b>
                    </small>
                  </div>
                  <span className='progress progress-xs'>
                    <div
                      className='progress-bar bg-info'
                      role='progressbar'
                      style={{ width: '25%' }}
                      aria-valuenow='25'
                      aria-valuemin='0'
                      aria-valuemax='100'
                    ></div>
                  </span>
                  <small className='text-muted'>
                    348 Processes. 1/4 Cores.
                  </small>
                </a>
                <a className='dropdown-item d-block' href='#'>
                  <div className='text-uppercase mb-1'>
                    <small>
                      <b>Memory Usage</b>
                    </small>
                  </div>
                  <span className='progress progress-xs'>
                    <div
                      className='progress-bar bg-warning'
                      role='progressbar'
                      style={{ width: '70%' }}
                      aria-valuenow='70'
                      aria-valuemin='0'
                      aria-valuemax='100'
                    ></div>
                  </span>
                  <small className='text-muted'>11444GB/16384MB</small>
                </a>
                <a className='dropdown-item d-block' href='#'>
                  <div className='text-uppercase mb-1'>
                    <small>
                      <b>SSD 1 Usage</b>
                    </small>
                  </div>
                  <span className='progress progress-xs'>
                    <div
                      className='progress-bar bg-danger'
                      role='progressbar'
                      style={{ width: '95%' }}
                      aria-valuenow='95'
                      aria-valuemin='0'
                      aria-valuemax='100'
                    ></div>
                  </span>
                  <small className='text-muted'>243GB/256GB</small>
                </a>
              </div>
            </li>
            <li className='c-header-nav-item dropdown d-md-down-none mx-2'>
              <a
                className='c-header-nav-link'
                data-toggle='dropdown'
                href='#'
                role='button'
                aria-haspopup='true'
                aria-expanded='false'
              >
                <svg className='c-icon'></svg>
                <span className='badge badge-pill badge-warning'>15</span>
              </a>
              <div className='dropdown-menu dropdown-menu-right dropdown-menu-lg pt-0'>
                <div className='dropdown-header bg-light'>
                  <strong>You have 5 pending tasks</strong>
                </div>
                <a className='dropdown-item d-block' href='#'>
                  <div className='small mb-1'>
                    Upgrade NPM &amp; Bower
                    <span className='float-right'>
                      <strong>0%</strong>
                    </span>
                  </div>
                  <span className='progress progress-xs'>
                    <div
                      className='progress-bar bg-info'
                      role='progressbar'
                      style={{ width: '0%' }}
                      aria-valuenow='0'
                      aria-valuemin='0'
                      aria-valuemax='100'
                    ></div>
                  </span>
                </a>
                <a className='dropdown-item d-block' href='#'>
                  <div className='small mb-1'>
                    ReactJS Version
                    <span className='float-right'>
                      <strong>25%</strong>
                    </span>
                  </div>
                  <span className='progress progress-xs'>
                    <div
                      className='progress-bar bg-danger'
                      role='progressbar'
                      style={{ width: '25%' }}
                      aria-valuenow='25'
                      aria-valuemin='0'
                      aria-valuemax='100'
                    ></div>
                  </span>
                </a>
                <a className='dropdown-item d-block' href='#'>
                  <div className='small mb-1'>
                    VueJS Version
                    <span className='float-right'>
                      <strong>50%</strong>
                    </span>
                  </div>
                  <span className='progress progress-xs'>
                    <div
                      className='progress-bar bg-warning'
                      role='progressbar'
                      style={{ width: '50%' }}
                      aria-valuenow='50'
                      aria-valuemin='0'
                      aria-valuemax='100'
                    ></div>
                  </span>
                </a>
                <a className='dropdown-item d-block' href='#'>
                  <div className='small mb-1'>
                    Add new layouts
                    <span className='float-right'>
                      <strong>75%</strong>
                    </span>
                  </div>
                  <span className='progress progress-xs'>
                    <div
                      className='progress-bar bg-info'
                      role='progressbar'
                      style={{ width: '75%' }}
                      aria-valuenow='75'
                      aria-valuemin='0'
                      aria-valuemax='100'
                    ></div>
                  </span>
                </a>
                <a className='dropdown-item d-block' href='#'>
                  <div className='small mb-1'>
                    Angular 8 Version
                    <span className='float-right'>
                      <strong>100%</strong>
                    </span>
                  </div>
                  <span className='progress progress-xs'>
                    <div
                      className='progress-bar bg-success'
                      role='progressbar'
                      style={{ width: '100%' }}
                      aria-valuenow='100'
                      aria-valuemin='0'
                      aria-valuemax='100'
                    ></div>
                  </span>
                </a>
                <a className='dropdown-item text-center border-top' href='#'>
                  <strong>View all tasks</strong>
                </a>
              </div>
            </li>
            <li className='c-header-nav-item dropdown d-md-down-none mx-2'>
              <a
                className='c-header-nav-link'
                data-toggle='dropdown'
                href='#'
                role='button'
                aria-haspopup='true'
                aria-expanded='false'
              >
                <svg className='c-icon'></svg>
                <span className='badge badge-pill badge-info'>7</span>
              </a>
              <div className='dropdown-menu dropdown-menu-right dropdown-menu-lg pt-0'>
                <div className='dropdown-header bg-light'>
                  <strong>You have 4 messages</strong>
                </div>
                <div className='dropdown-item' href='#'>
                  <div className='message'>
                    <div className='py-3 mfe-3 float-left'>
                      <div className='c-avatar'>
                        <img
                          className='c-avatar-img'
                          src='assets/img/avatars/7.jpg'
                          alt='user@email.com'
                        />
                        <span className='c-avatar-status bg-success'></span>
                      </div>
                    </div>
                    <div>
                      <small className='text-muted'>John Doe</small>
                      <small className='text-muted float-right mt-1'>
                        Just now
                      </small>
                    </div>
                    <div className='text-truncate font-weight-bold'>
                      <span className='text-danger'>!</span> Important message
                    </div>
                    <div className='small text-muted text-truncate'>
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                      sed do eiusmod tempor incididunt...
                    </div>
                  </div>
                  <a className='dropdown-item' href='#'>
                    <div className='message'>
                      <div className='py-3 mfe-3 float-left'>
                        <div className='c-avatar'>
                          <img
                            className='c-avatar-img'
                            src='assets/img/avatars/6.jpg'
                            alt='user@email.com'
                          />
                          <span className='c-avatar-status bg-warning'></span>
                        </div>
                      </div>
                      <div>
                        <small className='text-muted'>John Doe</small>
                        <small className='text-muted float-right mt-1'>
                          5 minutes ago
                        </small>
                      </div>
                      <div className='text-truncate font-weight-bold'>
                        Lorem ipsum dolor sit amet
                      </div>
                      <div className='small text-muted text-truncate'>
                        Lorem ipsum dolor sit amet, consectetur adipisicing
                        elit, sed do eiusmod tempor incididunt...
                      </div>
                    </div>
                  </a>
                  <a className='dropdown-item' href='#'>
                    <div className='message'>
                      <div className='py-3 mfe-3 float-left'>
                        <div className='c-avatar'>
                          <img
                            className='c-avatar-img'
                            src='assets/img/avatars/5.jpg'
                            alt='user@email.com'
                          />
                          <span className='c-avatar-status bg-danger'></span>
                        </div>
                      </div>
                      <div>
                        <small className='text-muted'>John Doe</small>
                        <small className='text-muted float-right mt-1'>
                          1:52 PM
                        </small>
                      </div>
                      <div className='text-truncate font-weight-bold'>
                        Lorem ipsum dolor sit amet
                      </div>
                      <div className='small text-muted text-truncate'>
                        Lorem ipsum dolor sit amet, consectetur adipisicing
                        elit, sed do eiusmod tempor incididunt...
                      </div>
                    </div>
                  </a>
                  <a className='dropdown-item' href='#'>
                    <div className='message'>
                      <div className='py-3 mfe-3 float-left'>
                        <div className='c-avatar'>
                          <img
                            className='c-avatar-img'
                            src='assets/img/avatars/4.jpg'
                            alt='user@email.com'
                          />
                          <span className='c-avatar-status bg-info'></span>
                        </div>
                      </div>
                      <div>
                        <small className='text-muted'>John Doe</small>
                        <small className='text-muted float-right mt-1'>
                          4:03 PM
                        </small>
                      </div>
                      <div className='text-truncate font-weight-bold'>
                        Lorem ipsum dolor sit amet
                      </div>
                      <div className='small text-muted text-truncate'>
                        Lorem ipsum dolor sit amet, consectetur adipisicing
                        elit, sed do eiusmod tempor incididunt...
                      </div>
                    </div>
                  </a>
                  <a className='dropdown-item text-center border-top' href='#'>
                    <strong>View all messages</strong>
                  </a>
                </div>
              </div>
            </li>
            <li className='c-header-nav-item dropdown'>
              <a
                className='c-header-nav-link'
                data-toggle='dropdown'
                href='#'
                role='button'
                aria-haspopup='true'
                aria-expanded='false'
              >
                <div className='c-avatar'>
                  <img
                    className='c-avatar-img'
                    src='assets/img/avatars/6.jpg'
                    alt='user@email.com'
                  />
                </div>
              </a>
              <div className='dropdown-menu dropdown-menu-right pt-0'>
                <div className='dropdown-header bg-light py-2'>
                  <strong>Account</strong>
                </div>
                <a className='dropdown-item' href='#'>
                  <svg className='c-icon mfe-2'></svg>
                  Updates<span className='badge badge-info mfs-auto'>42</span>
                </a>
                <a className='dropdown-item' href='#'>
                  <svg className='c-icon mfe-2'></svg>
                  Messages
                  <span className='badge badge-success mfs-auto'>42</span>
                </a>
                <a className='dropdown-item' href='#'>
                  <svg className='c-icon mfe-2'></svg>
                  Tasks<span className='badge badge-danger mfs-auto'>42</span>
                </a>
                <a className='dropdown-item' href='#'>
                  <svg className='c-icon mfe-2'></svg>
                  Comments
                  <span className='badge badge-warning mfs-auto'>42</span>
                </a>
                <div className='dropdown-header bg-light py-2'>
                  <strong>Settings</strong>
                </div>
                <a className='dropdown-item' href='#'>
                  <svg className='c-icon mfe-2'></svg>
                  Profile
                </a>
                <a className='dropdown-item' href='#'>
                  <svg className='c-icon mfe-2'></svg>
                  Settings
                </a>
                <a className='dropdown-item' href='#'>
                  <svg className='c-icon mfe-2'></svg>
                  Payments
                  <span className='badge badge-secondary mfs-auto'>42</span>
                </a>
                <a className='dropdown-item' href='#'>
                  <svg className='c-icon mfe-2'></svg>
                  Projects
                  <span className='badge badge-primary mfs-auto'>42</span>
                </a>
                <div className='dropdown-divider'></div>
                <a className='dropdown-item' href='#'>
                  <svg className='c-icon mfe-2'></svg>
                  Lock Account
                </a>
                <a className='dropdown-item' href='#'>
                  <svg className='c-icon mfe-2'></svg>
                  Logout
                </a>
              </div>
            </li>
            <button
              className='c-header-toggler c-className-toggler mfe-md-3'
              type='button'
              data-target='#aside'
              data-classname='c-sidebar-show'
            >
              <svg className='c-icon c-icon-lg'></svg>
            </button>
          </ul>
          <div className='c-subheader justify-content-between px-3'>
            <ol className='breadcrumb border-0 m-0 px-0 px-md-3'>
              <li className='breadcrumb-item'>Home</li>
              <li className='breadcrumb-item'>
                <a href='#'>Admin</a>
              </li>
              <li className='breadcrumb-item active'>Dashboard</li>
            </ol>
            <div className='c-subheader-nav d-md-down-none mfe-2'>
              <a className='c-subheader-nav-link' href='#'>
                <svg className='c-icon'></svg>
              </a>
              <a className='c-subheader-nav-link' href='#'>
                <svg className='c-icon'></svg>
                &nbsp;Dashboard
              </a>
              <a className='c-subheader-nav-link' href='#'>
                <svg className='c-icon'></svg>
                &nbsp;Settings
              </a>
            </div>
          </div>
        </header>
      </div>
    </Fragment>
  );
};

Navbar.propTypes = {};

export default Navbar;
