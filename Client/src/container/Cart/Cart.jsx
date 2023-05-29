import { useState } from "react";
import { selectCart } from "../../app/features/cart/cartSlice";
import { useSelector } from "react-redux";

import { CartDetail, CartSummary, Progress } from "../../components/Cart/index";
import classes from "./Cart.module.css";

export function Cart() {
  const cart = useSelector(selectCart);
  const [edited, setEdited] = useState(false);

  return (
    <section>
      <div className={classes.CartHeader}>your cart</div>
      {cart.length != 0 ? (
        <>
          <Progress stage={1} />
          <div className={classes.CartMain}>
            <CartDetail edited={edited} setEdited={setEdited} />
            <CartSummary />
          </div>
        </>
      ) : (
        <div className={classes.NoProductText}>
          no product is added to your cart yet{" "}
        </div>
      )}
    </section>
  );
}
