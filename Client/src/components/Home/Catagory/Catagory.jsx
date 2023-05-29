import React from "react";

import classes from "./Catagory.module.css";
import CatagoryItem from "./catagory-item";

import Jacket from "../../../assets/images/catagories/jacket.jpg";
import Shoe from "../../../assets/images/catagories/shoe.jpg";
import Belt from "../../../assets/images/catagories/belt.jpg";
import Bag from "../../../assets/images/catagories/bag.jpg";
import Wallet from "../../../assets/images/catagories/wallet.jpg";

const categoryData = [
  {
    title: "Clothes",
    image: Jacket,
  },
  {
    title: "Shoes",
    image: Shoe,
  },
  {
    title: "Belts",
    image: Belt,
  },
  {
    title: "Bags",
    image: Bag,
  },
  {
    title: "Wallets",
    image: Wallet,
  },
  {
    title: "Bags",
    image: Bag,
  },
];

export const Catagory = () => {
  return (
    <section className={classes.Catagory}>
      <h1 className={classes.CatagoryTitle}>Category</h1>

      <div className={classes.Container}>
        {categoryData.map((item) => (
          <CatagoryItem src={item.image} alt={item.title}>
            {item.title}
          </CatagoryItem>
        ))}
      </div>
    </section>
  );
};
