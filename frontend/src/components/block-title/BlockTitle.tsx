import React from "react";

export default function BlockTitle(props: any) {
  return (
    <div className="w-80 py-2 px-4 text-center bg-blue text-white font-semibold rounded-md shadow-md focus:outline-none focus:ring-2 focus:ring-orange focus:ring-opacity-75">
      {props.name}
    </div>
  );
}
