import {TweenMax, TimelineLite} from "gsap"; // eslint-disable-line no-unused-vars
// import "jquery-parallax.js";

export default {
  init() {
    // JavaScript to be fired on all pages

    // MOBILE MENU FUNCTIONALITY
    if ($(window).width() < 900) {
      // Hiding submenus when the page loads
      $(window).load(function() {
        hideMobileSubmenus();
      });

      // Toggling menu on hamburger click
      $('.banner__hamburger').on('click', function() {
        toggleMobileMenu();
      });

      // Watcher for menu item with children
      $('li.menu-item.menu-item-has-children').on('click', function(e) {
        if ($(e.target).closest('ul.sub-menu').length === 0) {
          e.preventDefault();
          toggleMobileSubmenu($(this));
        }
      });
    } else { // DESKTOP MENU FUNCTIONALITY
      $('.menu-item-has-children').on('mouseenter', function(e) {
        e.preventDefault();
        $(this).addClass('is-active');
        $(this).find('ul.sub-menu').addClass('is-active');
      });
      $('.menu-item-has-children').on('mouseleave', function(e) {
        e.preventDefault();
        $(this).removeClass('is-active');
        $(this).find('ul.sub-menu').removeClass('is-active');
      });
    }
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};

/**
 * Hides the submenus and gets their initial heights
 */
function hideMobileSubmenus() {
  $('nav.nav-primary').show();
  $('li.menu-item.menu-item-has-children').each(function() {
    const subMenu = $(this).find('ul.sub-menu');
    const menuHeight = subMenu.height();

    // Setting the height of the menu
    subMenu.attr('data-height', menuHeight);

    $(this).find('ul.sub-menu').animate({'height': '0px'}, 0, function() {
      $(this).find('ul.sub-menu').css('height', '0px');
    });
  });
  $('nav.nav-primary').hide();
}

/**
 * Toggles the menu on mobile devices
 */
function toggleMobileMenu() {
  // Toggling the is-active class
  $('.banner').toggleClass('is-active');
  $('.banner__hamburger').toggleClass('is-active');

  // Toggling the navigation
  $('nav.nav-primary').fadeToggle(function() {
    if ($('.banner').hasClass('is-active')) {
      $('nav.nav-primary').animate({
        'opacity': 1,
      }, 1);
    } else {
      $('nav.nav-primary').animate({
        'opacity': 0,
      }, 0.25);
    }
  });
}

/**
 * Toggles the submenus on mobile devices
 *
 * @param {Object} $menuitem - The menu item that was clicked
 */
function toggleMobileSubmenu($menuitem) {
  // If the menu item is not is-active
  if (!$menuitem.hasClass('is-active')) {
    const navTl = new TimelineLite();
    const subMenu = $menuitem.find('ul.sub-menu');
    const subMenuItems = subMenu.find('li');
    const menuHeight = subMenu.data('height');

    // Adding is-active to the menu item
    $menuitem.addClass('is-active');

    // Animating the menu in
    navTl.to(subMenu, 0.25, {height: menuHeight + 'px'});
    subMenuItems.each(function() {
      navTl.to($(this), 0.125, {opacity: 1}, '-=0.08');
    });
  } else {
    const navTl = new TimelineLite();
    const subMenu = $menuitem.find('ul.sub-menu');
    const subMenuItems = subMenu.find('li');

    // Animating the menu out
    navTl.to(subMenuItems, 0.125, {opacity: 0});
    navTl.to(subMenu, 0.25, {height: '0px'});

    // Removing is-active to the menu item
    $menuitem.removeClass('is-active');
  }
}
