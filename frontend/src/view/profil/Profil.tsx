import React from "react";
import { useState } from "react";
import { useParams } from "react-router-dom";
import Nav from "../../components/nav/nav";
import Input from "../../components/input/input";
import Button from "../../components/button/button";
import CardInfoProfil from "../../components/card-info-profil/CardInfoProfil";
import ToHome from '../../components/nav/nav'

const Profil = () => {
  const [lastname, setLastname] = useState("");
  const [firstname, setFirstname] = useState("");
  const [email, setEmail] = useState("");
  const [password, setPassword] = useState("");
  const [mobileNumber, setMobileNumber] = useState("");
  let { method } = useParams();


  let modifyAccount = async (e: any) => {
    e.preventDefault();
    try {
      let res = await fetch("", {
        method: "POST",
        body: JSON.stringify({
          firstname: firstname,
          lastname: lastname,
          email: email,
          password: password,
          mobileNumber: mobileNumber,
        }),
      });
      let resJson = await res.json();
      if (res.status === 200 && method === 'POST') {
        ToHome()
        console.log("User created successfully");
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

      <div className="flex gap-4 container-register justify-center">

        <div className="flex">
          <CardInfoProfil/>
        </div>


        <div className="m-4">
          <form onSubmit={modifyAccount}>
            <div className="flex flex-col items-center gap-4 ">
              <h1>Modify account</h1>
              <div className="flex flex-col gap-2">
                <Input
                  onChange={(e) => setFirstname(e.target.value)}
                  placeholder="Firstname"
                  type="text"
                  required={true}
                />

                <Input
                  onChange={(e) => setLastname(e.target.value)}
                  placeholder="Lastname"
                  type="text"
                  required={true}
                />

                <Input
                  onChange={(e) => setEmail(e.target.value)}
                  placeholder="Email"
                  type="text"
                  required={true}
                />

                <Input
                  onChange={(e) => setPassword(e.target.value)}
                  placeholder="Password"
                  type="password"
                  required={true}
                />

                <Input
                  onChange={(e) => setMobileNumber(e.target.value)}
                  placeholder="Mobile"
                  type="text"
                  required={true}
                />
              </div>
              <Button onClick={modifyAccount} name="Modifier le compte" />
            </div>
          </form>
        </div>
      </div>
    </div>
  );
};

export default Profil;
