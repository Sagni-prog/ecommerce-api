import { createSlice } from "@reduxjs/toolkit";
import Catagory from "../../../components/Home/Catagory/Catagory";

import Bag from "../../../assets/images/bags/bag.png";
import Bag2 from "../../../assets/images/bags/bag2.png";
import Bag3 from "../../../assets/images/bags/bag3.png";
import Bag4 from "../../../assets/images/bags/bag4.png";

const productDetailSlice = createSlice({
  name: "productDetail",
  initialState: {
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
  reducers: {
    selectProduct: (state, action) => {
      return action.payload;
    },
  },
});
export const selectProductDetailed = (state) => state.productSelected;
export default productDetailSlice.reducer;
export const { selectProduct } = productDetailSlice.actions;
