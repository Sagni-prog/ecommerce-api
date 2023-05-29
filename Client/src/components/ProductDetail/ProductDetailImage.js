import SideImage from "./SideImage";
export default ({ images, image, setImage, setIndex, currentIndex }) => {
  return (
    <div className="product_detail_left">
      <div className="detail_side_images">
        {images.map((image, index) => (
          <SideImage
            image={image}
            key={index}
            index={index}
            setImage={setImage}
            setIndex={setIndex}
            currentIndex={currentIndex}
            set
          />
        ))}
      </div>
      <div className="detail_image">
        <img src={image} />
      </div>
    </div>
  );
};
