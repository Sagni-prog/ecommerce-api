import { useNavigate } from "react-router";
import OrderProgress from "../Cart/OrderProgress";
import Footer from "../Layout/Footer/Footer";
import Navbar from "../Nav/Nav";
import SingleOrder from "./SingleOrder";
import { useSelector } from "react-redux";
import { selectOrder } from "../../app/features/order/orderSlice";
import "./Orders.css";

export default () => {
  const orders = useSelector(selectOrder);
  return (
    <>
      <Navbar />
      <div className="cart_header">your orders </div>
      {orders.length > 0 ? (
        <>
          <OrderProgress stage={4} />
          {orders.map((order, index) => (
            <SingleOrder order={order} orderNumber={index + 1} key={index} />
          ))}
        </>
      ) : (
        <h1
          style={{
            "text-align": "center",
            margin: "10rem auto ",
            "letter-spacing": ".08rem",
          }}
        >
          You have note ordered any thing yet !
        </h1>
      )}

      <Footer />
    </>
  );
};
