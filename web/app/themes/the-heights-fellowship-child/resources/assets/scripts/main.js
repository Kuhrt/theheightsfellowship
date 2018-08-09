// import external dependencies
import 'jquery';

// Import everything from autoload
// import "./autoload/**/*"

// import local dependencies
import Router from './util/Router';
import common from './routes/common';
import home from './routes/home';
import about from './routes/about';
import calendar from './routes/calendar';

/** Populate Router instance with DOM routes */
const routes = new Router({
  // All pages
  common,
  // Home page
  home,
  // About Us page, note the change from about-us to aboutUs.
  about,
  // Calendar page
  calendar,
});

// Load Events
jQuery(document).ready(() => routes.loadEvents());
