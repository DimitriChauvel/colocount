import { React } from "react";
import "./button.css";

function Button(props) {
  return (
    <button className="py-2 px-4 orange-bg text-white font-semibold rounded-md shadow-md hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-orange-400 focus:ring-opacity-75">
      {props.name}
    </button>
  );
}

export default Button;
