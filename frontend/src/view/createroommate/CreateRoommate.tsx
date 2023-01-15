import React from "react";
import { useState, useEffect } from "react";
import { useParams } from "react-router-dom";
import Nav from "../../components/nav/nav";
import Input from "../../components/input/input";
import Button from "../../components/button/button";
import ToHome from "../../components/nav/nav";

import { useNavigate } from "react-router-dom";
import CheckLog from "../../controller/log";

import { postFetch } from "../../controller/postFetch";

function CreateRoommate() {
  const navigate = useNavigate();

  useEffect(() => {
    if (CheckLog() === false) {
      navigate("/connexion");
    }
  }, []);

  const handleChange = (
    event: React.ChangeEvent<HTMLInputElement>,
    key: keyof typeof state
  ) => {
    setState({ ...state, [key]: event.target.value });
  };

  const [state, setState] = useState({
    name: "",
    banner_picture: "banner_picture",
  });
  let { method } = useParams();

  async function handleSubmit() {
    if ((await postFetch("/flatshare", state)) === false) {
    } else {
      navigate("/balance");
    }
  }

  return (
    <div>
      <Nav />

      <div className="flex flex-col gap-4 items-center container-register">
        <h1>Create flatshare</h1>
        <div className="flex flex-col gap-2">
          <Input
            onChange={(event) => handleChange(event, "name")}
            placeholder="Title flatshare"
            type="text"
            required={true}
          />
          {/* 
          <Input
            onChange={(event) => handleChange(event, "inviteFlatshare")}
            placeholder="Invite flatshare"
            type="text"
            required={true}
          /> */}
        </div>
        <Button name="Create a flatshare" onClick={handleSubmit} />
      </div>
    </div>
  );
}

export default CreateRoommate;
