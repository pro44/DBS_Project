 $(document).ready(function(e) {
        
            //---------------------------------------------------
            //---------------------------------------------------


            // UPDATE MESSAGES CODE     
            setInterval(function() {
                //	$('#unreadMessagesContent').load("checkUnread.php").fadeIn(400);
                //$('#latestMessagesContent').load("checkLatest.php").fadeIn(400);
                //$('#overallMessagesContent').fadeOut(900);
                $('#overallMessagesContent').load("checkOverall.php").fadeIn(100);
            }, 8000);

            /*
                    // UPDATE CATEGORIES CODE     
                        setInterval(function(){
                          $('#CategoriesContent').load("checkCategories.php").fadeIn(1000);
                        }, 5000 );  
            */

        });
