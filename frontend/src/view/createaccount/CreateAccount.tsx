import React from "react";
import { useNavigate } from "react-router-dom";
import { useState } from "react";
import "./CreateAccount.css";

import Button from "../../components/button/button";
import Input from "../../components/input/input";

function CreateAccount() {
  const navigate = useNavigate();

  const [state, setState] = useState({
    email: "",
    password: "",
    firstName: "",
    lastName: "",
  });

  const handleChange = (
    event: React.ChangeEvent<HTMLInputElement>,
    key: keyof typeof state
  ) => {
    setState({ ...state, [key]: event.target.value });
  };

  const handleClickLogin = (event: React.MouseEvent<HTMLButtonElement>) => {
    navigate("/connexion");
  };

  function register() {
    //En cours Attente de l'API
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
        <div className="flex flex-col gap-2">
          <Input
            onChange={(event) => handleChange(event, "firstName")}
            placeholder="First Name"
            type="text"
            required={true}
            key="firstName"
          />
          <Input
            onChange={(event) => handleChange(event, "lastName")}
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
