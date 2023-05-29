import axios from "axios";

export const getMenCatagory = async () => {
  const data = await axios.get("./data/catagory.json");

  const menCatagory = data.data.filter(
    (cata) => cata.gender === "men" && !cata.isFeatured
  );

  return menCatagory;
};

export const getWomenCatagory = async () => {
  const data = await axios.get("./data/catagory.json");

  const womenCatagory = data.data.filter(
    (cata) => cata.gender === "women" && !cata.isFeatured
  );

  return womenCatagory;
};

const formmatedFn = (data) => {
  return data.map((shoe) => ({
    title: shoe.title,
    description: shoe.description,
    image: shoe.image,
    price: shoe.price,
    discount: shoe.discount,
  }));
};

export const getAllMenShoes = async () => {
  const shoes = await getMenCatagory();
  return formmatedFn(shoes);
};

export const getAllWomenShoes = async () => {
  const shoes = await getAllWomenShoes();
  return formmatedFn(shoes);
};
