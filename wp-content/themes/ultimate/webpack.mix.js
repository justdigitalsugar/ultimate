const mix = require("laravel-mix");
const CopyPlugin = require("copy-webpack-plugin");
const ImageMinimizerPlugin = require("image-minimizer-webpack-plugin");
require("laravel-mix-copy-watched");

mix
  .setPublicPath("./")
  .js("src/js/app.js", "dist/js")
  .sass("src/css/main.scss", "dist/css")
  .browserSync({
    proxy: "http://recruitmentcircle/",
    files: [
      "src/js/**/*.js",
      "**/*.php",
      "src/css/**/*.scss",
      "src/fonts/**/*.{woff,woff2}",
      "tailwind.config.js",
    ],
    snippetOptions: {
      ignorePaths: "/wp-admin/**",
    },
  })
  .copyWatched("src/fonts/**/*.{woff,woff2}", "dist/fonts")
  .webpackConfig({
    plugins: [
      new CopyPlugin({
        patterns: [
          {
            from: "**/*.{ico,gif,jpg,png,svg}",
            to: "dist/img",
            context: "src/img",
          },
        ],
      }),
      new ImageMinimizerPlugin({
        minimizerOptions: {
          plugins: [
            ["gifsicle"],
            ["mozjpeg", { quality: 50 }],
            ["pngquant", { quality: [0.5, 0.5] }],
            ["svgo"],
          ],
        },
      }),
    ],
  })
  .options({
    processCssUrls: false,
    terser: { extractComments: false },
  })
  .disableSuccessNotifications();

if (mix.inProduction()) {
  mix.version();
}
