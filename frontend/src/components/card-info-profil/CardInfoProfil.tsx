import React, { useEffect } from "react";
import { useState } from "react";

export default function CardInfoProfil() {
  const [data, setData] = useState([]);

  useEffect(() => {
    fetch("api/post/infoprofil")
      .then((response) => response.json())
      .then(setData);
  }, []);

  return (
    <div>
      {data.map((element) => (
        <button
          // key={element.id}
          className="w-80 h-32 py-2 px-4 text-center text-white font-semibold rounded-md shadow-md focus:outline-none hover:ring-2 hover:ring-blue focus:ring-opacity-75"
        >
            
          {/* {element.firstname}
          {element.lastname}
          {element.email}
          {element.mobile}
          {element.banner_picture} */}
        </button>
      ))}
    </div>
  );
}
