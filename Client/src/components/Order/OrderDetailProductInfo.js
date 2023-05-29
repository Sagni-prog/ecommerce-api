export default ({ orderedProducts, total }) => {
  return (
    <div className="product_info">
      <h2 className="shipping_info_title">order detail </h2>
      <div className="product_info_main">
        <div className="order_detail_header">
          <div className="detail_header_name"> Product </div>
          <div className="detail_header_price"> price</div>
          <div className="detail_header_qty"> quantity</div>
          <div className="detail_header_total">total</div>
        </div>
        <div className="order_detail_body">
          <>
            {orderedProducts.map((product) => (
              <div className="detail_body_row">
                <div className="detail_body_name detail_gray ">
                  {product.name}
                </div>
                <div className="detail_body_price">{product.price} </div>
                <div className="detail_body_qty">X{product.quantity}</div>
                <div className="detail_body_total detail_gray">
                  {product.price * product.quantity}
                </div>
              </div>
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
