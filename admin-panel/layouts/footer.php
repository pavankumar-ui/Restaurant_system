</div>
          </div>
        </div>
      </div>
    </div>
  </div>
<script>

    $(document).ready(function(){


$('.login_btn').click(function(e){

    href = "<?php echo AURL; ?>dashboard.php";

if ($('.email').val() == "" && $('.password').val() == ""){

        $('.emailerr').text('username is required');

        $('.passworderr').text('password is required');

    }else {

        window.location.href=href;
        window.location.reload();
    }

});






   //for creating admins//

        $('.create_admin_btn').click(function(e){
            e.preventDefault();
               
         var adminname = $('#adminname').val();
         var email = $('#email').val();
         var password = $('#password').val();

    var href= "http://localhost/Restaurant_system/admin-panel/admins/admins.php";

         $.ajax({

                url: "create-admins.php",
                method:"POST",
                data: {
                         'create_admin':true,
                         'adminname': adminname,
                         'email': email,
                         'password': password,
                      },
                   //cache:false,
                      success:function(response,data)
                      {
                        //$('.create_admin_btn').reset();
                       alert(data);
                        $('#adminname').val("");
                        $('#email').val("");
                        $('#password').val("");
                        window.location.href =href;

                      },
                       error: function (error) {
                      alert('Error:', error);
                     }
             })

        });

//delete booking 
$('.delete_booking_btn').click(function(e){
    e.preventDefault();
  var check = confirm('do you want to really delete this booking  ?');

     if(check == true)
     {
        var b_id = $(this).closest('tr').find('.b_id').text();

           $.ajax({
                 
                 method:"POST",
                 url:"delete_bookings.php",
                 data:{
                         'delete_book_btn':true,
                         'b_id':b_id,
                 },

                 success:function(response)
                 {
                    alert(response);
                 }
           });

     }
      else{
           alert('Your booking data was saved!');
          }
    });

//delete foods//  
  $('.delete_food').click(function(e){

    e.preventDefault();

    var check = confirm("Are you sure,do you want to really delete the food item?");

     if(check == true)

     {
        var f_id = $(this).closest('tr').find('.f_id').text();
              //alert(f_id);


           $.ajax({

                    
                    method:"POST",
                    url:"delete_foods.php",
                    data:{
                            'delete_food_btn':true,
                            'f_id':f_id,
                    },      
                    success:function(response)
                     {
                        alert(response);
                     }

           });
     }
       else
       {
           alert('your food data was saved');
        
       }

  }); 


//delete orders\\

 $('.delete_order').click(function(e){

    e.preventDefault();

var check = confirm("Are you sure,do you want to really delete the ordered item?");

     if(check == true)
     {
        var o_id = $(this).closest('tr').find('.o_id').text();
              //alert(f_id);
           $.ajax({
                    method:"POST",
                    url:"delete_orders.php",
                    data:{
                            'delete_order_btn':true,
                            'o_id':o_id,
                    },      
                    success:function(response)
                     {
                        alert(response);

                        $('.delete_order').prop('disabled', true);
                     }

           });
     }
       else
       {
           alert('your order data was saved');
        
       }

  });

// update booking_status//

/*$(document).on("click",".update_status",function(e){
    e.preventDefault();
   var b_id = $('.b_id').val();
     var status = $('.status').val();
     /*alert(status);
     alert(b_id);

     var href= "http://localhost/Restaurant_system/admin-panel/bookings-admins/show-bookings.php";
   
      $.ajax({
              method:"POST",
              url:"update_status.php",
              data:{
                      'update_status_btn':true,
                      'b_id':b_id,
                      'status':status,
                   },
                   success:function(response,data)
                   {
                    alert(data);
                    $('.status').val("");
                    window.location.href=href;
                   }
        });

  });*/


});

</script>
</body>
</html>