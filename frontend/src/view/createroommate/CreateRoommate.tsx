import React from "react";
import { useState, useEffect } from "react";
import { useParams } from "react-router-dom";
import Nav from "../../components/nav/nav";
import Input from "../../components/input/input";
import Button from "../../components/button/button";
import ToHome from "../../components/nav/nav";

import { useNavigate } from "react-router-dom";
import CheckLog from "../../controller/log";

const CreateRoommate = () => {
  const navigate = useNavigate();

  useEffect(() => {
    if (CheckLog() === false) {
      navigate("/connexion");
    }
  }, []);

  const [title, setTitle] = useState("");
  const [inviteFlatshare, setInviteFlatshare] = useState("");
  let { method } = useParams();

  let handleSubmit = async (e: any) => {
    e.preventDefault();
    try {
      let res = await fetch("", {
        method: "POST",
        body: JSON.stringify({
          title: title,
          inviteFlatshare: inviteFlatshare,
        }),
      });

      let resJson = await res.json();

      if (res.status === 200 && method === "POST") {
        ToHome();
        setTitle("");
        setInviteFlatshare("");

        console.log("flatshare created successfully");
      } else {
        console.log("Some error occured");
      }
    } catch (err) {
      console.log(err);
    }
  };

  return (
    <div>
      <Nav />

      <div className="flex flex-col gap-4 items-center container-register">
        <h1>Create flatshare</h1>
        <div className="flex flex-col gap-2">
          <Input
            onChange={(e) => setTitle(e.target.value)}
            placeholder="Title flatshare"
            type="text"
            required={true}
          />

          <Input
            onChange={(e) => setInviteFlatshare(e.target.value)}
            placeholder="Invite flatshare"
            type="text"
            required={true}
          />
        </div>
        <Button name="Create a flatshare" onClick={handleSubmit} />
      </div>
    </div>
  );
};

export default CreateRoommate;
