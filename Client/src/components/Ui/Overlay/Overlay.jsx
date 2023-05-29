import classes from "./Overlay.module.css";

export const Overlay = ({ show, clicked }) => {
  return show ? (
    <div className={classes.Overlay} onClick={clicked}></div>
  ) : null;
};
