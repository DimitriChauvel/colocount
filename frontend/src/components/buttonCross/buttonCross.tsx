import React from "react";
import "./buttonCross.css";
import Cross from "../../assets/icons/cancelCross";

interface Props {
  onClick: (event: React.MouseEvent<HTMLButtonElement>) => void;
}

const ButtonCross: React.FC<Props> = ({ onClick }) => {
  return (
    <div>
      <button
        onClick={onClick}
        className="py-2 px-2 bg-orange text-white font-semibold rounded-md shadow-md hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-orange-400 focus:ring-opacity-75"
      >
        <div className="h-4 w-4">
          <Cross />
        </div>
        {/* <img src={Logo} className="h-4 w-4" /> */}
      </button>
    </div>
  );
};

export default ButtonCross;
