import { useState } from "react";
import { useNavigate } from "react-router";
import { dispatch } from "../../app/store";
import { useSelector } from "react-redux";

import { tellebirr, chapa } from "../../constants/images";
import { addToOrder } from "../../app/features/order/orderSlice";
import { clearCart, selectCart } from "../../app/features/cart/cartSlice";
import { clearCartRam } from "../../app/features/cart/cartSliceRam";
import axios from "axios";

export default ({ submitting, formValues }) => {
  const cart = useSelector(selectCart);
  const [total, setTotal] = useState(0);
  const [paymentOPtion, setPaymentOPtion] = useState("tellebirr");
  const navigate = useNavigate();
  const [addressInfo, setAddresInfo] = useState([]);
  const getProductForOrder = () => {
    let totalRam = 0;
    let products = [];
    cart.forEach((cartProduct) => {
      const { price, quantity, name, productId } = cartProduct;
      totalRam += price * quantity;
      products.push({ price, productId, quantity, name });
    });
    setTotal(totalRam);
    return products;
  };
  const handleToConfirmation = () => {
    for (const [key, value] of Object.entries(formValues.addressInfo)) {
      addressInfo.push({ name: key, value });
      getProductForOrder();
    }
    setAddresInfo(addressInfo);

    {
      // fake
      const order = {
        orderNumber: 100,
        status: "pending",
        orderedProducts: getProductForOrder(),
        addressInfo,
        orderInfo: [
          { name: "order number ", value: "6494663" },
          { name: "date", value: new Date().toLocaleDateString() },
          ,
          { name: "total price", value: `${total} birr ` },
          ,
          { name: "payment methode", value: "tellebirr " },
        ],
      };
      dispatch(addToOrder({ order }));
      dispatch(clearCart());
      dispatch(clearCartRam());
      navigate("/order");
    }
    {
      axios
        .post("http://localhost/8080/order", {
          cart,
          billingFrom: formValues,
        })
        .then((response) => {
          if (response.data.status == "success") {
            {
              // fake
              const order = {
                orderNumber: 100,
                status: "pending",
                orderedProducts: getProductForOrder(),
                addressInfo,
                orderInfo: [
                  { name: "order number ", value: "6494663" },
                  { name: "date", value: new Date().toLocaleDateString() },
                  ,
                  { name: "total price", value: `${total} birr ` },
                  ,
                  { name: "payment methode", value: "tellebirr " },
                ],
              };
              dispatch(addToOrder({ order }));
              dispatch(clearCart());
              dispatch(clearCartRam());
              navigate("/order");
            }
          } else {
            // alert("order failed");
          }
        })
        .catch((error) => {
          {
            // fake
            const order = {
              orderNumber: 100,
              status: "pending",
              orderedProducts: getProductForOrder(),
              addressInfo,
              orderInfo: [
                { name: "order number ", value: "6494663" },
                { name: "date", value: new Date().toLocaleDateString() },
                ,
                { name: "total price", value: `${total} birr ` },
                ,
                { name: "payment methode", value: "tellebirr " },
              ],
            };
            dispatch(addToOrder({ order }));
            dispatch(clearCart());
            dispatch(clearCartRam());
            navigate("/order");
          }
        });
    }
  };

  return (
    <div className="payment_form">
      <div className="payment_main">
        {" "}
        <button
          className={`payment_option ${
            paymentOPtion == "telle birr" ? "payment_option-selected" : ""
          }`}
          onClick={(e) => setPaymentOPtion("telle birr")}>
          <div className="option_image">
            <img src={tellebirr} />
          </div>
        </button>
        <p className="payment_note">
          Your personal data will be used to process your order, support your
          experience throughout this website, and for other purposes described
          in our privacy policy.
        </p>
        <button
          type="submit"
          disabled={!submitting}
          className={`btn btn_payment ${
            !submitting ? "btn_payment-disabled" : ""
          }`}
          onClick={handleToConfirmation}>
          pay via {paymentOPtion}
        </button>
      </div>
    </div>
  );
};
