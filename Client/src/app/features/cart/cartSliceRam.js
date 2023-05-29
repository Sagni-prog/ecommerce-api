import { createSlice } from "@reduxjs/toolkit";

import Bag from "../../../assets/images/bags/bag.png";
import Bag2 from "../../../assets/images/bags/bag2.png";
import Bag3 from "../../../assets/images/bags/bag3.png";
import Bag4 from "../../../assets/images/bags/bag4.png";

const cartSliceRam = createSlice({
  name: "cartRam",
  initialState: [
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
  reducers: {
    updateProductRam: (state, action) => {
      state[action.payload.cartProductIndex].quantity =
        action.payload.updatedQuantity;
    },
    removeRamProduct: (state, action) => {
      return state.filter((product) => {
        return product.productId != action.payload.productId;
      });
    },
    addProductRam: (state, action) => {
      const productIndex = state.findIndex(
        (product) => product.productId == action.payload.product.productId
      );
      if (productIndex == -1) state.push(action.payload.product);
      else if (
        productIndex != -1 &&
        state[productIndex].quantity < state[productIndex].maxQuantity
      ) {
        state[productIndex].quantity++;
      } else if (
        productIndex != -1 &&
        state[productIndex].quantity == state[productIndex].maxQuantity
      ) {
        state[productIndex].fullyAdded = true;
      }
    },
    setCartRam: (state, action) => {
      return action.payload;
    },
    clearCartRam: (state, action) => {
      return [];
    },
  },
});
export const selectCartRam = (state) => state.cartRam;
export default cartSliceRam.reducer;
export const {
  updateProductRam,
  setCartRam,
  addProductRam,
  clearCartRam,
  removeRamProduct,
} = cartSliceRam.actions;
