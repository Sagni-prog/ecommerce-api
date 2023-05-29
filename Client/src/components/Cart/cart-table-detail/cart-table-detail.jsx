import React, { useState } from "react";
import { BsFillTrash3Fill } from "react-icons/bs";

import bag from "../../../assets/images/bags/bag.png";
import { removeProduct } from "../../../app/features/cart/cartSlice";
import { dispatch } from "../../../app/store";
import { removeRamProduct } from "../../../app/features/cart/cartSliceRam";

import classes from "./cart-table-detail.module.css";

export function CartTableDetail({ cartProduct, index, updateCart }) {
  const [quantity, setQuantity] = useState(cartProduct.quantity);

  return (
    <div className={classes.CartDetailTable}>
      <div
        className={[classes.DetailProduct, classes.DetailTableValue].join(" ")}
      >
        <div className={classes.DetailProductImage}>
          <img src={bag} alt="" />
        </div>
        <div className={classes.DetailProductName}>
          may be I may may I being blinded by brighter side
        </div>
      </div>
      <div
        className={[classes.DetailPrice, classes.DetailTableValue].join(" ")}
      >
        <span className={classes.Amount}>128</span> birr
      </div>

      <div
        className={[
          classes.CartQuanitityCounter,
          classes.DetailTableValue,
          classes.DetailTableQuantity,
        ].join(" ")}
      >
        <button
          className={[
            classes.Btn,
            classes.BtnCart,
            classes.BtnCartQauntityAdd,
          ].join(" ")}
          onClick={(e) => {
            setQuantity(quantity - 1);
            updateCart(cartProduct, index, quantity - 1);
          }}
        >
          -
        </button>
        <p className={classes.CartQuantityValue}>{quantity} </p>

        <button
          className={[
            classes.Btn,
            classes.BtnCart,
            classes.BtnCartQauntityAdd,
          ].join(" ")}
          onClick={(e) => {
            setQuantity(quantity + 1);
            updateCart(cartProduct, index, quantity + 1);
          }}
        >
          +
        </button>
      </div>

      <div
        className={[classes.DetailTotal, classes.DetailTableValue].join(" ")}
      >
        <span className={classes.Amount}>128</span> birr
      </div>
      <BsFillTrash3Fill
        className={[
          classes.DetailTableValue,
          classes.DetailBtn,
          classes.DetailBtnRemove,
        ].join(" ")}
        onClick={(e) => {
          dispatch(removeProduct({ index, productId: cartProduct.productId }));
          dispatch(
            removeRamProduct({ index, productId: cartProduct.productId })
          );
        }}
      />
    </div>
  );
}
