import React from "react";
import "./button.css";

interface Props {
  onClick: (event: React.MouseEvent<HTMLButtonElement>) => void;
  name?: string;
}

const Button: React.FC<Props> = ({ onClick, name = "Button" }) => {
  //const [value, setValue] = useState("");
  return (
    <button
      onClick={onClick}
      className="py-2 px-4 bg-orange text-white font-semibold rounded-md shadow-md hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-orange-400 focus:ring-opacity-75"
    >
      {name}
    </button>
  );
};

export default Button;
