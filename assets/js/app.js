import React from 'react';
import ReactDOM from 'react-dom';


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

const App = () => (<div>Hello from React!</div>);

ReactDOM.render(<App />, document.getElementById('root'));
