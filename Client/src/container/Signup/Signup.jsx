import classes from "./Signup.module.css";

export const Signup = () => {
  return (
    <div className={classes.ContainerMain}>
      <div className={classes.ContainerSignup}>
        <h2 className={classes.SignupTitle}>Have an account?</h2>

        <p className={classes.SignupDescription}>
          There are advances being made in science and technology everyday, and
          a good example of this is the
        </p>
        <button className={classes.LoginBtn}>Login</button>
      </div>
      <div className={classes.ContainerSignup}>
        <div>
          <h2 className={classes.SignupTitle}>Welcome!</h2>
          <h2 className={classes.SignupTitle}>Please Sign up now</h2>
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
        <label>
          <input
            type="password"
            name="confirmPassword"
            placeholder="Confirm password"
            className={classes.Input}
          />
        </label>
        <button className={classes.SignupBtn}>Sign up</button>
        <a href="/" className={classes.ForgotPwd}>
          Have an account?
        </a>
      </div>
    </div>
  );
};
