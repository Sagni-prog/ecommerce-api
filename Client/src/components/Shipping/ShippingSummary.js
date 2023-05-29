import store from "../../app/store";
import { useEffect, useState } from "react";
import ShippigOrder from "./ShippigOrder";
import { useSelector } from "react-redux";
import { selectCart } from "../../app/features/cart/cartSlice";
export default () => {
  const cart = useSelector(selectCart);
  const [totalPrice, setTotalPrice] = useState(0);
  useEffect(() => {
    createSummary();
  });
  const createSummary = () => {
    if (cart.length > 0) {
      let total = 0;
      cart.forEach((cartProduct) => {
        total += cartProduct.price * cartProduct.quantity;
      });
      setTotalPrice(total);
    }
  };
  useEffect(() => {
    createSummary();
  }, []);
  return (
    <div className="shipping_summary">
      <p className="shiping_title">your order</p>
      <div className="shiping_orders">
        {cart.map((cartProduct, index) => (
          <ShippigOrder
            key={index}
            cartProduct={cartProduct}
          />
        ))}
      </div>
      <div className="shipping_summary">
        <div className="shipping_summary_row">
          <div className="summary_name">subtotal </div>
          <div className="summary_value">{totalPrice} birr </div>
        </div>
        <div className="shipping_summary_row shipping_summary_row-multi">
          <div className="summary_name">shipping</div>
          <div className="summary_value summary_value-multi">free</div>
        </div>
        <div className="shipping_summary_row">
          <div className="summary_name ">total </div>
          <div className="summary_value summary_value-total">
            {totalPrice} birr{" "}
          </div>
        </div>
      </div>
    </div>
  );
};
