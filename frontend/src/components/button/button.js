import { React } from "react";
import "./button.css";

function Button(props) {
  //const navigate = useNavigate();
  const navigatetoLogin = () => {};
  return (
    <button class="py-2 px-4 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75">
      Save changes
    </button>

    // <div class="button">

    //   <h2 onClick>{props.name}</h2>
    // </div>
  );
}

export default Button;
