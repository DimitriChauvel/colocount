import { React } from "react";
import { useNavigate } from "react-router-dom";
import "./nav.css";
import Button from "../button/button";

function Nav(props) {
  const navigate = useNavigate();

  function toProfil() {
    navigate("/ParameterUser");
  }

  function toHome() {
    navigate("/");
  }
  const toLogout = () => {
    //sessionStorage.removeItem("user");
    navigate("/Connexion");
  };
  return (
    <div className="flex justify-end p-6 space-x-2 border-b">
      <div onClick={toHome} className="">
        <Button name="Home" />
      </div>
      <div onClick={toProfil} className="">
        <Button name="Profil" />
      </div>
      <div onClick={toLogout} className="">
        <Button name="Logout" />
      </div>
    </div>
  );
}

export default Nav;
