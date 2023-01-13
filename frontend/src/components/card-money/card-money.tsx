import React from "react";
import ArrowRight from "../../assets/icons/arrowRight";
const Avatar = require("../../assets/img/avatarDefault.png");

interface Props {
  name?: string;
  img?: string;
  argent?: string;
}

const CardMoney: React.FC<Props> = ({
  name = "Pseudo",
  argent = "",
  img = "",
}) => {
  return (
    <div className="overflow-hidden bg-blue p-5 rounded-lg border border-gray-200 shadow-md mb-5 flex justify-between ">
      <div className="flex gap-1">
        <img
          src={img || Avatar}
          className="rounded-full w-24 h-24"
          alt="DefaultAvatar"
        />
        <span className="mt-20 text-white">{name}</span>
      </div>
      <div className="text-center">
        <div className="w-24 h-24 ">
          <ArrowRight />
        </div>
        <span className="text-white">{argent}</span>
      </div>

      <div className="flex gap-1 right">
        <img
          src={img || Avatar}
          className="rounded-full w-24 h-24"
          alt="arrow"
        />
        <span className="mt-20 text-white">{name}</span>
      </div>
    </div>
  );
};

export default CardMoney;
