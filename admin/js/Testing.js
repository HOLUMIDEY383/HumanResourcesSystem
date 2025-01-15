$(function(){
    var name='';
     
    
    $("#validate").on("click",function(){
          name= $("#name");
         var age= 12;
        if($("#name").val()===''){
            console.log("Input your index number");
        }
        else{
            console.log("Sucessful");
            $.post("Php/server.php",{
            action:"indexnum",
            name:$("#name").val()
        },function(data){
//            data = JSON.parse(data);
            console.log(data);
             Swal.fire({
                        icon: 'success',
                        title: 'Valid ID',
                        text: 'Success',
                        showConfirmButton: false
                    });
//                    setInterval('location.reload(true)', 1000);
            });
        }
    });
   $("#name").on("input", function(){
       $("#name").length;
//      alert( $("#name").length);
      console.log($("#name").val());
      console.log($(this).length);
      
   });
    
    
    
    
});
