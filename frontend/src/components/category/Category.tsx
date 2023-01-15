import React from "react";

interface Props {
  name?: string;
}

const Category: React.FC<Props> = ({ name = "Category" }) => {
  return (
    <div className="py-2 px-4 bg-orange text-white font-semibold rounded-3xl shadow-md hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-orange-400 focus:ring-opacity-75">
      {name}
    </div>
  );
};

export default Category;
