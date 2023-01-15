import { useState } from "react";
import { useNavigate } from "react-router-dom";
import "./Connexion.css";

import Button from "../../components/button/button";
import Input from "../../components/input/input";

const errEmail = () => {};

const errPassword = () => {};

function Login() {
  const navigate = useNavigate();

  const [errEmail, seterrEmail] = useState([]);
  const [errPassword, seterrPassword] = useState([]);

  const [state, setState] = useState({
    email: "",
    password: "",
  });

  const handleChange = (
    event: React.ChangeEvent<HTMLInputElement>,
    key: keyof typeof state
  ) => {
    setState({ ...state, [key]: event.target.value });
  };

  const handleClickRegister = (event: React.MouseEvent<HTMLButtonElement>) => {
    navigate("/createaccount");
  };

  function connect() {
    sessionStorage.setItem("user", state.email);
  }

  return (
    <div id="login">
      <div className="flex justify-end m-4">
        <Button name="Register" onClick={handleClickRegister} />
      </div>
      <div className="flex flex-col gap-4 items-center container-login">
        <h1>Login</h1>
        <div className="flex flex-col gap-2">
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
          <Button name="Sign in" onClick={connect} />
        </div>
        <div id="error">
          {errEmail}
          {errPassword}
        </div>
      </div>
    </div>
  );
}

export default Login;
