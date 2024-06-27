import logo from './logo.svg';
import './App.css';
import 'bootstrap/dist/css/bootstrap.min.css';
import {BrowserRouter as Router,Route,Routes,Link,Navigate} from "react-router-dom";
import register from './register'
import dashboard from './dashboard'
import logout from './logout'

import Home from './Home'

import {Component} from 'react';

function App() {
  return (
    <Router>
        <Routes>
          <Route path="/" exact Component={Home}></Route>
          <Route path="/register" exact Component={register}></Route>
          <Route path="/dashboard" exact Component={dashboard}></Route>
          <Route path="/logout" exact Component={logout}></Route>
          

   </Routes>
   </Router>
  );
}

export default App;
