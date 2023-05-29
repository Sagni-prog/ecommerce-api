import { createAsyncThunk, createSlice } from "@reduxjs/toolkit";
import axios from "axios";
import Catagory from "../../../components/Home/Catagory/Catagory";

import Bag from "../../../assets/images/bags/bag.png";
import Bag2 from "../../../assets/images/bags/bag2.png";
import Bag3 from "../../../assets/images/bags/bag3.png";
import Bag4 from "../../../assets/images/bags/bag4.png";

const productSlice = createSlice({
  name: "cart",
  initialState: {
    status: "idle",
    error: null,
    products: [
      {
        productId: "123",
        price: 123,
        quantity: 4,
        name: "lether bag",
        description:
          "First replenish living. Creepeth image image. Creeping can't, won't called. Two fruitful let days signs sea together all land fly subdue",
        catagory: "bag",
        subCatagory: "men bag",
        images: [Bag, Bag2, Bag3, Bag4],
        properties: [
          { name: "color", value: "red" },
          { name: "color", value: "red" },
          { name: "color", value: "red" },
          { name: "color", value: "red" },
        ],
        maxQuantity: 10,
      },
      {
        productId: "123333",
        price: 123,
        quantity: 4,
        name: "lether bag",
        description:
          "First replenish living. Creepeth image image. Creeping can't, won't called. Two fruitful let days signs sea together all land fly subdue",
        catagory: "bag",
        subCatagory: "men bag",
        images: [Bag, Bag2, Bag3, Bag4],
        properties: [
          { name: "color", value: "red" },
          { name: "color", value: "red" },
          { name: "color", value: "red" },
          { name: "color", value: "red" },
        ],
        maxQuantity: 10,
      },
      {
        productId: "1343",
        price: 123,
        quantity: 4,
        name: "lether bag",
        description:
          "First replenish living. Creepeth image image. Creeping can't, won't called. Two fruitful let days signs sea together all land fly subdue",
        catagory: "bag",
        subCatagory: "men bag",
        images: [Bag, Bag2, Bag3, Bag4],
        properties: [
          { name: "color", value: "red" },
          { name: "color", value: "red" },
          { name: "color", value: "red" },
          { name: "color", value: "red" },
        ],
        maxQuantity: 10,
      },
      {
        productId: "123",
        price: 123,
        quantity: 4,
        name: "lether bag",
        description:
          "First replenish living. Creepeth image image. Creeping can't, won't called. Two fruitful let days signs sea together all land fly subdue",
        catagory: "bag",
        subCatagory: "men bag",
        images: [Bag, Bag2, Bag3, Bag4],
        properties: [
          { name: "color", value: "red" },
          { name: "color", value: "red" },
          { name: "color", value: "red" },
          { name: "color", value: "red" },
        ],
        maxQuantity: 10,
      },
    ],
  },
  reducers: {
    setProducts: (state, action) => {
      state.push(action.payload.products);
    },
  },
});

export const fetchProduct = createAsyncThunk("product/fetchCart", async () => {
  const response = await axios.get("http://localhost:8080/product/all");
  return response.data;
});
export default productSlice.reducer;
export const selectProduct = (state) => state.product.products;
export const { setProducts } = productSlice.actions;
