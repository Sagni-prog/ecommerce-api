import React, { useState } from "react";

import bag from "../../assets/images/bags/bag.png";
import wallet from "../../assets/images/catagories/wallet.jpg";
import bag2 from "../../assets/images/bags/bag2.png";
import purse from "../../assets/images/shoes/banner7.jpg";

import "./ProductDetail.css";
import ProductDetailImage from "./ProductDetailImage";
import ProductDetailText from "./ProductDetailText";
import store from "../../app/store";

export default function ProductDetail() {
  const productSelected = store.getState().productSelected;
  const [quantity, setQuantity] = useState(1);
  const [image, setImage] = useState(productSelected.images[0]);
  const [currentIndex, setIndex] = useState(0);
  const [existenceError, setExistenceError] = useState(false);

  const handleOnAddQuantity = () => {
    if (quantity == productSelected.maxQuantity) return;
    setQuantity(quantity + 1);
  };

  const handleOnSubQuantity = () => {
    if (quantity == 0) return;
    setQuantity(quantity - 1);
  };

  return (
    <>
      <section className="section section_product_detail">
        {existenceError ? (
          <p className="existence_error">
            product already added to your cart !
          </p>
        ) : null}
        <ProductDetailImage
          image={image}
          images={productSelected.images}
          currentIndex={currentIndex}
          setImage={setImage}
          setIndex={setIndex}
        />

        <ProductDetailText
          existenceError={existenceError}
          setExistenceError={setExistenceError}
          quantity={quantity}
          productSelected={productSelected}
          handleOnAddQuantity={handleOnAddQuantity}
          handleOnSubQuantity={handleOnSubQuantity}
        />
      </section>
    </>
  );
}
