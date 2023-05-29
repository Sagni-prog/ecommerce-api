import classes from "./nav-list.module.css";
import ListItem from "./list-item";

function NavList({ show }) {
  let activeClasses;

  if (show) {
    activeClasses = [classes.NavList, classes.NavListM].join(' ');
  } else {
    activeClasses = classes.NavList;
  }

  return (
    <ul className={activeClasses}>
      <ListItem link="/">Home</ListItem>
      <ListItem link="/catagory">catagory</ListItem>
      <ListItem link="/contact">Contact</ListItem>
      <ListItem link="/about">About</ListItem>
      <ListItem link="/cart">Cart</ListItem>
    </ul>
  );
}

export default NavList;
