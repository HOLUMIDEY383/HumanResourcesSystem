<?php
//exit();
?>
<script>
    // A $( document ).ready() block.
$(window).on("load",function() {
    empid =  "<?php echo $empid ?>";
    pagename = "<?php echo $pagename ?>";
    
//    console.log("Empid : "+ empid + "Pagename : "+ pagename);
 
    $.post("Php/server.php",
        {action:'pageaccesscheck',
        empid:empid,
        pagename:pagename
            }, function(data){
                status = JSON.parse(data);
                if(status !== "1"){
//                    alert("You don't have permission to view this Page");
                    window.location.href="Dashboard.php"; 
//                yes it worked, but not fully yet.
                }else if (status === "2") {
                     window.location.href="Dashboard.php"; 
//                    alert("User Permission check error");
                } else { return; }

            });  
    });

</script>