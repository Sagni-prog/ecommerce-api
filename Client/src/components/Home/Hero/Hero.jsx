import classes from "./Hero.module.css";
import HeroImg from "../../../assets/images/home/heroimg.png";

export const Hero = () => {
  return (
    <section className={classes.Hero}>
      <div>
        <div className={classes.HeroContent}>
          <h1 className={classes.HeroTitle}>Bag & Shoe Products</h1>
          <p className={classes.HeroDescription}>
            You have noting to worry about, you can find best premium quality
            products with affordable prices here in our Store easily with no
            effort.
          </p>
          <button className={classes.HeroButton}>Buy now</button>
        </div>
      </div>

      <img className={classes.HeroImage} alt="" src={HeroImg} />
    </section>
  );
};
