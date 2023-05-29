import React, { useRef, useState } from "react";
import {
  CountryDropdown,
  RegionDropdown,
  CountryRegionData,
} from "react-country-region-selector";
import { Form, Formik, Field, ErrorMessage } from "formik";

// export default () => {
//   const [country, setCountry] = useState("Ethiopia");
//   const [region, setRegion] = useState("");
//   return (
//     <div className="billing_form">
//       <p className="form_title">billing detail </p>
//       <div className="input_container">
//         <label
//           className="label"
//           htmlFor="">
//           First name <span className="required">*</span>
//         </label>
//         <input
//           placeholder=" "
//           required
//           type="text"
//           className="input input-fname"
//         />
//       </div>
//       <div className="input_container">
//         <label
//           className="label"
//           htmlFor="">
//           Last name <span className="required">*</span>
//         </label>
//         <input
//           placeholder=" "
//           required
//           type="text"
//           className="input input-lname "
//         />
//       </div>
//       <div className="input_container">
//         <label
//           className="label"
//           htmlFor="">
//           Email address <span className="required">*</span>
//         </label>
//         <input
//           placeholder=" "
//           required
//           type="text"
//           className="input input-email "
//         />
//       </div>
//       <div className="input_container">
//         <label
//           className="label"
//           htmlFor="">
//           Phone number <span className="required">*</span>
//         </label>
//         <input
//           placeholder=" "
//           required
//           type="text"
//           className="input input-phone "
//         />
//       </div>

//       <div className="input_container">
//         <label
//           className="label"
//           htmlFor="">
//           country <span className="required">*</span>
//         </label>
//         <CountryDropdown
//           placeholder=" "
//           classes="input input-country"
//           value={country}
//           onChange={(selectedCountry) => setCoutnrty(selectedCountry)}
//         />
//       </div>
//       <div className="input_container">
//         <label
//           className="label"
//           htmlFor="">
//           region(state)<span className="required">*</span>
//         </label>
//         <RegionDropdown
//           placeholder=" "
//           className="input input-region"
//           country={country}
//           value={region}
//           onChange={(selectedRegion) => {
//             setRegion(selectedRegion);
//           }}
//         />
//       </div>
//       <div className="input_container">
//         <label
//           className="label"
//           htmlFor="">
//           {" "}
//           City
//           <span className="required">*</span>
//         </label>
//         <input
//           placeholder=" "
//           required
//           type="text"
//           className="input  input-city"
//         />
//       </div>
//       <div className="input_container">
//         <label
//           className="label"
//           htmlFor="">
//           address line <span className="required">*</span>
//         </label>
//         <input
//           placeholder=" "
//           required
//           type="text"
//           className="input input-address-1 "
//         />
//       </div>
//       <div className="input_container">
//         <label
//           className="label"
//           htmlFor="">
//           address line 2 <span className="optional">(optional)</span>
//         </label>
//         <input
//           placeholder=" "
//           required
//           type="text"
//           className="input input-address-2 "
//         />
//       </div>

//       <p className="form_title">additional information </p>
//       <div className="input_container">
//         <label
//           className="label"
//           htmlFor="">
//           order notes <span className="optional">(optional)</span>
//         </label>
//         <textarea
//           placeholder="Note about your order, eg. special notes for delivery "
//           required
//           type="text"
//           className="input input-note"></textarea>
//       </div>
//     </div>
//   );
// };

