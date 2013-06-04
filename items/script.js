	$("#nav_items").addClass("active");
	
	var current_item;
	//add item
	
	$("#remove_button").click(function(e){
		e.preventDefault();
    if (confirm('Are you sure you want to delete this item?')) {
    
    	     var data = {
		            id: current_item
	            };
	            
    
    
		  $.ajax({
	                 type: "POST",
	                 url: "remove-item.php",
	                 data: data,
	                 success: function (res) {
	                      if (res == true) {
	                              //success action
	                              $("#edit-item div").remove(".spinner");
	                              $("#edit").fadeOut();

	                                nodata = false;
								    loading = false; 
								    number = 0;
								    $("#feed").empty();
								    getData();
	                      } else {
	                              //failure action
	                      }
	            
	                 }
	            });
	       }
	});
		
	
	
	 $("#add-item").validate({
    
	        rules: {
	            title: "required",
	            price: "required"
	
	        },
	        submitHandler: function (form) {
	            $("#add-item").append('<div class="center spinner"><i class="icon-spinner icon-spin"></i></div>');	                   
	            $("#add-item-error").empty();
	            
	            var title = $("#title").val();
	            var description = $("#description").val();
	            var price = $("#price").val();
	            
	            var data = {
		            title: title,
		            description: description,
		            price: price
	            };
	            
	            $.ajax({
	                 type: "POST",
	                 url: "new-item.php",
	                 data: data,
	                 success: function (res) {
	                      if (res == true) {
	                              //success action
	                              $("#add-item-error").html("Item added successfully");
	                              $("#add-item div").remove(".spinner");

	                                nodata = false;
								    loading = false; 
								    number = 0;
								    $("#feed").empty();
								    getData();
	                      } else {
	                              //failure action
	                      }
	            
	                 }
	            });
	            
	
	        }
	    });
	    
	     $("#edit-item").validate({
    
	        rules: {
	            edit_title: "required",
	            edit_price: "required"
	
	        },
	        submitHandler: function (form) {
	            $("#edit-item").append('<div class="center spinner"><i class="icon-spinner icon-spin"></i></div>');	                   
	            $("#edit-item-error").empty();
	            
	            var title = $("#edit_title").val();
	            var description = $("#edit_description").val();
	            var price = $("#edit_price").val();
	            var id = $("#edit_id").val();

	            var data = {
		            title: title,
		            description: description,
		            price: price, 
		            id: id
	            };
	            
	            $.ajax({
	                 type: "POST",
	                 url: "edit-item.php",
	                 data: data,
	                 success: function (res) {
	                      if (res == true) {
	                              //success action
	                              $("#edit-item-error").html("Item edited successfully");
	                              $("#edit-item div").remove(".spinner");

	                                nodata = false;
								    loading = false; 
								    number = 0;
								    $("#feed").empty();
								    getData();
	                      } else {
	                              //failure action
	                      }
	            
	                 }
	            });
	            
	
	        }
	    });
   

   
   
   
    var nodata = false; //this tells the program if there is no more data to display
    var loading = false; //this tells the program if the ajax is currently running
    var number = 0; //number used to determine location of tables in database
    $(document).ready(function () {
        getData();
    });

    $(window).scroll(function () {

        if ($(window).scrollTop() >= $(document).height() - $(window).height() - 100 && loading != true && nodata != true) {
            getData();
        }

    });


    function getData() {

        loading = true;
        var data = {
            ///include all post data in this array
            number: number
        };

        //insert loading icon here
        $("#feed").append('<div class="center spinner"><i class="icon-spinner icon-spin icon-2x"></i></div>');

        $.ajax({
            type: "POST",
            url: "item-data.php", //example script can be anything
            data: data,
            success: function (res) {
                res = $.parseJSON(res);
                $("#feed div").remove(".spinner"); //remove loading icon here
                for (var i = 0; i < res.length; i++) {
                    //use this section to display all the data, use some .append() or something
                    
                    var success = "";
                    
                    if(res[i]['id'] == current_item){
	                    success = "success";
                    }
                    
	                 $("#feed").append("<tr data-id = '" + res[i]['id'] + "' data-title = '" + res[i]['title'] + "' data-description = '" + res[i]['description'] + "' data-price = '" + res[i]['price'] + "'  class='editItem "+success+"'><td>" + res[i]["title"] + "</td><td>" + res[i]["description"] + "</td><td>$" + parseFloat(res[i]["price"]).toFixed(2) + "</td></tr>");
	                 
                    number++;
                }

                if (res.length == 0) { //no date left :( sad day
                    //display error message here
                    nodata = true;
                }  
   
                $(".editItem").unbind('click');
                $(".editItem").click(function () {
                    //action here
                    
                    var item = $(this).data('id');
                    current_item = item;
                    var title = $(this).data('title');
                    var description = $(this).data('description');
                     var price = $(this).data('price');
                   
                    editItem(item, title, description, price);

                });


                loading = false;
            }
        });
    }
    
    function editItem(item, title, description, price){
    
	    $("#feed tr").removeClass('success');
	    $("#feed tr").each(function(){
		   	if($(this).data('id') == item){
			   	$(this).addClass('success');
		   	}
	    });

	    displayEdit(item, title, description, price);

    }    
    
    
    function displayEdit(item, title, description, price){
	    
	    $("#edit").fadeIn();
	 	  $("#edit-item-error").empty();

	    $("#edit-header").html("Edit "+title);
	    
	    $("#edit_title").val(title);
	    $("#edit_description").val(description);
	    
	    $("#edit_price").val(parseFloat(price).toFixed(2).toString());
	    $("#edit_id").val(item);
	     $("#remove_button").data('id', item);
    }
    
    
    
        