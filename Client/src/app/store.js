import { configureStore } from "@reduxjs/toolkit";
import cart from "./features/cart/cartSlice";
import cartRam from "./features/cart/cartSliceRam";
import product from "./features/products/productSlice";
import productSelected from "./features/products/productDetalSlice";
import order from "./features/order/orderSlice";
import orderSelected from "./features/order/orderDetailSlice";
const store = configureStore({
  reducer: {
    cart,
    product,
    cartRam,
    productSelected,
    order,
    orderSelected,
  },
});
export const dispatch = store.dispatch;
export default store;
