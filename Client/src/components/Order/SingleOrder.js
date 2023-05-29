import { useEffect, useState } from "react";
import { useNavigate } from "react-router";
import { selectOrder } from "../../app/features/order/orderDetailSlice";
import { useDispatch } from "react-redux";

const OrderDetailBody = ({ product }) => {
  return (
    <div className="detail_body_row">
      <div className="detail_body_name detail_gray ">{product.name}</div>
      <div className="detail_body_price">{product.price} </div>
      <div className="detail_body_qty">X{product.quantity}</div>
      <div className="detail_body_total detail_gray">
        {product.price * product.quantity}
      </div>
    </div>
  );
};

export default ({ order }) => {
  const dispatch = useDispatch();
  const [total, setTotal] = useState(0);
  const navigate = useNavigate();
  const calculteTotal = () => {
    let totalRam = 0;
    order.orderedProducts.forEach((orderedProduct) => {
      totalRam += orderedProduct.price * orderedProduct.quantity;
    });
    setTotal(totalRam);
  };
  useEffect(() => {
    calculteTotal();
  }, []);

  const handleOrderDetail = () => {
    dispatch(selectOrder(order));
    navigate("/orderDetail");
  };
  return (
    <div className="product_info product_info_list">
      <h2 className="shipping_info_title shipping_info_title_flex">
        <div className="title_order_number ">
          order number :{" "}
          <span className="order_title_value">{order.orderNumber}</span>
          <div className="title_order_date">
            {" "}
            order date :<span className="order_title_value"> {order.date}</span>
          </div>
        </div>
        <div className="title_order_status title_order_status_side">
          {order.status}
          <button
            className="order_title_btn"
            onClick={handleOrderDetail}>
            detail{" "}
          </button>
        </div>
      </h2>
      <div className="product_info_main">
        <div className="order_detail_header">
          <div className="detail_header_name"> Product </div>
          <div className="detail_header_price"> price</div>
          <div className="detail_header_qty"> quantity</div>
          <div className="detail_header_total">total</div>
        </div>
        <div className="order_detail_body">
          <>
            {order.orderedProducts.map((product, index) => (
              <OrderDetailBody
                product={product}
                key={index}
              />
            ))}
          </>
          <>
            <div className="detail_body_row detail_body_row-borderd">
              <div className="detail_body_name ">shipping</div>
              <div className="detail_body_price"> </div>
              <div className="detail_body_qty"></div>
              <div className="detail_body_total detail_gray">free</div>
            </div>
            <div className="detail_body_row detail_body_row-borderd">
              <div className="detail_body_name ">total</div>
              <div className="detail_body_price"> </div>
              <div className="detail_body_qty"></div>
              <div className="detail_body_total detail_gray">{total} birr </div>
            </div>
          </>
        </div>

        <div className="order_detail_footer">
          <div className="detail-footer_name"></div>
          <div className="detail_footer_price"></div>
          <div className="detail_footer_qty"></div>
        </div>
      </div>
    </div>
  );
};
