import React from "react";
import "./Balance.css";
import { useState, useEffect, useRef } from "react";
import { useNavigate } from "react-router-dom";
import { findDOMNode } from "react-dom";

import Nav from "../../components/nav/nav";
import CardMoney from "../../components/card-money/card-money";
import CardExpense from "../../components/card-expense/card-expense";
import Button from "../../components/button/button";
import Research from "../../components/research/research";
import Select from "../../components/select/Select";
import CardNewExpense from "../../components/card-new-expense/card-new-expense";
import ButtonCross from "../../components/buttonCross/buttonCross";

const Balance = () => {
  const [selectedTab, setSelectedTab] = useState<string | null>("balance");
  const [selectExpense, setExpense] = useState<string | null>("");
  const ref = useRef(null);

  useEffect(() => {
    const element = findDOMNode(ref.current) as HTMLDivElement;
    if (element) {
      if (selectExpense === "open") {
        element.style.filter = "blur(5px)";
      } else {
        element.style.filter = "none";
      }
    }
  }, [selectExpense]);

  function handleClickNewExpense() {
    setExpense("open");
  }
  function handleClickOnCross() {
    setExpense("");
  }
  function handleClickExpense() {}
  function handleChangeSearch() {}
  function handleClickSelect() {}

  return (
    <div>
      <div className={`${selectExpense === "open" ? "" : "hidden"} `}>
        <CardNewExpense onClickCross={handleClickOnCross} />
      </div>
      <div ref={ref}>
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
                <CardMoney name="test" money="100$" />
              </div>
              <div className="w-full">
                <CardMoney name="test" money="100$" />
              </div>
              <div className="w-full">
                <CardMoney name="test" money="100$" />
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
                <div className="flex gap-4">
                  <div className="w-full">
                    <Research onChange={handleChangeSearch} />
                  </div>

                  <div className="z-40">
                    <Select onClick={handleClickSelect} />
                  </div>
                </div>
                <div className="z-10">
                  <CardExpense onClick={handleClickExpense} />
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
};

export default Balance;
