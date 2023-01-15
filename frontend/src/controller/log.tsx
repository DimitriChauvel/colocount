import { useNavigate } from "react-router-dom";

export default function CheckLog() {
  const navigate = useNavigate();

  if (sessionStorage.getItem("user")) {
    return true;
  } else {
    navigate("/connexion");
  }
}
