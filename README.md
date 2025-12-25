# Demo CodeConfig - Gulp Workflow

A modern frontend development workflow using Gulp for processing assets from Figma to HTML.

## Features

- 🎨 **SCSS/SASS** compilation with autoprefixer
- 📦 **JavaScript** transpilation with Babel
- 🖼️ **Image** optimization
- 🔄 **Live reload** with BrowserSync
- 🏗️ **Production build** with minification
- 📁 **Source maps** for development
- 🎯 **Modern ES6+** support

## Installation

Install all dependencies:

```bash
npm install
```

## Usage

### Development Mode

Start the development server with live reload:

```bash
npm run dev
```

This will:
- Compile SCSS to CSS
- Transpile JavaScript with Babel
- Process HTML files
- Optimize images
- Start BrowserSync server on http://localhost:3000
- Watch for file changes

### Production Build

Create optimized production-ready files:

```bash
npm run build
```

This will:
- Minify CSS and remove comments
- Minify JavaScript and remove console.logs
- Compress images
- Minify HTML
- Output everything to the `dist/` folder

### Watch Mode

Watch files for changes without starting a server:

```bash
npm run watch
```

## Project Structure

```
.
├── src/                    # Source files
│   ├── scss/              # SCSS files
│   │   ├── main.scss      # Main SCSS file
│   │   └── partials/      # SCSS partials
│   │       ├── _variables.scss
│   │       ├── _base.scss
│   │       ├── _components.scss
│   │       └── _layout.scss
│   ├── js/                # JavaScript files
│   │   └── main.js        # Main JS file
│   ├── images/            # Images
│   ├── fonts/             # Fonts
│   └── index.html         # HTML files
├── dist/                  # Compiled/built files (auto-generated)
│   ├── css/
│   ├── js/
│   ├── images/
│   └── fonts/
├── gulpfile.js            # Gulp configuration
└── package.json           # Project dependencies

```

## Available Gulp Tasks

- `gulp` - Run development mode (default)
- `gulp build` - Create production build
- `gulp watch` - Watch files for changes
- `gulp clean` - Clean dist folder
- `gulp html` - Process HTML files
- `gulp styles` - Compile SCSS to CSS
- `gulp scripts` - Transpile and bundle JavaScript
- `gulp images` - Optimize images
- `gulp fonts` - Copy fonts

## Technologies Used

- **Gulp 4** - Task runner
- **Sass** - CSS preprocessor
- **Babel** - JavaScript compiler
- **PostCSS** - CSS post-processor
- **Autoprefixer** - Add vendor prefixes
- **Terser** - JavaScript minifier
- **CleanCSS** - CSS minifier
- **ImageMin** - Image optimizer
- **BrowserSync** - Live reload server

## Customization

### Modify paths

Edit the `paths` object in `gulpfile.js`:

```javascript
const paths = {
  html: {
    src: 'src/**/*.html',
    dest: 'dist/'
  },
  // ... other paths
};
```

### Add new tasks

Add custom tasks in `gulpfile.js` and export them:

```javascript
function myCustomTask() {
  // Your task code
}

exports.myCustomTask = myCustomTask;
```

## Browser Support

The Babel configuration targets modern browsers with the `@babel/preset-env` defaults. Modify `.babelrc` or the Babel config in `gulpfile.js` to adjust browser support.

## License

ISC

## Author

Demo CodeConfig Team
