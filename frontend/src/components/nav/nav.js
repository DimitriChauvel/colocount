import { React } from "react";
import "./nav.css";

function Nav(props) {
  const navigate = useNavigate();
  const navigateTo = () => {
    navigate("/", props.route);
  };
  return (
    <div class="nav">
      <h2 onClick={navigateTo}>{props.name}</h2>
    </div>
  );
}

export default Nav;
