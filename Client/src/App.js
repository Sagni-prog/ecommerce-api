// import React, { useEffect, useState } from "react";
// import axios from "axios";

// import Optional from "./components/Optional/Optional";
// import Footer from "./components/Footer/Footer";
// import "./style/global.css";
// import Blog from "./components/Blog/Blog";
// import Catagory from "./components/Catagory/Catagory";
// import Navbar from "./components/Nav/Navbar";
// import "./App.css";
// import Hero from "./components/Hero/Hero";
// import Featured from "./components/Featured/Featured";
// import { setProducts } from "./app/features/products/productSlice";
// import store from "./app/store";
// import { selectCart } from "./app/features/cart/cartSlice";
// import { useSelector } from "react-redux";

// // Containers
// import Home from "./container/Home/Home";

// const baseUrl = "localhost:8080";
// function App() {
//   const dispatch = store.dispatch;
//   useEffect(() => {
//     axios
//       .get(`${baseUrl}/index`)
//       .then((response) => {
//         if (response.status == "success") {
//           dispatch(setProducts({ products: response.data.products }));
//           localStorage.setItem(
//             "eyuLethear",
//             JSON.stringify({
//               orders: [],
//               carts: [],
//               userData: response.data.userData,
//             })
//           );
//         } else {
//           localStorage.setItem(
//             "eyuLethear",
//             JSON.stringify({
//               orders: [],
//               carts: [],
//               userData: null,
//             })
//           );
//         }
//       })
//       .catch((error) => {
//         localStorage.setItem(
//           "eyuLethear",
//           JSON.stringify({
//             orders: [],
//             carts: [],
//             userData: null,
//           })
//         );
//       });
//   }, []);
//   return (
//     <div className="App">
//       {/* <Navbar /> */}
//       <Home />
//       {/* <Catagory /> */}
//       {/* <Featured />
//       <Blog />
//       <Optional />
//       <Footer /> */}
//       {/* <AllCategories/> */}
//     </div>
//   );
// }
// export default App;

import React from "react";
import { BrowserRouter as Router, Routes, Route } from "react-router-dom";

import {
  Layout,
  Home,
  Cart,
  AllCategories,
  Login,
  Signup,
} from "./container/indes";
import "./style/global.css";

function App() {
  return (
    <Router>
      <Layout>
        <Routes>
          <Route path="/" element={<Home />} />
          <Route path="/cart" element={<Cart />} />
          <Route path="/catagory" element={<AllCategories />} />
          <Route path="/login" element={<Login />} />
          <Route path="/signup" element={<Signup />} />
        </Routes>
      </Layout>
    </Router>
  );
}

export default App;
