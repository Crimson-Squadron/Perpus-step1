$(document).ready(function() {
    $("#search-btn").click(function() {
      var searchText = $("#search-text").val().toLowerCase();
      $(".card-title").each(function() {
        if ($(this).text().toLowerCase().includes(searchText)) {
          $(this).click();
        }
      });
    });
  });