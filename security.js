
    window.onload = function() {
        history.replaceState("", "", "student-view_att.php");
    }
    $(function () {
      $(document).bind("contextmenu",function(e){
        e.preventDefault();
        //alert("Right Click is not allowed");
      }
    );
    /*$('.dvOne').bind("contextmenu",function(e){
    e.preventDefault();
    alert("Right Click is not allowed on div");
    }
    );
    */
    }
     );
  $(document).keydown(function (event) {
      if (event.keyCode == 123) { // Prevent F12
          return false;
      }else if (event.ctrlKey && event.shiftKey && event.keyCode == 73) { // Prevent Ctrl+Shift+I
          return false;
      }else if (event.ctrlKey && event.keyCode == 85) { // Prevent Ctrl+U
          return false;
      }
  });
  history.pushState(null, null, location.href);
    window.onpopstate = function () {
        history.go(1);
    };
