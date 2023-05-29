import { NavLink } from "react-router-dom";

import classes from "./list-item.module.css";

function ListItem({ children, link }) {
  return (
    <li>
      <NavLink className={classes.Link} to={link}>
        {children}
      </NavLink>
    </li>
  );
}

export default ListItem;
