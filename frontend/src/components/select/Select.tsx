import React from "react";
import { useState } from "react";

interface Props {
  onClick: (event: React.MouseEvent<HTMLButtonElement>) => void;
  name?: string;
  category?: string;
}

const Button: React.FC<Props> = ({ onClick, name = "Button" }) => {
  //const [value, setValue] = useState("");
  const [isOpen, setIsOpen] = useState(false);

  const handleClick = () => {
    setIsOpen(!isOpen);
  };
  return (
    <div className="text-white z-20 relative">
      <button
        id="dropdownDefaultButton"
        className="bg-orange hover:bg-orange-800 max-h-14 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex h-full items-center dark:bg-orange-600 dark:hover:bg-orange-700 dark:focus:ring-orange-800"
        type="button"
        onClick={handleClick}
      >
        Select category
      </button>
      {isOpen && (
        <div className="bg-orange flex flex-col rounded-lg mt-1 gap-1 p-2 absolute w-full">
          <a href="#">Work in progress</a>
        </div>
      )}
    </div>
  );
};

export default Button;
