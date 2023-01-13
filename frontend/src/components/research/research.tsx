import React, { useState } from "react";
import Button from "../../components/button/button";
import Search from "../../assets/icons/search";

interface Props {
  onChange: (event: React.ChangeEvent<HTMLInputElement>) => void;
  placeholder?: string;
  type?: string;
  required?: boolean;
}

const Research: React.FC<Props> = ({ onChange }) => {
  const [value, setValue] = useState("");

  function handleClickSearch() {
    console.log("test");
  }

  return (
    <form>
      <div className="flex bg-blue rounded-lg p-2">
        <div className="self-center">
          <Search />
        </div>
        <input
          type="search"
          id="default-search"
          className="w-full mx-2 rounded-lg px-4"
          placeholder="Search"
        ></input>
        <Button onClick={handleClickSearch} name="Search" />
      </div>
    </form>
  );
};

export default Research;
