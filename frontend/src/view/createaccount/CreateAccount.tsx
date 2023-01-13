import React from "react";
import { useNavigate } from "react-router-dom";
import { useState } from "react";
import "./CreateAccount.css";

import Button from "../../components/button/button";
import Input from "../../components/input/input";
import AddImage from "../../components/addImage/addImage";

function CreateAccount() {
  const navigate = useNavigate();

  const [state, setState] = useState({
    email: "",
    password: "",
    firstname: "",
    lastname: "",
  });

  const postData = async(url: string, data: any) => {
        const response = await fetch(url, {
            method: 'POST', 
            body: JSON.stringify(data)
        });
        const json = await response.json();
        return json;
};


  const handleChange = (
    event: React.ChangeEvent<HTMLInputElement>,
    key: keyof typeof state
  ) => {
    setState({ ...state, [key]: event.target.value });
  };

  const handleClickLogin = (event: React.MouseEvent<HTMLButtonElement>) => {
    navigate("/connexion");
  };
  const handleClickImage = (event: React.MouseEvent<HTMLButtonElement>) => {

  }

  function register() {
    postData('http://localhost:1010/users', state)
    sessionStorage.setItem("user", state.email);
  }

  return (
    <div>

      {" "}
      <div className="flex justify-end m-4">

        <Button name="Login" onClick={handleClickLogin} />
      </div>
      <div className="flex flex-col gap-4 items-center container-register">
        <h1>Register</h1>
        <div className="flex flex-col gap-2 items-center">
          <AddImage onClick={handleClickImage}
          />
          <Input
            onChange={(event) => handleChange(event, "firstname")}
            placeholder="First Name"
            type="text"
            required={true}
            key="firstName"
          />
          <Input
            onChange={(event) => handleChange(event, "lastname")}
            placeholder="Last Name"
            type="text"
            required={true}
          />
          <Input
            onChange={(event) => handleChange(event, "email")}
            placeholder="Email"
            type="text"
            required={true}
          />
          <Input
            onChange={(event) => handleChange(event, "password")}
            placeholder="Password"
            type="password"
            required={true}
          />
        </div>

        <div>
          <Button name="Register" onClick={register} />
        </div>
      </div>
    </div>
  );
}

export default CreateAccount;
