 
  var notification = setInterval(checkForRequest,100);
      
        function checkForRequest()
        {
              
              
              var action ="getNotification";

              $.post('ajax.php',{action:action},function(data){
                     
                  console.log(data);
                  
                  $('.noti').text(data);
                  
                  $('.noti1').text('You have '+data+' massege');
              
              });     


        }