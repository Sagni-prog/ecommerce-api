import React, { useEffect } from "react";
import { useSelector } from "react-redux";
import { NavLink } from "react-router-dom";

// Icons
import { CiSearch } from "react-icons/ci";
import { AiOutlineShoppingCart } from "react-icons/ai";
import { BiUser } from "react-icons/bi";

import { selectCart } from "../../../app/features/cart/cartSlice";
import { useDispatch } from "react-redux";
import { fetchProduct } from "../../../app/features/products/productSlice";

import NavList from "./NavList/nav-list";
import { Logo, Toggle, Overlay } from "../../Ui/index";

import classes from "./Nav.module.css";
import { useState } from "react";

export const Nav = () => {
  const cart = useSelector(selectCart);
  const [showNav, setShowNav] = useState(false);

  const dispatch = useDispatch();

  useEffect(() => {
    dispatch(fetchProduct());
  }, []);

  const toggleHandler = (e) => {
    setShowNav(!showNav);
  };

  return (
    <nav className={classes.Nav}>
      <Toggle show={showNav} clicked={toggleHandler} />
      <Logo />
      <NavList show={showNav} />
      <Overlay show={showNav} clicked={toggleHandler} />

      <ul className={classes.NavIcons}>
        <CiSearch className={classes.Icons} />
        <NavLink to="/cart">
          <div className={classes.Cart}>
            <AiOutlineShoppingCart className={classes.Icons} />
            <div className={classes.CartCount}>{cart.length}</div>
          </div>
        </NavLink>
        <BiUser className={classes.Icons} />
      </ul>
    </nav>
  );
};
