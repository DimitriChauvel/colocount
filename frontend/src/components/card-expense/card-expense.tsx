import { title } from "process";
import React from "react";
import Category from "../../components/category/Category";
const Avatar = require("../../assets/img/avatarDefault.png");

interface Props {
  onClick: (event: React.MouseEvent<HTMLButtonElement>) => void;
  name?: string;
  img?: string;
  title?: string;
  money?: string;
  date?: string;
}

const CardExpense: React.FC<Props> = ({
  name = "Pseudo",
  img = "",
  title = "Title",
  money = "money",
  date = "00/00/0000",
  onClick,
}) => {
  return (
    <div className="text-white overflow-hidden bg-blue p-5 rounded-lg border border-gray-200 shadow-md my-5 flex justify-between ">
      <button onClick={onClick} className="w-full flex">
        <div className="flex flex-col">
          <div className="flex gap-2 items-center">
            <span>{title}</span>
            <Category />
          </div>
          <div className="flex gap-1">
            <span className="mt-20 ">Payed by {name}</span>
            <img
              src={img || Avatar}
              className="rounded-full w-8 h-8 mt-auto"
              alt="DefaultAvatar"
            />
          </div>
        </div>
        <div className="flex flex-col ml-auto">
          <span>{money}</span>
          <span className="mt-24">{date}</span>
        </div>
      </button>
    </div>
  );
};

export default CardExpense;
