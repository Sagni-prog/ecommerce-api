import React from "react";
import Bag from "../../../assets/images/bags/bag.png";

import classes from "./Optional.module.css";

export function Optional() {
  return (
    <section className={classes.Optional}>
      <div className={classes.OptionalLeft}>
        <img src={Bag} alt="" />
      </div>
      <div className={classes.OptionalRight}>
        <div className={classes.OptionalHeader}>
          Weekly Sale on 60% Off All Products
        </div>
        <div className={classes.OptionalCounter}>
          <div className={classes.CounterInfo}>
            <p className={classes.CounterInfoName}>days </p>
            <p className={classes.CounterInfoValue}>{12}</p>
          </div>
          <div className={classes.CounterInfo}>
            <p className={classes.CounterInfoName}>hour</p>
            <p className={classes.CounterInfoValue}>{23}</p>
          </div>
          <div className={classes.CounterInfo}>
            <p className={classes.CounterInfoName}>minutes </p>
            <p className={classes.CounterInfoValue}>{34}</p>
          </div>
          <div className={classes.CounterInfo}>
            <p className={classes.CounterInfoName}>seconds </p>
            <p className={classes.CounterInfoValue}>{12}</p>
          </div>
        </div>
        <form className={classes.OptionalForm}>
          <div className={classes.OptionalFormHeader}>
            interested in discount ?
          </div>
          <button className={classes.OptionalBtn}>buy now </button>
        </form>
      </div>
    </section>
  );
}
