import {TweenMax, TimelineLite} from "gsap"; // eslint-disable-line no-unused-vars

export default {
  init() {
    // JavaScript to be fired on all pages

    // Hiding submenus when the page loads
    $(window).load(function() {
      $('li.menu-item.menu-item-has-children').each(function() {
        const subMenu = $(this).find('ul.sub-menu');
        const menuHeight = subMenu.height();

        // Setting the height of the menu
        subMenu.attr('data-height', menuHeight);

        $(this).find('ul.sub-menu').animate({'height': '0px'}, 0, function() {
          $(this).find('ul.sub-menu').css('height', '0px');
        });
      });
    });

    // Watcher for menu item with children
    $('li.menu-item.menu-item-has-children').on('click', function(e) {
      e.preventDefault();

      // If the menu item is not active
      if (!$(this).hasClass('active')) {
        const navTl = new TimelineLite();
        const subMenu = $(this).find('ul.sub-menu');
        const subMenuItems = subMenu.find('li');
        const menuHeight = subMenu.data('height');

        // Adding active to the menu item
        $(this).addClass('active');

        // Animating the menu in
        navTl.to(subMenu, 0.25, {height: menuHeight + 'px'});
        subMenuItems.each(function() {
          navTl.to($(this), 0.125, {opacity: 1}, '-=0.08');
        });
      } else {
        const navTl = new TimelineLite();
        const subMenu = $(this).find('ul.sub-menu');
        const subMenuItems = subMenu.find('li');

        navTl.to(subMenuItems, 0.125, {opacity: 0});
        navTl.to(subMenu, 0.25, {height: '0px'});

        // Removing active to the menu item
        $(this).removeClass('active');
      }
    });
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
