import React, { useState } from "react";
import "./card-new-expense.css";

import ButtonCross from "../buttonCross/buttonCross";
import Input from "../input/input";
import Button from "../button/button";

interface Props {
  title?: string;
  name?: string;
  img?: string;
  money?: string;
  category?: string;
  onClickCross: (event: React.MouseEvent<HTMLButtonElement>) => void;
  onClickNewExpense: (state: any) => void;
}

const CardNewExpense: React.FC<Props> = ({
  title = "Title",
  name = "Pseudo",
  img = "",
  money = "",
  onClickCross,
  onClickNewExpense,
}) => {
  const [state, setState] = useState({
    name: "",
    sum: "",
    category_id: "",
  });

  const handleChange = (
    event: React.ChangeEvent<HTMLInputElement>,
    key: keyof typeof state
  ) => {
    setState({ ...state, [key]: event.target.value });
  };
  // function handleChangeCategory() {}
  // function handleChangePrice() {}
  // function handleChangeTitle() {}
  //function handleClickNewExpense() {}

  return (
    <div className="absolute z-50 card-expense bg-blue h-2/3 w-2/3 rounded-lg flex flex-col justify-between">
      <div className="flex justify-end m-4">
        <ButtonCross onClick={onClickCross} />
      </div>
      <div className="flex flex-col items-center gap-2">
        <Input
          onChange={(event) => handleChange(event, "name")}
          type="text"
          placeholder="Title"
        />
        <Input
          onChange={(event) => handleChange(event, "sum")}
          type="text"
          placeholder="Price"
        />
        <Input
          onChange={(event) => handleChange(event, "category_id")}
          type="text"
          placeholder="Category"
        />
      </div>
      <div className="flex justify-end m-4">
        <Button onClick={() => onClickNewExpense(state)} name="New Expense" />
      </div>
    </div>
  );
};

export default CardNewExpense;
