	$("#nav_customers").addClass("active");
	
	var current_customer;
	//add customer
	
	$("#remove_button").click(function(e){
		e.preventDefault();
    if (confirm('Are you sure you want to delete this customer?')) {
    
    	     var data = {
		            id: current_customer
	            };
	            
    
    
		  $.ajax({
	                 type: "POST",
	                 url: "remove-customer.php",
	                 data: data,
	                 success: function (res) {
	                      if (res == true) {
	                              //success action
	                              $("#edit-customer div").remove(".spinner");
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
		
	
	
	 $("#add-customer").validate({
    
	        rules: {
	            name: "required",
	            company: "required",
	
	        },
	        submitHandler: function (form) {
	            $("#add-customer").append('<div class="center spinner"><i class="icon-spinner icon-spin"></i></div>');	                   
	            $("#add-customer-error").empty();
	            
	            var name = $("#name").val();
	            var company = $("#company").val();
	            
	            var data = {
		            name: name,
		            company: company
	            };
	            
	            $.ajax({
	                 type: "POST",
	                 url: "new-customer.php",
	                 data: data,
	                 success: function (res) {
	                      if (res == true) {
	                              //success action
	                              $("#add-customer-error").html("Customer added successfully");
	                              $("#add-customer div").remove(".spinner");

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
	    
	     $("#edit-customer").validate({
    
	        rules: {
	            edit_name: "required",
	            edit_company: "required",
	
	        },
	        submitHandler: function (form) {
	            $("#edit-customer").append('<div class="center spinner"><i class="icon-spinner icon-spin"></i></div>');	                   
	            $("#edit-customer-error").empty();
	            
	            var name = $("#edit_name").val();
	            var company = $("#edit_company").val();
	            var id = $("#edit_id").val();

	            var data = {
		            name: name,
		            company: company,
		            id: id
	            };
	            
	            $.ajax({
	                 type: "POST",
	                 url: "edit-customer.php",
	                 data: data,
	                 success: function (res) {
	                      if (res == true) {
	                              //success action
	                              $("#edit-customer-error").html("Customer edited successfully");
	                              $("#edit-customer div").remove(".spinner");

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
            url: "customer-data.php", //example script can be anything
            data: data,
            success: function (res) {
                res = $.parseJSON(res);
                $("#feed div").remove(".spinner"); //remove loading icon here
                for (var i = 0; i < res.length; i++) {
                    //use this section to display all the data, use some .append() or something
                    
                    var success = "";
                    
                    if(res[i]['id'] == current_customer){
	                    success = "success";
                    }
                    
	                 $("#feed").append("<tr data-id = '" + res[i]['id'] + "' data-name = '" + res[i]['name'] + "' data-company = '" + res[i]['company'] + "' class='editcustomer "+success+"'><td>" + res[i]["name"] + "</tr>");
	                 
                    number++;
                }

                if (res.length == 0) { //no date left :( sad day
                    //display error message here
                    nodata = true;
                }  
   
                $(".editcustomer").unbind('click');
                $(".editcustomer").click(function () {
                    //action here
                    
                    var customer = $(this).data('id');
                    current_customer = customer;
                    var name = $(this).data('name');
                    var company = $(this).data('company');
                   
                    editcustomer(customer, name, company);

                });


                loading = false;
            }
        });
    }
    
    function editcustomer(customer, name, company){
    
	    $("#feed tr").removeClass('success');
	    $("#feed tr").each(function(){
		   	if($(this).data('id') == customer){
			   	$(this).addClass('success');
		   	}
	    });

	    displayEdit(customer, name, company);

    }    
    
    
    function displayEdit(customer, name, company){
	    
	    $("#edit").fadeIn();
	 	  $("#edit-customer-error").empty();

	    $("#edit-header").html("Edit "+name);
	    
	    $("#edit_name").val(name);
	    $("#edit_company").val(company);
	    
	    $("#edit_id").val(customer);
	     $("#remove_button").data('id', customer);
    }
    
    
    
        