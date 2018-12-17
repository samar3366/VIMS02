
        // window.onload = function() {
        //     history.replaceState("", "", "student-view_att.php");
        // }

        $(function () {
          $(document).bind("contextmenu",function(e){
            e.preventDefault();
            //alert("Right Click is not allowed");
          }
        );

        }
         );

      $(document).keydown(function (event) {
          if (event.keyCode == 123) {
              return false; // Prevent F12
          }else if (event.ctrlKey && event.shiftKey && event.keyCode == 73) {
              return false; // Prevent Ctrl+Shift+I
          }else if (event.ctrlKey && event.keyCode == 85) {
              return false; // Prevent Ctrl+U
          }
      });

      //disble browser back button
      history.pushState(null, null, location.href);
      window.onpopstate = function () {
      history.go(1);
      };


       // no confirm resubmission error
       // i.e., preventing resubmission of form on refresh
      function preventBack() { window.history.forward(); }
      setTimeout("preventBack()", 0);
      window.onunload = function () { null };

      //block f5
      $(function () {
        $(document).keydown(function (e) {
            return (e.which || e.keyCode) != 116;
        });
      });
