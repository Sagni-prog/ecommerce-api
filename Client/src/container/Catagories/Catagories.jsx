import axios from "axios";
import { NavLink } from "react-router-dom";

import banner7 from "../../assets/images/shoes/banner7.jpg";

// import SingleProduct from "../Home/Featured/SingleProduct";
// import SearchResult from "../SearchResult/SearchResult";
import classes from "./Catagories.module.css";

import { getAllMenShoes, getAllWomenShoes } from "../../lib/catagory";
import { useState } from "react";
import { Fragment } from "react";
import { useEffect } from "react";

export const AllCategories = () => {
  const [CatagoryData, setCatagoryData] = useState([]);

  useEffect(() => {
    getAllMenShoes().then((data) => {
      setCatagoryData(data);
    });
  }, []);

  //   const showCatagoryDataHandler = () => {
  //     const menShoes = getAllMenShoes();

  //     setCatagoryData(menShoes);
  //   };

  return (
    <>
      <div className={classes.BarsContainer}>
        <form className={classes.SearchForm}>
          <input
            type="text"
            className={classes.SearchInput}
            placeholder="Search Products"
          />

          <NavLink
            className={classes.BtnSearch}
            to="/search"
            onSubmit={(e) => e.preventDefault()}
          >
            Search
          </NavLink>
        </form>
        {/* <div className={classes.SortContainer}>
          <p className={classes.Sortby}>Sort by</p>

          <select className={classes.Select}>
            <option value="default">Default</option>
            <option value="newest">Newest</option>
            <option value="price">Price</option>
          </select>
        </div> */}
      </div>
      <div className={classes.MainContainer}>
        <div className={classes.CategoriesContainer}>
          <h2 className={classes.SidebarTitle}> Categories</h2>
          <div className={classes.Category}>
            <div className={classes.CatContainer}>
              <h2 className={classes.CatTitle}>Women</h2>
            </div>
            <ul className={classes.CatList}>
              <li>
                <button className={[classes.CatLink, classes.Active].join(" ")}>
                  Shoes
                </button>
              </li>
              <li>
                <button className={classes.CatLink}>Jackets</button>
              </li>
              <li>
                <button className={classes.CatLink}>Bags</button>
              </li>
              <li>
                <button className={classes.CatLink}>Wallets</button>
              </li>
            </ul>
          </div>
          <div className="category">
            <div className="cat-container">
              <h2 className="cat-title">Women</h2>
              {/* <FiChevronDown className="down-icon" /> */}
            </div>
            <ul className="cat-list">
              <li>
                <button className={classes.CatLink}>Shoes</button>
              </li>
              <li>
                <button className={classes.CatLink}>Jackets</button>
              </li>
              <li>
                <button className={classes.CatLink}>Bags</button>
              </li>
              <li>
                <button className={classes.CatLink}>Wallets</button>
              </li>
            </ul>
          </div>
        </div>
        <div className={classes.ProductsContainer}>
          <div className={classes.Products}>
            {CatagoryData.map((catagory) => (
              <div
                className={classes.ProductCardContainer}
                key={catagory.title}
              >
                <div className={classes.ProductImgContainer}>
                  <img
                    className={classes.ProductImg}
                    src={catagory.image}
                    alt={catagory.title}
                  />
                </div>
                <div className={classes.ProductDescriptionContainer}>
                  <p className={classes.ProductTitle}>{catagory.title}</p>
                  <p className={classes.ProductDescription}>
                    {catagory.description}
                  </p>
                  <p className={classes.ProductPrice}>
                    <del>{catagory.discount}</del>
                    {catagory.price}
                  </p>
                </div>
              </div>
            ))}
          </div>
        </div>
      </div>
    </>
  );
};
