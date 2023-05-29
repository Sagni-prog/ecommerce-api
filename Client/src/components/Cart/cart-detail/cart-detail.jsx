import React from "react";

import { selectCart, updateCart } from "../../../app/features/cart/cartSlice";
import {
  selectCartRam,
  updateProductRam,
} from "../../../app/features/cart/cartSliceRam";
import { useSelector } from "react-redux";
import { useDispatch } from "react-redux";

import classes from "./cart-detail.module.css";
import { CartTableDetail } from "../cart-table-detail/cart-table-detail";

export function CartDetail({ edited, setEdited }) {
  const dispatch = useDispatch();
  const cart = useSelector(selectCart);
  const cartRam = useSelector(selectCartRam);
  const updateCartRam = (
    cartProductChanged,
    cartProductIndex,
    updatedQuantity
  ) => {
    dispatch(updateProductRam({ cartProductIndex, updatedQuantity }));
    setEdited(true);
  };
  return (
    <div className={classes.CartDetail}>
      <div className={classes.CartDetailMain}>
        <div className={classes.CartDetailHeader}>
          <p
            className={[
              classes.DetailHeaderData,
              classes.DetailHeaderProduct,
            ].join(" ")}
          >
            product
          </p>
          <p className={classes.DetailHeaderData}>price</p>
          <p
            className={[
              classes.DetailHeaderData,
              classes.DetailHeaderQuantity,
            ].join(" ")}
          >
            quantity
          </p>
          <p className={classes.DetailHeaderData}>tototal</p>
          <p className={classes.DetailHeaderData}>remove</p>
        </div>
        {cart.map((cartProduct, index) => (
          <CartTableDetail
            key={index}
            index={index}
            setEdited={setEdited}
            cartProduct={cartProduct}
            updateCart={updateCartRam}
          />
        ))}
      </div>
      <div className={classes.CartDetailFooter}>
        <button
          className={[classes.Btn, classes.BtnCart, classes.BtnCartUpdate].join(' ')}
          disabled={!edited}
          onClick={(e) => {
            dispatch(updateCart(cartRam));
            setEdited(false);
          }}
        >
          update cart
        </button>
      </div>
    </div>
  );
}
