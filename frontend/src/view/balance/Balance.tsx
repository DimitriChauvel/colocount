import React from "react";
import "./Balance.css";
import { useState } from "react";
import { useNavigate } from "react-router-dom";

import Nav from "../../components/nav/nav";
import CardMoney from "../../components/card-money/card-money";
import CardExpense from "../../components/card-expense/card-expense";
import Button from "../../components/button/button";
import Research from "../../components/research/research";

const Balance = () => {
  const [selectedTab, setSelectedTab] = useState<string | null>("balance");

  function handleClickNewExpense() {}
  function handleClickExpense() {}
  function handleChangeSearch() {
    console.log("test");
  }

  return (
    <div>
      <Nav />
      <div className="flex flex-col p-4 m-10  items-center justify-center rounded-xl bg-opacity-50 shadow-lg backdrop-blur-md max-sm:px-8">
        <div className="ml-auto">
          <Button name="New expense" onClick={handleClickNewExpense} />
        </div>
        <div className="mb-4 border-b border-gray-200 dark:border-gray-700 ">
          <ul
            className="flex flex-wrap -mb-px text-sm font-medium text-center"
            id="myTab"
            role="tablist"
          >
            <li className="" role="presentation">
              <button
                className={`inline-block p-4 border-b-4 rounded-t-lg border-blue ${
                  selectedTab === "balance" ? "active" : ""
                }`}
                id="balance-tab"
                type="button"
                role="tab"
                onClick={() => setSelectedTab("balance")}
              >
                Balance
              </button>
            </li>
            <li className="" role="presentation">
              <button
                className={`inline-block p-4 border-b-4 rounded-t-lg border-blue ${
                  selectedTab === "list" ? "active" : ""
                }`}
                id="list-tab"
                type="button"
                role="tab"
                onClick={() => setSelectedTab("list")}
              >
                List of Expenses
              </button>
            </li>
          </ul>
        </div>
        <div id="myTabContent" className="w-full">
          <div
            className={`p-4 rounded-lg ${
              selectedTab === "balance" ? "" : "hidden"
            }`}
            id="balance"
            role="tabpanel"
          >
            <div className="w-full">
              <CardMoney name="test" argent="100$" />
            </div>
            <div className="w-full">
              <CardMoney name="test" argent="100$" />
            </div>
            <div className="w-full">
              <CardMoney name="test" argent="100$" />
            </div>
          </div>
          <div
            className={` p-4 rounded-lg ${
              selectedTab === "list" ? "" : "hidden"
            }`}
            id="list"
            role="tabpanel"
          >
            <div className="w-full">
              <div>
                <Research onChange={handleChangeSearch} />
              </div>
              <CardExpense onClick={handleClickExpense} />
            </div>
          </div>
        </div>
      </div>
    </div>
  );
};

export default Balance;
