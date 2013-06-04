	$("#nav_companies").addClass("active");
	
	var current_company;
	//add company
	
	$("#remove_button").click(function(e){
		e.preventDefault();
    if (confirm('Are you sure you want to delete this company?')) {
    
    	     var data = {
		            id: current_company
	            };
		  $.ajax({
	                 type: "POST",
	                 url: "remove-company.php",
	                 data: data,
	                 success: function (res) {
	                      if (res == true) {
	                              //success action
	                              $("#edit-company div").remove(".spinner");
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
		
	
	
	 $("#add-company").validate({
    
	        rules: {
	            title: "required",
	
	        },
	        submitHandler: function (form) {
	            $("#add-company").append('<div class="center spinner"><i class="icon-spinner icon-spin"></i></div>');	                   
	            $("#add-company-error").empty();
	            
	            var title = $("#title").val();

	            
	            var data = {
		            title: title,

	            };
	            
	            $.ajax({
	                 type: "POST",
	                 url: "new-company.php",
	                 data: data,
	                 success: function (res) {
	                      if (res == true) {
	                              //success action
	                              $("#add-company-error").html("Company added successfully");
	                              $("#add-company div").remove(".spinner");

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
	    
	     $("#edit-company").validate({
    
	        rules: {
	            edit_title: "required"
	
	        },
	        submitHandler: function (form) {
	            $("#edit-company").append('<div class="center spinner"><i class="icon-spinner icon-spin"></i></div>');	                   
	            $("#edit-company-error").empty();
	            
	            var title = $("#edit_title").val();
	            var id = $("#edit_id").val();

	            var data = {
	            	title: title,
		            id: id
	            };
	            
	            $.ajax({
	                 type: "POST",
	                 url: "edit-company.php",
	                 data: data,
	                 success: function (res) {
	                      if (res == true) {
	                              //success action
	                              $("#edit-company-error").html("Company edited successfully");
	                              $("#edit-company div").remove(".spinner");

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
            url: "company-data.php", //example script can be anything
            data: data,
            success: function (res) {
                res = $.parseJSON(res);
                $("#feed div").remove(".spinner"); //remove loading icon here
                for (var i = 0; i < res.length; i++) {
                    //use this section to display all the data, use some .append() or something
                    
                    var success = "";
                    
                    if(res[i]['id'] == current_company){
	                    success = "success";
                    }
                    
	                 $("#feed").append("<tr data-id = '" + res[i]['id'] + "' data-title = '" + res[i]['title'] + "' class='editcompany "+success+"'><td>" + res[i]["title"] + "</td></tr>");
	                 
                    number++;
                }

                if (res.length == 0) { //no date left :( sad day
                    //display error message here
                    nodata = true;
                }  
   
                $(".editcompany").unbind('click');
                $(".editcompany").click(function () {
                    //action here
                    
                    var company = $(this).data('id');
                    current_company = company;
                    var title = $(this).data('title');

                   
                    editcompany(company, title);

                });


                loading = false;
            }
        });
    }
    
    function editcompany(company, title, description, price){
    
	    $("#feed tr").removeClass('success');
	    $("#feed tr").each(function(){
		   	if($(this).data('id') == company){
			   	$(this).addClass('success');
		   	}
	    });

	    displayEdit(company, title, description, price);

    }    
    
    
    function displayEdit(company, title, description, price){
	    
	    $("#edit").fadeIn();
	 	  $("#edit-company-error").empty();

	    $("#edit-header").html("Edit "+title);
	    
	    $("#edit_title").val(title);

	    $("#edit_id").val(company);
	     $("#remove_button").data('id', company);
    }
    
    
    
        