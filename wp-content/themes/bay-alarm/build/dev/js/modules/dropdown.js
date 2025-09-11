(function($) {

  $(document).ready(function(e){
    $('.categories').on('click',function(){
      $('.cat-list').toggleClass('active');
    });

    $('.sort').on('click',function(){
      $('.sort-list').toggleClass('active');
    });

    window.onclick = function(event) {
      if (!event.target.matches('.dropdown-bar')) {

        var catdropdowns = document.getElementsByClassName("cat-list");
        var i;
        for (i = 0; i < catdropdowns.length; i++) {
          var openDropdown = catdropdowns[i];
          if (openDropdown.classList.contains('active')) {
            openDropdown.classList.remove('active');
          }
        }
      }
      if (!event.target.matches('.dropdown-bar')) {

        var sortdropdowns = document.getElementsByClassName("sort-list");
        var i;
        for (i = 0; i < sortdropdowns.length; i++) {
          var openDropdown = sortdropdowns[i];
          if (openDropdown.classList.contains('active')) {
            openDropdown.classList.remove('active');
          }
        }
      }
    }

  })

}(jQuery));
