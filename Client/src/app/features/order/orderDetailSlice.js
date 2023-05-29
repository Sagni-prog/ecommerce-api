import { createSlice } from "@reduxjs/toolkit";
const orderDetailSlice = createSlice({
  name: "orderSelected",
  initialState: {
    orderNumber: 100,
    status: "pending",
    orderedProducts: [
      {
        productId: "123",
        price: 123,
        quantity: 4,
        name: "lether bag",
      },
    ],
    addressInfo: [
      { name: "Country", value: "Ethiopia" },
      { name: "region", value: "addiss ababa" },
      ,
      { name: "city", value: "addiss ababa" },
      ,
      { name: "woreda", value: "yake" },
      ,
      { name: "house no", value: "847" },
    ],
    orderInfo: [
      { name: "order number ", value: "6494663" },
      { name: "date", value: "0ct 3, 2023" },
      ,
      { name: "total price", value: "235 birr " },
      ,
      { name: "payment methode", value: "chapa" },
    ],
  },

  reducers: {
    selectOrder: (state, action) => {
      return action.payload;
    },
  },
});
export const selectOrderDetailed = (state) => state.orderSelected;
export default orderDetailSlice.reducer;
export const { selectOrder } = orderDetailSlice.actions;
