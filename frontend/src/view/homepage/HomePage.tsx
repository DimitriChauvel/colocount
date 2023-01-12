import React from "react";
import Nav from "../../components/nav/nav";
import CardGroupe from "../../components/card-groupe/CardGroupe";
import BlockTitle from "../../components/block-title/BlockTitle";
const Homepage = () => {
  return (
    <div>
      <Nav />

      <div className="flex justify-evenly gap-24 my-14">
        <div className="flex flex-col gap-y-12">
          <BlockTitle name="Les groupes" />
          <CardGroupe />
          <CardGroupe />
          <CardGroupe />
        </div>

        <div className="flex flex-col gap-y-12">
          <BlockTitle name="Annonces !" />
          <CardGroupe />
          <CardGroupe />
        </div>
      </div>
    </div>
  );
};

export default Homepage;
