export default ({ orderInfo, addressInfo, total }) => {
  return (
    <div className="shipping_info">
      <div className="shipping_order_info">
        <h2 className="shipping_info_title">
          order info
          <p className="title_bar"></p>
        </h2>
        <div className="info_main">
          {orderInfo.map((info) => (
            <div className="info">
              <p className="info_name">{info.name} : </p>
              <p className="info_value">
                {" "}
                {info.value.toString().includes("0 birr")
                  ? `${total} birr `
                  : info.value}{" "}
              </p>
            </div>
          ))}
        </div>
      </div>

      <div className="shipping_address_info">
        <h2 className="shipping_info_title">
          shipping address <p className="title_bar"></p>
        </h2>
        <div className="info_main">
          {" "}
          {addressInfo.map((info) => (
            <div className="info">
              {info.value != "" ? (
                <p className="info_name">{info.name} : </p>
              ) : null}
              <p className="info_value"> {info.value}</p>
            </div>
          ))}
        </div>
      </div>
    </div>
  );
};
