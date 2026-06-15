$(document).ready(function() {
  // When clicking on the main menu item
  $('#main-menu > li > a').click(function() {
    // Toggle the sub-menu
    $(this).next('.sub-menu').slideToggle();
    // Toggle the plus/minus icon if you want to add it later
    $(this).toggleClass('expanded');
    var icon = $(this).find('.toggle-icon');
            if (icon.text() === "+") {
                icon.text("-");
            } else {
                icon.text("+");
            }
  });
});