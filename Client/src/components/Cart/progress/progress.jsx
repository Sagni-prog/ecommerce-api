import classes from "./progress.module.css";

export function Progress({ stage }) {
  return (
    <div className={classes.Progress}>
      <div className={classes.ShipingProgress}>
        <p
          className={[
            classes.ProgressNode,
            stage >= 1 ? classes.ProgressNodeActive : "",
          ].join(" ")}
        >
          1
        </p>
        <p
          className={[
            classes.ProgressBar,
            stage >= 1 ? classes.ProgressBarActive : "",
          ].join(" ")}
        ></p>
        <p
          className={[
            classes.ProgressNode,
            stage >= 2 ? classes.ProgressNodeActive : "",
          ].join(" ")}
        >
          2
        </p>
        <p
          className={[
            classes.ProgressBar,
            stage > 2 ? classes.ProgressBarActive : "",
          ].join(" ")}
        ></p>

        <p
          className={[
            classes.ProgressNode,
            stage > 3 ? classes.ProgressNodeActive : "",
          ].join(" ")}
        >
          3
        </p>
      </div>
      <div className={classes.ShipingProgressDescription}>
        <p
          className={[classes.ProgressNodeDesc, classes.ProgressNodeDescActive]}
        >
          shopping cart
        </p>
        <p className={classes.ProgressNodeDesc}>checkout</p>
        <p className={classes.ProgressNodeDesc}>order complete</p>
      </div>
    </div>
  );
}
