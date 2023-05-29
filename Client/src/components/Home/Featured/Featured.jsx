import { useSelector } from "react-redux";

import { selectProduct } from "../../../app/features/products/productSlice";

import FeaturedItem from "./Featured-item";
import classes from "./Featured.module.css";

export const Featured = () => {
  const products = useSelector(selectProduct);

  return (
    <section>
      <h1 className={classes.FeaturedTitle}>Featured Products</h1>
      <div className={classes.Container}>
        {products.map((product, index) => (
          <FeaturedItem product={product} key={index} index={index} />
        ))}
      </div>
    </section>
  );
};
