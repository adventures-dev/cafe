$("#nav_purchases").addClass("active");

var date_one = $("#date_one").val();
var date_two = $("#date_two").val();
var data_array;
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
    
    $("#date_one").change(function(){
	   	date_one = $("#date_one").val();
	   	number = 0;
	   	nodata = false;
	   	loading = false;
	   	$("#feed").empty();
	   	getData();
	   	 
    });
  $("#date_two").change(function(){
	   	date_two = $("#date_two").val();
	   	number = 0;
	   	nodata = false;
	   	loading = false;
	   	$("#feed").empty();
	   	getData();
	   	 
    });
    
    $("#export_button").click(function(){
    	$("#export_button").append('<div class="center spinner"><i class="icon-spinner icon-spin icon-large"></i></div>');

    
		     jQuery('#feed').TableCSVExport({
		       header:['Date','Customer','Item','Price'],
		       columns:['Date','Customer','Item','Price'],
		       delivery: 'download'
		     });

		
		
		$("#export_button div").remove(".spinner"); //remove loading icon here

	    
    })


    function getData() {

        loading = true;
        var data = {
            ///include all post data in this array
            date_one: date_one,
            date_two: date_two,
            number: number
        };

        //insert loading icon here
        $("#feed").append('<div class="center spinner"><i class="icon-spinner icon-spin icon-2x"></i></div>');

        $.ajax({
            type: "POST",
            url: "purchases-data.php", //example script can be anything
            data: data,
            success: function (res) {
                res = $.parseJSON(res);
                data_array = res;
                $("#feed div").remove(".spinner"); //remove loading icon here
                for (var i = 0; i < res.length; i++) {
                    //use this section to display all the data, use some .append() or something
	                 $("#feed").append("<tr data-id = '" + res[i]['id'] + "' ><td>" + res[i]["date_created"] + "</td><td>" + res[i]["customer"] + "</td><td>" + res[i]["item"] + "</td><td>" + res[i]["price"] + "</td><td><button class='btn btn-danger pull-right remove_purchase_button' data-id='" + res[i]['id'] + "'>Remove</button></td></tr>");
	                 
                    number++;
                }
                
                $(".remove_purchase_button").unbind("click");
                 $(".remove_purchase_button").click(function(){
	                 var purchase = $(this).data('id');
	                 remove_purchase_button(purchase);
                 });

                

                if (res.length == 0) { //no date left :( sad day
                    //display error message here
                    nodata = true;
                }  
   
              
                loading = false;
            }
        });
    }
    
    
    function remove_purchase_button(purchase){
	    
	    var data = {
		    purchase: purchase
	    };
	    $.ajax({
	         type: "POST",
	         url: "remove-purchase.php",
	         data: data,
	         success: function (res) {
	              $("tr").each(function(){
		              var id = $(this).data("id");
		              
		              if(purchase == id){
			              $(this).remove();
		              }
	              })
	    
	         }
	    });
	    
	    
    }
