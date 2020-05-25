import React from 'react';
import ReactDOM from 'react-dom';
import '@coreui/coreui'

// class App extends React.Component {
//     constructor() {
//         super();
//
//         this.state = {
//             entries: []
//         };
//     }
//
//     render() {
//         return ( <div>Hello from React!</div>);
//     }
// }

const App = () => (<div>
    <div className="alert alert-primary" role="alert">
        A simple primary alert—check it out!
    </div><button type="button" className="btn btn-success">Success</button>
    <div className="dropdown">
        <button className="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                data-toggle="dropdown" aria-expanded="false">
            Dropdown button
        </button>
        <div className="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a className="dropdown-item" href="#">Item</a>
            <a className="dropdown-item" href="#">Another Item</a>
            <a className="dropdown-item" href="#">One more item</a>
        </div>
    </div></div>);

ReactDOM.render(<App />, document.getElementById('root'));
