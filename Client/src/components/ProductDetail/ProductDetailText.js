import store from "../../app/store";
import { addProduct } from "../../app/features/cart/cartSlice";
import { addProductRam } from "../../app/features/cart/cartSliceRam";
import { useState } from "react";
export default ({
  quantity,
  productSelected,
  handleOnAddQuantity,
  handleOnSubQuantity,
  existenceError,
  setExistenceError,
}) => {
  let errorTimer;
  const carts = store.getState().cart;
  const dispatch = store.dispatch;

  const handleAddToCart = () => {
    {
      dispatch(addProduct({ product: productSelected }));
      dispatch(addProductRam({ product: productSelected }));
    }
  };
  return (
    <div className="product_detail_right detail_text">
      <div className="product_name">{productSelected.name} </div>
      <div className="product_catagory"> {productSelected.catagory} </div>
      <div className="product_price">
        <span className="old_price">{productSelected.price * 1.3} birr</span>
        {productSelected.price} birr
      </div>
      <div className="product_description">{productSelected.description}</div>
      <div className="product_detail_add">
        <div className="quanitity_counter">
          <button
            disabled={quantity == 1 ? true : false}
            className="btn quantity_btn quantity_btn-minus"
            onClick={handleOnSubQuantity}>
            -
          </button>
          <p className="quantity_value">{quantity} </p>
          <button
            disabled={quantity == productSelected.maxQuantity ? true : false}
            className="btn quantity_btn quantity_btn-add"
            onClick={handleOnAddQuantity}>
            +
          </button>
        </div>
        <button
          disabled={quantity == productSelected.maxQuantity ? true : false}
          className="btn btn_product_detail btn_product_detail-tocart"
          onClick={handleAddToCart}>
          Add to Cart{" "}
        </button>
      </div>
      <div className="product_properties">
        {productSelected.properties.map((property) => (
          <div className="product_property">
            <span className="propery_name">{property.name} :</span>
            <span className="propery_value">{property.value} </span>
          </div>
        ))}
      </div>
    </div>
  );
};
