import "./Shipping.css";
import OrderProgress from "../Cart/OrderProgress";

import Navbar from "../Nav/Nav";
import PaymentOption from "./PaymentOption";
import ShippingSummary from "./ShippingSummary";
import BillingForm from "./BillingForm";
import Footer from "../Layout/Footer/Footer";
import { useState } from "react";
export default () => {
  const [submitting, setSubmitting] = useState(false);
  const [formValues, setFormValues] = useState({});
  return (
    <>
      <Navbar />
      <section className="section section_shipping">
        <div className="cart_header">cart</div>
        <OrderProgress stage={2} />
        <div className="shipping_main">
          <BillingForm
            setSubmitting={setSubmitting}
            setFormValues={setFormValues}
          />
          <div className="shipping_right">
            <ShippingSummary />
            <PaymentOption submitting={submitting} formValues={formValues} />
          </div>
        </div>
      </section>
      <Footer />
    </>
  );
};
