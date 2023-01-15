import { useNavigate } from "react-router-dom";

export default function CheckLog() {
  if (sessionStorage.getItem("user")) {
    return true;
  } else {
    return false;
  }
}
