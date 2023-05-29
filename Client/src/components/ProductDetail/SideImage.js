export default ({ image, index, setImage, setIndex, currentIndex }) => {
  const handleChangeImage = () => {
    setImage(image);
    setIndex(index);
  };
  return (
    <div
      className={`side_image ${
        currentIndex == index ? "side_image-current" : ""
      }`}
      onClick={handleChangeImage}>
      {" "}
      <img src={image} />
    </div>
  );
};
