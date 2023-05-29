import { useEffect, useState } from "react";
import { useSelector } from "react-redux";
import { useNavigate } from "react-router";
import { selectCart } from "../../../app/features/cart/cartSlice";

import classes from "./cart-summary.module.css";

export function CartSummary() {
  const cart = useSelector(selectCart);
  const navigate = useNavigate();
  const [total, setTotal] = useState(0);
  const handleToCheckout = () => {
    navigate("/checkout");
  };

  useEffect(() => {
    createSummary();
  });
  const createSummary = () => {
    let total = 0;
    if (cart.length > 0) {
      cart.forEach((cartProduct) => {
        total += cartProduct.price * cartProduct.quantity;
      });
      setTotal(total);
    }
  };

  return (
    <div className={classes.CartSummary}>
      <div className={classes.CartSummaryRow}>
        <div className={classes.SummaryName}>subtotal </div>
        <div className={classes.SummaryValue}>{total} birr </div>
      </div>
      <div
        className={[classes.CartSummaryRow, classes.CartSummaryRowMulti].join(
          " "
        )}
      >
        <div className={classes.SummaryName}>shipping</div>
        <div
          className={[classes.SummaryValue, classes.SummaryValueMulti].join(
            " "
          )}
        >
          free
        </div>
      </div>
      <div className={classes.CartSummaryRow}>
        <div className={classes.SummaryName}>total </div>
        <div
          className={[classes.SummaryValue, classes.SummaryValueTotal].join(
            " "
          )}
        >
          {total} birr{" "}
        </div>
      </div>

      <button
        className={[classes.Btn, classes.BtnCart, classes.BtnCartCheckout].join(' ')}
        onClick={handleToCheckout}
      >
        procede to checkout{" "}
      </button>
    </div>
  );
}
