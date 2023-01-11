import { React } from "react";
import { useNavigate } from "react-router-dom";
import "./nav.css";
import Button from "../button/button";
import ButtonCross from "../buttonCross/buttonCross";

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
    <div className="flex justify-end m-4 space-x-2">
      <div>
        <ButtonCross />
      </div>
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
