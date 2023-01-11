import React, { useState } from "react";
import "./input.css";

interface Props {
  onChange: (event: React.ChangeEvent<HTMLInputElement>) => void;
  placeholder?: string;
  type?: string;
  required?: boolean;
}

const Input: React.FC<Props> = ({
  onChange,
  placeholder,
  type = "text",
  required = false,
}) => {
  const [value, setValue] = useState("");

  return (
    <div className="Input">
      <input
        className="h-10 w-5/5 px-2 rounded-md shadow-lg focus:outline-none hover:ring-2 hover:ring-blue focus:ring-opacity-75
"
        placeholder={placeholder}
        type={type}
        required={required}
        value={value}
        onChange={(event) => {
          setValue(event.target.value);
          onChange(event);
        }}
      ></input>
    </div>
  );
};

export default Input;
