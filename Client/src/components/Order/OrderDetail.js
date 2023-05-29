import { BiArrowBack } from "react-icons/bi";
import { useState, useEffect } from "react";
import { Link } from "react-router-dom";
import { useSelector } from "react-redux";
import { selectOrderDetailed } from "../../app/features/order/orderDetailSlice";

import OrderProgress from "../Cart/OrderProgress";
import Footer from "../Layout/Footer/Footer";
import Navbar from "../Nav/Nav";
import OrderProductInfo from "./OrderDetailProductInfo";
import ShippingInfo from "./OrderDetailShippingInfo";
import "./Orders.css";

export default () => {
  const order = useSelector(selectOrderDetailed);
  const [total, setTotal] = useState(0);
  useEffect(() => {
    createSummary();
  });
  const createSummary = () => {
    let total = 0;
    if (order.orderedProducts.length > 0) {
      order.orderedProducts.forEach((orderProduct) => {
        total += orderProduct.price * orderProduct.quantity;
      });
      setTotal(total);
    }
  };
  return (
    <>
      <Navbar />
      <div className="cart_header">order detail </div>
      <OrderProgress stage={4} />
      <section className="section section_confirmation">
        <Link to="/order" preventScrollReset={true} className="back_btn">
          {" "}
          <BiArrowBack className="btn" />
          back
          <p className="btn_desc">go back to orders </p>
        </Link>
        <ShippingInfo
          addressInfo={order.addressInfo}
          orderInfo={order.orderInfo}
          total={total}
        />
        <OrderProductInfo
          orderedProducts={order.orderedProducts}
          total={total}
        />
      </section>
      <Footer />
    </>
  );
};
