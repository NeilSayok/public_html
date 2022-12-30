$(".del-item").click(function(e) {
           $(this).closest('tr').remove()
           var $row = $(this).closest("tr"),
             $tds = $row.find("td:nth-child(1)");

           $.each($tds, function() {
             console.log($(this).text());
             $.ajax({
               data: 'key_id=' + $(this).text(),
               //url: 'https://inventorymanagement-system.000webhostapp.com/deleteItem.php',
               url: '/deleteItem.php',
               method: 'POST', // or GET
               success: function(msg) {
                 alert(msg);
               }
             });

           });

         });
