import classes from "./catagory-item.module.css";

function CatagoryItem({ src, alt, children }) {
  // const imagePath = `../../assets/images/jackets/${src}`;

  return (
    <div className={classes.ImgCont}>
      <img className={classes.Img} src={src} alt={alt} />
      <button className={classes.Btn}>{children}</button>
    </div>
  );
}

export default CatagoryItem;
