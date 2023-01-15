import React, { useState, useEffect } from "react";

// interface Props {
//   url: string;
// }

// function getdata({ url }: Props) {
//   const [data, setData] = useState(null);
//   const [error, setError] = useState(null);

export async function getFetch(url: string) {
  try {
    const response = await fetch("http://localhost:1010" + url);
    if (!response.ok) {
      throw new Error(response.statusText);
    }
    const json = await response.json;
    return json;
  } catch (err) {
    console.error(err);
  }
}
// }

//   useEffect(() => {
//     getFetch("http://localhost:1010/maroute/monid%27" + url);
//   }, []);

//   if (error) {
//     return error;
//   }
//   if (!data) {
//     return "No data";
//   }
//   return data;
// }
// export default getdata;