export default ({ setSubmitting, setFormValues }) => {
  const [country, setCountry] = useState("Ethiopia");
  const [region, setRegion] = useState("Addis Ababa");
  const [fName, setFName] = useState("");
  const [lName, setLName] = useState("");
  const [email, setEmail] = useState("");
  const [phone, setPhone] = useState("");
  const [city, setCity] = useState("");
  const [address1, setAddress1] = useState("");
  const [address2, setAddress2] = useState("");
  const [optional, setOptional] = useState("");

  let errorsI;
  const formValues = {
    fName,
    lName,
    email,
    phone,
    addressInfo: {
      country,
      region,
      city,
      address1,
      address2,
    },

    optional,
  };

  return (
    <div className="billing_form">
      <p className="form_title">billing detail </p>
      <Formik
        initialValues={{
          fname: "",
          lname: "",
          email: "",
          phone: "",
          city: "",
          address1: "",
          country: "",
          region: " ",
        }}
        validate={(values) => {
          const errors = {};
          errorsI = errors;
          {
            // validate firstname
            if (!values.fname) {
              errors.fname = "Required";
            } else if (!/^[A-Z._%+-]{2,}$/i.test(values.fname)) {
              errors.fname = "Invalid First Name";
            } else {
              setFName(values.fname);
            }
          }
          {
            // validate lastname
            if (!values.lname) {
              errors.lname = "Required";
            } else if (!/^[A-Z._%+-]{2,}$/i.test(values.lname)) {
              errors.lname = "Invalid Last Name";
            } else {
              setLName(values.lname);
            }
          }
          {
            // validate email
            if (!values.email) {
              errors.email = "Required";
            } else if (
              !/^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}$/i.test(values.email)
            ) {
              errors.email = "Invalid email address";
            } else {
              setEmail(values.email);
            }
          }
          {
            // validate phone
            if (!values.phone) {
              errors.email = "Required";
            } else if (!/^[0-9.-]{2,}$/i.test(values.phone)) {
              errors.phone = "Invalid Phone Number";
            } else {
              setPhone(values.phone);
            }
          }
          {
            // validate address line 1
            if (!country) {
              errors.country = "Required";
            } else {
              setCountry(country);
            }
          }
          {
            // validate address line 1
            if (!region) {
              errors.region = "Required";
            } else {
              setFName(region);
            }
          }
          {
            // validate city
            if (!values.city) {
              errors.city = "Required";
            } else {
              setCity(values.city);
            }
          }
          {
            // validate address line 1
            if (!values.address1) {
              errors.address1 = "Required";
            } else {
              setAddress1(values.address1);
            }
          }

          if (Object.keys(errorsI).length == 0) {
            setSubmitting(true);
            setFormValues(formValues);
          } else {
            setSubmitting(false);
          }
          return errors;
        }}
        onSubmit={(values, e) => {}}>
        {
          <Form>
            <div className="input_container">
              <div className="input_container_lable">
                <label
                  className="label"
                  htmlFor="">
                  First name <span className="required">*</span>
                </label>{" "}
                <ErrorMessage
                  name="fname"
                  component="span"
                  className="input_error_message"
                />
              </div>
              <Field
                type="text"
                name="fname"
                className="input input-fname"
                placeholder=" "
              />{" "}
            </div>
            <div className="input_container">
              <div className="input_container_lable">
                <label
                  className="label"
                  htmlFor="">
                  Last name <span className="required">*</span>
                </label>{" "}
                <ErrorMessage
                  name="lname"
                  component="span"
                  className="input_error_message"
                />
              </div>
              <Field
                type="text"
                name="lname"
                className="input input-lname"
                placeholder=" "
              />{" "}
            </div>
            <div className="input_container">
              <div className="input_container_lable">
                <label
                  className="label"
                  htmlFor="">
                  Email <span className="required">*</span>
                </label>{" "}
                <ErrorMessage
                  name="email"
                  component="span"
                  className="input_error_message"
                />
              </div>
              <Field
                type="email"
                name="email"
                className="input input-email"
                placeholder=" "
              />{" "}
            </div>
            <div className="input_container">
              <div className="input_container_lable">
                <label
                  className="label"
                  htmlFor="">
                  Phone <span className="required">*</span>
                </label>{" "}
                <ErrorMessage
                  name="phone"
                  component="span"
                  className="input_error_message"
                />
              </div>
              <Field
                type="text"
                name="phone"
                className="input input-phone"
                placeholder=" "
              />{" "}
            </div>
            <div className="input_container">
              <div className="input_container_lable">
                <label
                  className="label"
                  htmlFor="">
                  country <span className="required">*</span>
                </label>
                <div
                  name="region"
                  className="input_error_message">
                  {country != "" ? "" : "Please select Country"}
                </div>
              </div>

              <CountryDropdown
                placeholder=" "
                classes="input input-country"
                value={country}
                onChange={(selectedCountry) => {
                  if (!selectedCountry || selectedCountry.trim() == "") {
                    setSubmitting(false);
                    setRegion("");
                  } else if (
                    (!errorsI || Object.keys(errorsI).length == 0) &&
                    region.trim() != ""
                  ) {
                    setSubmitting(true);
                  }
                  setCountry(selectedCountry);
                }}
              />
            </div>
            <div className="input_container">
              <div className="input_container_lable">
                <label
                  className="label"
                  htmlFor="">
                  region(state)<span className="required">*</span>
                </label>
                <div
                  name="region"
                  className="input_error_message">
                  {region != "" ? "" : "Please select Region"}
                </div>
              </div>

              <RegionDropdown
                name="region"
                placeholder=""
                classes="input input-region"
                country={country}
                value={region}
                onChange={(selectedRegion) => {
                  console.log(errorsI);
                  if (!selectedRegion || selectedRegion.trim() == "") {
                    setSubmitting(false);
                  } else if (!errorsI || Object.keys(errorsI).length == 0) {
                    setSubmitting(true);
                  }
                  setRegion(selectedRegion);
                }}
              />
            </div>

            <div className="input_container">
              <div className="input_container_lable">
                <label
                  className="label"
                  htmlFor="">
                  City <span className="required">*</span>
                </label>{" "}
                <ErrorMessage
                  name="city"
                  component="span"
                  className="input_error_message"
                />
              </div>
              <Field
                type="text"
                name="city"
                className="input input-city"
                placeholder=" "
              />{" "}
            </div>
            <div className="input_container">
              <div className="input_container_lable">
                <label
                  className="label"
                  htmlFor="">
                  Address Line 1 <span className="required">*</span>
                </label>{" "}
                <ErrorMessage
                  name="address1"
                  component="span"
                  className="input_error_message"
                />
              </div>
              <Field
                type="text"
                name="address1"
                className="input input-address1"
                placeholder=" "
              />{" "}
            </div>
            <div className="input_container">
              <div className="input_container_lable">
                <label
                  className="label"
                  htmlFor="">
                  Address Line 2 <span className="optional">(optional)</span>
                </label>{" "}
                <ErrorMessage
                  name="address2"
                  component="span"
                  className="input_error_message"
                />
              </div>
              <Field
                type="text"
                name="address2"
                className="input input-address2"
                placeholder=" "
                onChange={(e) => {
                  setAddress2(e.target.value);
                }}
              />{" "}
            </div>
            <p className="form_title">additional information </p>
            <div className="input_container">
              <label
                className="label"
                htmlFor="">
                order notes <span className="optional">(optional)</span>
              </label>
              <textarea
                placeholder="Note about your order, eg. special notes for delivery "
                type="text"
                onChange={(e) => {
                  setOptional(e.target.value);
                }}
                className="input input-note"></textarea>
            </div>
          </Form>
        }
      </Formik>
    </div>
  );
};
