import Nav from "../../components/nav/nav";
import { useNavigate } from "react-router-dom";
import CheckLog from "../../controller/log";
import React, { useEffect } from "react";

const ParameterUser = () => {
  const navigate = useNavigate();

  useEffect(() => {
    if (CheckLog() === false) {
      navigate("/connexion");
    }
  }, []);
  return (
    <div>
      <Nav />
      params
    </div>
  );
};

export default ParameterUser;
