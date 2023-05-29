import { Fragment } from "react";

import {
  Hero,
  Catagory,
  Featured,
  Optional,
} from "../../components/Home/index";

export function Home() {
  return (
    <Fragment>
      <Hero />
      <Catagory />
      <Featured />
      <Optional />
    </Fragment>
  );
}
