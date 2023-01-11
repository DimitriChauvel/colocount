import { React } from "react";
import "./buttonCross.css";
import Logo from "../../assets/icons/cancelCross.svg";

function ButtonCross(props) {
  return (
    <div>
      <button className="py-2 px-2 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75">
        <img src={Logo} className="h-4 w-4" />
      </button>
    </div>
  );
}

export default ButtonCross;
