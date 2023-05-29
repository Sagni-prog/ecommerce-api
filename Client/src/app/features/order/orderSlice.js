import { createSlice } from "@reduxjs/toolkit";
const orderSlice = createSlice({
  name: "order",
  initialState: [],
  reducers: {
    addToOrder: (state, action) => {
      state.push(action.payload.order);
    },
  },
});

export const selectOrder = (state) => state.order;
export default orderSlice.reducer;
export const { addToOrder } = orderSlice.actions;
