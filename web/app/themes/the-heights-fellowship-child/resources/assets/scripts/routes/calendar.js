export default {
  init() {
    // JavaScript to be fired on the calendar page
    jQuery(document).ready(function($){
      // Array to hold the categories and their IDs
      const calendarCategories = [
        {
          name: 'main',
          id: 3,
        },
        {
          name: 'students',
          id: 5,
        },
        {
          name: 'men',
          id: 7,
        },
        {
          name: 'women',
          id: 8,
        },
        {
          name: 'kids',
          id: 9,
        },
        {
          name: 'university',
          id: 10,
        },
        {
          name: 'adults',
          id: 11,
        },
      ];

      // Getting which page we're on
      let urlPath = window.location.pathname;
      urlPath = urlPath.split('/')[1];
      urlPath = urlPath.toLowerCase();

      // Variable to hold the ID of the category for the page we're on
      let pageCategory = 3;

      // Going through the categories and setting pageCategory to the right ID
      $.each(calendarCategories, function(index, category) {
        // If the category name matches the url
        if (category.name === urlPath) {
          // Set the pageCategory to the actual category ID
          pageCategory = category.id;
        }
      });

      $('#eventoncontent').evoCalendar({
        api: 'http://www5.theheightsfellowship.org/wp-json/eventon/calendar?event_type=' + pageCategory,
        calendar_url: '',
        new_window: false,
        loading_text: 'Loading Calendar...',
      });
    });
  },
  finalize() {
    // JavaScript to be fired on the home page, after the init JS
  },
};
