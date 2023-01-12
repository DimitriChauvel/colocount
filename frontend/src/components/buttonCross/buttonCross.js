import { React } from "react";
import "./buttonCross.css";
import Logo from "../../assets/icons/cancelCross.svg";

function ButtonCross(props) {
  return (
    <div>
      <button className="py-2 px-2 orange-bg text-white font-semibold rounded-md shadow-md hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-orange-400 focus:ring-opacity-75">
        <img src={Logo} className="h-4 w-4" />
      </button>
    </div>
  );
}

export default ButtonCross;
