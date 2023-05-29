import classes from "./Product.module.css";

export function Product({
  img,
  title,
  desc,
  price,
  discount,
  add,
  isFeatured,
}) {
  return (
    <div>
      <img src={img} alt={title} />
      {isFeatured ? (
        <>
          <h6>{title}</h6>
          <p>{desc}</p>
          <p>
            <del>{discount}</del>
            {price}
          </p>
        </>
      ) : null}
      <button className={classes.BtnCart} onClick={add}>
        Add to Cart
      </button>
    </div>
  );
}
