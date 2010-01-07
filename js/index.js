$(document).ready(function() {
      $("a.showmoreinfo").click(function() {
         $(this).parent().children("dl.moreinfo").toggle("normal");
         if($(this).text()=="more...")
            $(this).text("hide info");
         else
            $(this).text("more...");
      });
});
