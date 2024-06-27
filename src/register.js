import React from 'react'
import {BrowserRouter as Router,Route,Routes,Link,Navigate} from "react-router-dom";
import axios from "axios";
import { useNavigate } from "react-router-dom";



import './App.css';
import { useState } from "react";
import $ from "jquery";


export default function Register() {
    /*const [username, setName] = useState("");
      const [result, setResult] = useState("");
   
      const handleChange = (e) => {
          setName(e.target.value);
      };
   
      const handleSubmit = (e) => {
          e.preventDefault();
          console.log(username);
          const form = $(e.target);
          $.ajax({
              type: "POST",
              url: form.attr("action"),
              data: form.serialize(),
              success(data) {
                  setResult(data);
              },
          });
      };*/
      const navigate = useNavigate();

      const [inputs, setInputs] = useState({});
      const [file, setFile] = useState(null);
  
      const handleChange = (event) => {
          const name = event.target.name;
          const value = event.target.value;
          setInputs(values => ({...values, [name]: value}));
      }
      const handleFileChange = (event) => {
        setFile(event.target.files[0]);
      }
    
      const handleSubmit = (event) => {
        
          event.preventDefault();
          const formData = new FormData();
    for (const key in inputs) {
        console.log(key);
        console.log(inputs[key]);
      formData.append(key, inputs[key]);
    }
    if (file) {
      formData.append('image', file);
    }
          console.log(inputs);
          console.log(formData);
  
         axios.post('http://localhost:8090/voting/PHP/register', formData,{headers:{'Content-Type':'multipart/form-data'}}).then(function(response){
            if(inputs['password']!=inputs['cpassword'])
                {
                    alert("Password does not match");
                    window.location.href='http://localhost:3000/register';
                }  
            console.log(response.data);
              navigate('/');
          });
          
      }
    return (
        <div className="bg-dark a">
          <div className='b'>
    <h1>Voting System</h1>
   
    </div>
            <div className="bg-info py-2">
                <h2 className="text-center">Register Account</h2>
                <div className="container text-center">
                    <form action="http://localhost:8000/register.php" method="POST" encType='multipart/form-data' onSubmit={(event) => handleSubmit(event)}>
                            
                        <div className='mb-3'>
                            <input type="text" className='form-control w-50 m-auto' name="username" placeholder='Enter your username' required="required" id="username"  onChange={(event) => handleChange(event)}>
                            </input>
                        </div>
                        <div className='mb-3'>
                            <input type="text" className='form-control w-50 m-auto' name="mobile" placeholder='Enter your mobile number' required="required" maxLength="10" minLength="10" pattern="[0-9]{10}" id="mobile" onChange={(event) => handleChange(event)}>
                            </input>
                        </div>
                        <div className='mb-3'>
                            <input type="password" className='form-control w-50 m-auto' name="password" placeholder='Enter your password' required="required" onChange={(event) => handleChange(event)}>
                            </input>
                        </div>
                        <div className='mb-3'>
                            <input type="password" className='form-control w-50 m-auto' name="cpassword" placeholder='Confirm password' required="required" onChange={(event) => handleChange(event)}>
                            </input>
                        </div>
                        <div className='mb-3'>
                            <input type="file" className="form-control w-50 m-auto" name="photo" onChange={(event) => handleFileChange(event)}> 
                                
                            </input>
                        </div>
                        <div className='mb-3'>
                            <select name="std" className='form-select w-50 m-auto' onChange={(event) => handleChange(event)}>
                            <option value="select">Select</option>
                                <option value="group">Group</option>
                                <option value="voter">Voter</option>
                            </select>
                        </div>
                        
                        <button type="submit" className='btn btn-dark my-4'>Register</button>
                        
                        

                        <p>
                            Already have an Account?
                            <Link to="/">Login here</Link>
                        </p>
                    </form>
                </div>
            </div>
        </div>    
    );
}



