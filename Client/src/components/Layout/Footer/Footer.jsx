import React, { useState } from "react";

import {
  FaFacebook,
  FaTelegram,
  FaTwitter,
  FaMailBulk,
  FaMapMarked,
  FaInstagram,
  FaPhone,
} from "react-icons/fa";
import { Link } from "react-router-dom";

import classes from "./Footer.module.css";

export function Footer() {
  const [email, setEmail] = useState("");

  const handleSubmitForm = (e) => {
    e.preventDefault();
  };

  return (
    <section className={classes.Footer}>
      <div className={classes.FooterCon}>
        <div
          className={[
            classes.FooterPart,
            classes.FooterPartContactInfo,
            classes.FooterParTwo,
          ].join(" ")}
        >
          <div
            className={[
              classes.FooterPartHeader,
              classes.FooterPartHeaderName,
            ].join(" ")}
          >
            Eyu leather
          </div>
          <div
            className={[
              classes.FooterPartContent,
              classes.footerPartContentContact,
            ].join(" ")}
          >
            <div
              className={[classes.ContentList, classes.ContentListContact].join(
                " "
              )}
            >
              <FaMapMarked
                className={[classes.footerIcon, classes.ContentListIcon].join(
                  " "
                )}
              />
              <p className={classes.ContentListText}>
                International city France Cluster Building Q-08, Shop 1,2,3 & 5,
                Dubai
              </p>
            </div>
            <div
              className={[classes.ContentList, classes.ContentListContact].join(
                " "
              )}
            >
              <FaMailBulk
                className={[classes.footerIcon, classes.ContentListIcon].join(
                  " "
                )}
              />
              <p className={classes.ContentListText}>info@mylaveri.com</p>
            </div>
            <div
              className={[classes.ContentList, classes.ContentListContact].join(
                " "
              )}
            >
              <FaPhone
                className={[classes.footerIcon, classes.ContentListIcon].join(
                  " "
                )}
              />
              <p className={classes.ContentListText}>+23510180924</p>
            </div>
            <div
              className={[classes.ContentList, classes.ContentListLinks].join(
                " "
              )}
            >
              {" "}
              <a href="https://www.facebook.com/kidanemariam4075/posts/2187060038035807/">
                <FaFacebook
                  className={[classes.FooterIcon, classes.FooterLink].join(" ")}
                />
              </a>
              <a href="https://www.facebook.com/kidanemariam4075/posts/2187060038035807/">
                <FaInstagram
                  className={[classes.FooterIcon, classes.FooterLink].join(" ")}
                />
              </a>
              <a href="https://www.facebook.com/kidanemariam4075/posts/2187060038035807/">
                <FaTelegram
                  className={[classes.FooterIcon, classes.FooterLink].join(" ")}
                />
              </a>
              <a href="https://www.facebook.com/kidanemariam4075/posts/2187060038035807/">
                <FaMailBulk
                  className={[classes.FooterIcon, classes.FooterLink].join(" ")}
                />
              </a>
              <a href="https://www.facebook.com/kidanemariam4075/posts/2187060038035807/">
                <FaTwitter
                  className={[classes.FooterIcon, classes.FooterLink].join(" ")}
                />
              </a>
            </div>
          </div>
        </div>
        <div
          className={[
            classes.footer_part,
            classes.FooterPartCompnayInfo,
            classes.FooterPartOne,
          ].join(" ")}
        >
          <div className={classes.FooterPartHeader}>information</div>
          <div className={classes.FooterPartContent}>
            <Link
              to="/"
              className={[classes.ContentList, classes.FooterLink].join(" ")}
            >
              about us
            </Link>
            <Link
              to="/"
              className={[classes.ContentList, classes.FooterLink].join(" ")}
            >
              contact us
            </Link>
            <Link
              to="/"
              className={[classes.ContentList, classes.FooterLink].join(" ")}
            >
              privacy
            </Link>
            <Link
              to="/"
              className={[classes.ContentList, classes.FooterLink].join(" ")}
            >
              terms & conditions
            </Link>
          </div>
        </div>

        <div
          className={[
            classes.FooterPart,
            classes.FooterPartAccountInfo,
            classes.FooterPartOne,
          ].join(" ")}
        >
          <div className={classes.FooterPartHeader}>my account</div>
          <div className={classes.FooterPartContent}>
            <Link
              to="/order"
              preventScrollReset={true}
              className={[classes.ContentList, classes.FooterLink].join(" ")}
            >
              order
            </Link>
            <Link
              to="/cart"
              preventScrollReset={true}
              className={[classes.ContentList, classes.FooterLink].join(" ")}
            >
              cart
            </Link>
            <Link
              to="/checkout"
              preventScrollReset={true}
              className={[classes.ContentList, classes.FooterLink].join(" ")}
            >
              checkout
            </Link>
            <Link
              to="/order"
              preventScrollReset={true}
              className={[classes.ContentList, classes.FooterLink].join(" ")}
            >
              shipping
            </Link>
          </div>
        </div>
        <div
          className={[
            classes.FooterPart,
            classes.FooterPartNewsletter,
            classes.FooterPartTwo,
          ].join(" ")}
        >
          <div className={classes.FooterPartHeader}>news letter</div>
          <div className={classes.FooterPartHeaderSub}>
            {" "}
            Subscribe to mailing list to receive updates on new arrivals,
            special offers and discount information.
          </div>
          <form
            className={[classes.FooterPartContent, classes.FooterForm].join(
              " "
            )}
            onSubmit={handleSubmitForm}
          >
            <input
              className={[classes.Input, classes.InputFooter].join(" ")}
              type="text"
              placeholder="Email address"
            />
            <button className={[classes.Btn, classes.BtnFooter].join(" ")}>
              subscribe
            </button>
          </form>
        </div>
      </div>
      <div className={classes.FooterSub}>
        <span>Copyright 2023 Eyu leather</span>
        <span>
          |Developed by
          <span className={classes.Developer}> DEV-X</span>
        </span>
      </div>
    </section>
  );
}
