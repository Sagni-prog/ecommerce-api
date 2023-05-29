import { useRef, useState } from "react";
import { useNavigate } from "react-router";

import { addProduct } from "../../../app/features/cart/cartSlice";
import { addProductRam } from "../../../app/features/cart/cartSliceRam";
import { selectProduct } from "../../../app/features/products/productDetalSlice";

import store from "../../../app/store";

import classes from "./Featured-item.module.css";

const dispatch = store.dispatch;

function FeaturedItem({ product, index }) {
  //   let errorTimer;

  const navigate = useNavigate();
  const image = useRef();
  //   const carts = store.getState().cart;

  const [existenceError, setExistenceError] = useState(false);

  const handleAddToCart = () => {
    dispatch(addProduct({ product }));
    dispatch(addProductRam({ product }));
  };

  const handleDetail = () => {
    navigate("/detail");
    dispatch(selectProduct(product));
  };

  if (!product) return null;

  return (
    <div className={classes.Container}>
      {existenceError ? (
        <p className={classes.Error}>product already added to your cart !</p>
      ) : null}

      <div className={classes.ImgCon}>
        <img
          className={classes.Img}
          src={product.images[0]}
          onClick={handleDetail}
          alt=""
          ref={image}
        />
        <button className={classes.BtnCart} onClick={handleAddToCart}>
          Add to Cart
        </button>
      </div>
      <div>
        <p className={classes.ProductTitle} onClick={handleDetail}>
          Leather Bag
        </p>
        <p className={classes.ProductDesc}>
          A comfortable and ligntweight leather bag
        </p>
        <p className={classes.ProductPrice}>
          <del>$100 ETB</del>
          $75.00 ETB
        </p>
      </div>
    </div>
  );
}

export default FeaturedItem;
