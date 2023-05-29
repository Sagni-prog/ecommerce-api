import { Nav, Footer } from "../../components/Layout/index";

export function Layout({ children }) {
  return (
    <main>
      <Nav />
      {children}
      <Footer />
    </main>
  );
}
