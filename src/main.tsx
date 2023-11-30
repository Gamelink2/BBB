import logo from './logo.svg';
import './App.css';
import React from 'react';
import 'bootstrap/dist/css/bootstrap.min.css';
var HtmlContent = require('./mapPage.html');


function App() {
  return (
    <div className="App">
      <header className="App-header">
        <img src={logo} className="App-logo" alt="logo" />
          <HtmlContent/>
      </header>
    </div>
  );
}

export default App;
