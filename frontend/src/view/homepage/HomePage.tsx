import React, { useState } from "react";
import { useNavigate } from "react-router-dom";
import Nav from "../../components/nav/nav";
import CardGroupe from "../../components/card-groupe/CardGroupe";
import BlockTitle from "../../components/block-title/BlockTitle";

const Homepage = () => {
  const navigate = useNavigate();

  function handleCreateFlatsharing() {
    navigate("/createroommate");
  }

  return (
    <div>
      <Nav />
      <div className="flex justify-evenly gap-24 my-14">
        <div className="flex flex-col gap-y-12">
          <BlockTitle name="Les groupes" />

          <button
            className="w-80 h-32 py-2 px-4 text-center text-white font-semibold rounded-md shadow-md focus:outline-none hover:ring-2 hover:ring-orange focus:ring-opacity-75"
            onClick={handleCreateFlatsharing}
          ><i className=" bg-orange ri-add-fill"></i></button>
        </div>

        <div className="flex flex-col gap-y-12">
          <BlockTitle name="Annonces !" />
        </div>
      </div>
    </div>
  );
};

export default Homepage;
