import { bag } from "../../constants/images";
import { FaTimes } from "react-icons/fa";

export default ({ cartProduct }) => {
  return (
    <div className="shipping_order">
      <div className="shipping_order_image">
        <img src={bag} />
      </div>
      <div className="shipping_order_text">
        <p className="text-name"> {cartProduct.name}</p>
        <p className="text-desc"> {cartProduct.catagory}</p>
      </div>{" "}
      <p className="text-amount">
        <FaTimes className="times" />
        {cartProduct.quantity}
      </p>
      <div className="shipping_order_price">
        <span class="amount">{cartProduct.price}</span>
        birr{" "}
      </div>
    </div>
  );
};
