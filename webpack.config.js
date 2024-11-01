"use strict";

const webpack = require("webpack");
const autoprefixer = require("autoprefixer");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const FriendlyErrorsPlugin = require("friendly-errors-webpack-plugin");
const OptimizeCSSAssetsPlugin = require("optimize-css-assets-webpack-plugin");
const tailwindcss = require("tailwindcss");
const path = require("path");
const fs = require("fs");

const appDirectory = fs.realpathSync(process.cwd());
function resolveApp(relativePath) {
  return path.resolve(appDirectory, relativePath);
}

const paths = {
  appBuild: resolveApp("build"),
  appGlobalStyle: resolveApp("sass/global.scss"),
  appTailwindStyle: resolveApp("sass/tailwind.scss"),
  appNodeModules: resolveApp("node_modules"),
  appTemplateJs: resolveApp("includes/Templates/assets/js/template.js"),
};

module.exports = (env, argv) => {
  const DEV = argv.mode === "development";
  const PROD = argv.mode === "production";
  return {
    bail: !DEV,
    mode: DEV ? "development" : "production",
    target: "web",
    entry: {
      "se-global": paths.appGlobalStyle,
      "se-tailwind": paths.appTailwindStyle,
      "template-library": paths.appTemplateJs,
    },
    output: {
      path: path.resolve(__dirname, "./dist"),
      filename: DEV ? "[name].js" : "[name].min.js",
    },
    module: {
      rules: [
        {
          test: /.s(a|c)ss$/,
          use: [
            MiniCssExtractPlugin.loader,
            {
              loader: "css-loader",
            },
            {
              loader: "postcss-loader",
              options: {
                postcssOptions: {
                  plugins: [
                    tailwindcss("./tailwind.config.js"),
                    autoprefixer({
                      overrideBrowserslist: [">1%", "last 4 versions", "Firefox ESR", "not ie < 9"],
                    }),
                  ],
                },
              },
            },
            "sass-loader",
          ],
        },
      ],
    },
    optimization: {
      minimize: PROD,
      minimizer: [
        new OptimizeCSSAssetsPlugin({
          cssProcessorOptions: {
            map: {
              inline: false,
              annotation: true,
            },
          },
        }),
      ],
    },
    plugins: [
      new MiniCssExtractPlugin({
        filename: DEV ? "[name].css" : "[name].min.css",
      }),
      new webpack.EnvironmentPlugin({
        NODE_ENV: DEV ? "development" : "production",
        DEBUG: false,
      }),
      DEV &&
        new FriendlyErrorsPlugin({
          clearConsole: false,
        }),
    ].filter(Boolean),
    resolve: {
      extensions: [".scss"],
    },
  };
};