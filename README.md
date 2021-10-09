# WordPress Starter Theme
## Getting Started
```bash
$ cd my-wordpress-folder/wp-content/themes/this-theme
$ npm install
```

#### Watching for Changes
```bash
$ gulp
```

## Modular Approach
* The theme takes a modular approach to development using ACF's [Flexible Content field](https://www.advancedcustomfields.com/resources/flexible-content/).
* Each ACF module created in WordPress should have a `.php` counterpart inside of `partials/modules/module-{acf-field-name}.php`and a `.scss` couterpart inside of `assets/scss/modules/_{acf-field-name}.scss`. If the module requires javascript functionality, then a `.js` counterpart should be created inside of `assets/js/modules/{acf-field-name}.js` and added to the `gulpfile.js`.

## Adavanced Custom Fields
* ACF Pro is used and ACF fileds are stored as .json files inside of `/acf/acf-json/` so that they can be tracked in git. The .json files are generated every time a field group is saved.
* ACF is hidden from the WordPress admin menu by default. To enable it on your staging domain, add your domain inside of the `$valid_urls` array in the file `/acf/registed-acf.php`.
* Run a sync on the ACF fields after cloning this repository to get the theme's default ACF fields.

## Styles
The BEM approach ensures that everyone who participates in the development of a website works with a single codebase and speaks the same language: http://getbem.com/naming/.

* `style.css` - this file is never actually loaded, however, this is where you set your theme name and is required by WordPress
* `assets/scss/_settings.scss` - adjust themes style settings here.
* `assets/scss/app.scss` - import all of your styles here.
* `assets/scss/modules/*.scss` - add module specific styles here. One .scss file per module. File names should match the .php module file name.
* `assets/css/login.css` - place custom login styles here.

### Utility Classes
* `.container` - the default container class for containing content.
* `.is-flex` - will make the element a flexbox container.

### Grid System
Foundation: XY Grid: https://get.foundation/sites/docs/xy-grid.html

Add the class "is-flex" to the container. This will apply the Foundation mixin automatically and creates a flex-box container.
```
@include xy-grid;
```

#### XY Grid Cell
Elements within an ".is-flex" container (XY Grid) can use the the "xy-cell" mixin to define the element properties:
```
@include xy-cell($size: 3, $gutters: 2rem, $gutter-type: margin, $gutter-position: top bottom right left);
@include xy-cell($size: 3); // Will use the default gutter sizes defined in _settings.scss.
@include xy-cell(3); // Shorthand property.
```

* $size: number of columns the element will occupy (based on 12 column rows)
* $gutters: size of the gutters
* $gutter-type: margin or padding
* $gutter-position: where to apply the gutters

##### XY Grid Cell Gutters
The "xy-cell-gutter()" mixin can be used inside of responsive breakpoints to reset an elements gutter settings.
```
@include xy-cell-gutters($gutters: 2rem, $gutter-type: margin, $gutter-position: top bottom);
```

Example:
```
.item {
	@include xy-cell($size: 6, $gutters: 1.5rem, $gutter-type: margin, $gutter-position: top bottom right left);

    @include breakpoint(small down) {
    	@include xy-cell($size: 12);
    	@include xy-cell-gutters($gutters: 2rem, $gutter-type: margin, $gutter-position: top bottom);
    }

}
```

#### Alignment mixins
```
@include flex-align-self(middle); // Align vertially center
@include flex-align-self(top); // Align vertially top
@include flex-align-self(bottom); // Align vertially bottom
```

#### Responsive CSS approach
Breakpoints should be defined inside of the element selector:
```
.element.is-flex {
    //...
} // .element

.element__item {
	@include xy-cell($size: 6); // 6/12 (50%) width of 12 column container.

	@include breakpoint(large down) {
		@include xy-cell($size: 9); // 9/12 column width of container.
	}

	@include breakpoint(small down) {
		@include xy-cell($size: 12); // 12/12 column width of container.
	}

} // .element__item
```
## Scripts
* `assets/js/app.js` - this file contains single snippet functionality.
* `assets/js/components/*.js` - directory contains larger pieces of functionality that are specific to the theme foundation (menus, carousels, animations, modals, etc).
* `assets/js/modules/*.js` - directory contains functionality that are specific to the modules developed for the theme. File names should match the .php module file name.
* `gulpfile.js` - imports all .js files and compiles them to /assets/js/min/app.min.js
* `assets/js/min/app.min.js` - contains all compiled scripts and is the main (sometimes only) .js files loaded by the theme.


## Default Packages
* Foundation XY Grid: https://get.foundation/sites/docs/xy-grid.html
* Fancybox 4 (lightboxes and carousels): https://fancyapps.com/
* ScrollMagic: http://scrollmagic.io/