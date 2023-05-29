import { NavLink } from "react-router-dom";
import classes from "./Logo.module.css";

export const Logo = () => {
  return (
    <NavLink to="/" className={classes.Logo}>
      <div> Eyu Leather</div>
    </NavLink>
  );
};
