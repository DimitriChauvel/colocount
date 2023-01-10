import { BrowserRouter, Routes, Route } from "react-router-dom";
import Balance from './view/balance/Balance'
import HomePage from './view/homepage/HomePage'
import Connexion from './view/connexion/Connexion'
import CreateAccount from './view/createaccount/CreateAccount'
import Profil from './view/profil/Profil'
import CreateRoommate from './view/createroommate/CreateRoommate'
import ParamaterUser from './view/parameter/ParameterUser'

export default function App() {
  return (
    <div className="App">
      <BrowserRouter>
        <Routes>
          <Route path="/" element={<HomePage />} />
          <Route path="/*" element={<HomePage />} />
          <Route path="/CreateAccount" element={<CreateAccount />} />
          <Route path="/Connexion" element={<Connexion />} />
          <Route path="/Profil" element={<Profil />} />
          <Route path="/CreateRoommate" element={<CreateRoommate />} />
          <Route path="/Balance" element={<Balance />} />
          <Route path="/ParameterUser" element={<ParamaterUser />} />
        </Routes>
      </BrowserRouter>
    </div>
  );
}
