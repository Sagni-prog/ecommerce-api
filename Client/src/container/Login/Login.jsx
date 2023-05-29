import classes from "./Login.module.css";

export const Login = () => {
  return (
    <div className={classes.ContainerMain}>
      <div className={classes.ContainerSignup}>
        <h2 className={classes.SignupTitle}>New to our Shop?</h2>

        <p className={classes.SignupDescription}>
          There are advances being made in science and technology everyday, and
          a good example of this is the
        </p>
        <button className={classes.SignupBtn}>Create an account</button>
      </div>
      <div className={classes.ContainerLogin}>
        <div className={classes.LoginTitleContainer}>
          <h2 className={classes.LoginTitle}>Welcome back!</h2>
          <h2 className={classes.LoginTitle}>Please Sign in now</h2>
        </div>
        <label for="username">
          <input
            type="email"
            name="email"
            placeholder="Email"
            className={classes.Input}
          />
        </label>
        <label>
          <input
            type="password"
            name="password"
            placeholder="Password"
            className={classes.Input}
          />
        </label>
        <button className={classes.LoginBtn}>Log in</button>
        <a href="/" className={classes.ForgotPwd}>
          Forgot password?
        </a>
      </div>
    </div>
  );
};
