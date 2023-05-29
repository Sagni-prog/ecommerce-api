import { MdMenuOpen } from "react-icons/md";
import { IoMdClose } from "react-icons/io";

import classes from "./Toggle.module.css";

export const Toggle = ({ show, clicked }) => {
  return (
    <button onClick={clicked} className={classes.Toggle}>
      {show ? <IoMdClose /> : <MdMenuOpen />}
    </button>
  );
};
