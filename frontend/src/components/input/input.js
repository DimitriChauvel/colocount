import { React } from "react";
import "./input.css";

function Input(props) {
  return (
    <div class="Input">
      <input className=" h-10 w-1/5 border-blue px-2 rounded-md" placeholder={props.name} required="required"></input>
    </div>
  );
}

export default Input;
