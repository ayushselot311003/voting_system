import React from 'react'
import {BrowserRouter as Router,Route,Routes,Link,Navigate} from "react-router-dom";

import './App.css';
import axios from "axios";
import { useNavigate } from "react-router-dom";
import { useState } from "react";
import $ from "jquery";


export default function Home() {
  const navigate = useNavigate();

  const [inputs1, setInputs1] = useState({});
  

  const handleChange1 = (event) => {
      const name = event.target.name;
      const value = event.target.value;
      setInputs1(values => ({...values, [name]: value}));
  }
  

  const handleSubmit1 = (event) => {
    
      event.preventDefault();
      const formData1 = new FormData();
for (const key in inputs1) {
    console.log(key);
    console.log(inputs1[key]);
  formData1.append(key, inputs1[key]);
}
  

      console.log(inputs1);
      console.log(formData1);

     axios.post('http://localhost:8090/voting/PHPlogin/login', inputs1,{headers:{'Content-Type':'application/json'}}, {withCredentials: true }).then(function(response1){
        
        console.log(response1.data);
        console.log(response1.data.success);
        
        if (response1.data.success) {
          if(response1.data.message=='admin')
            {
              window.location.href = "http://localhost:8090/voting/PHPlogin/admin.php";
            }
            else{
          window.location.href = "http://localhost:8090/voting/PHPdashboard/dashboard2.php";
            }
          //<Link to='/dashboard'></Link> 
          //alert(response1.data.message);
          //window.location.href = "http://localhost:3000/dashboard";
          //<Link to='/dashboard'></Link> 
        } 
        else {
        alert('Invalid');
         
        window.location.href = "http://localhost:3000";
        }
         
      });
    }
      
 
  return (
    <div className=' bg-dark a'>
    <div className='b'>
    <h1>Voting System</h1>
   
    </div>
    <div className='bg-info py-4'>
      <h2 className='text-center'>Login</h2>
      <div className='container text-center'>
        <form action="http://localhost:8090/voting/PHPlogin/login" method="POST" onSubmit={(event) => handleSubmit1(event)}>
          <div className='mb-3'>
            <input type="text" className='form-control w-50 m-auto' name="username" placeholder='Enter your username' required="required" id="username"  onChange={(event) => handleChange1(event)}>
            </input>
          </div>
          <div className='mb-3'>
            <input type="text" className='form-control w-50 m-auto' name="mobile" placeholder='Enter your mobile number' required="required" maxLength="10" minLength="10" pattern="[0-9]{10}" onChange={(event) => handleChange1(event)}>
            </input>
          </div>
          <div className='mb-3'>
            <input type="password" className='form-control w-50 m-auto' name="password" placeholder='Enter your password' required="required" onChange={(event) => handleChange1(event)}>
            </input>
          </div>
          <div className='mb-3'>
            <select name="std" className='form-select w-50 m-auto' onChange={(event) => handleChange1(event)}>
            <option value="select">Select</option>
            <option value="admin">Admin</option>
              <option value="group">Group</option>
              <option value="voter">Voter</option>
            </select>
          </div>
          <button type="submit" className='btn btn-dark my-4'>Login</button>
          </form>
          <p>Don't have an account?
           
          
            
             
             
             
            <Link to="/register">Register here</Link>
           
            </p>
        
      </div>
     
      </div>

   </div>
  )
}
