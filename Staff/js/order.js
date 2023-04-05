$(document).ready(function(){

var DOMAIN = "http://localhost/onefarm/Admin";
	addNewRow();

	$("#add").click(function(){
		addNewRow();
	})


	
	function addNewRow(){
		$.ajax({
			url : DOMAIN+"/includes/process.php",
			method : "POST",
			data : {getNewOrderItem:1},
			success : function(data){
				$("#invoice_item").append(data);
				var n = 0;
				$(".number").each(function(){
					$(this).html(++n);
				})
			}
		})
	}

	$("#remove").click(function(){
		$("#invoice_item").children("tr:last").remove();
		calculate(0,0);
	})

	$("#invoice_item").delegate(".productID","change",function(){
		var productID = $(this).val();
		var tr = $(this).parent().parent();
		$(".overlay").show();
		$.ajax({
			url : DOMAIN+"/includes/process.php",
			method : "POST",
			dataType : "json",
			data : {getPriceAndQty:1,id:productID},
			success : function(data){
				tr.find(".tqty").val(data["productQuantity"]);
				tr.find(".pro_name").val(data["productName"]);
				tr.find(".productID").val(data["productID"]);
				tr.find(".qty").val(1);
				tr.find(".price").val(data["productSprice"]);
				tr.find(".profit").val(data["productCprice"]);
				tr.find(".amt").html( tr.find(".qty").val() * tr.find(".price").val() );
				calculate(0,0);
				tr.find(".amt2").html( tr.find(".qty").val() * tr.find(".profit").val() );
				calculate(0,0);
				
			}
		})
	})

	$("#invoice_item").delegate(".qty","keyup",function(){
		var qty = $(this);
		var tr = $(this).parent().parent();
		if (isNaN(qty.val())) {
			alert("Please enter a valid quantity");
			qty.val(1);
		}else{
			if ((qty.val() - 0) > (tr.find(".tqty").val()-0)) {
				alert("Sorry ! This much of quantity is not available");
				aty.val(1);
			}else{
				tr.find(".amt").html(qty.val() * tr.find(".price").val());
				calculate(0,0);
				tr.find(".amt2").html(qty.val() * tr.find(".profit").val());
				calculate(0,0);
			}
		}

	})

	function calculate(dis,paid){
		var receiptSubTotal = 0;
		var receiptTax = 0;
		var receiptNetTotal = 0;
		var receiptDiscount = dis;
		var paid_amt = paid;
		var due = 0;
		var receiptProfit = 0;
		var netProfit = 0;
		$(".amt").each(function(){
			receiptSubTotal = receiptSubTotal + ($(this).html() * 1);
		})
		$(".amt2").each(function(){
			receiptProfit = receiptProfit + ($(this).html() * 1);
		})
		receiptTax = 0.06 * receiptSubTotal;
		receiptNetTotal = receiptTax + receiptSubTotal;
        receiptNetTotal = receiptNetTotal * ((100-receiptDiscount)/100);
		due = paid_amt - receiptNetTotal;
		netProfit = receiptSubTotal - receiptProfit;
		$("#receiptTax").val(receiptTax.toFixed(2));
		$("#receiptSubTotal").val(receiptSubTotal.toFixed(2));
		
		$("#receiptDiscount").val(receiptDiscount);
		$("#receiptNetTotal").val(receiptNetTotal.toFixed(2));
		//$("#paid")
		$("#due").val(due.toFixed(2));

		$("#netProfit").val(netProfit.toFixed(2));

	}

	$("#receiptDiscount").keyup(function(){
		var receiptDiscount = $(this).val();
		calculate(receiptDiscount,0);
	})


	$("#paid").keyup(function(){
		var paid = $(this).val();
		var receiptDiscount = $("#receiptDiscount").val();
		calculate(receiptDiscount,paid);
	})


	/*Order Accepting*/

	$("#order_form").click(function(){

		var invoice = $("#get_order_data").serialize();
		if($("#paid").val() === ""){
			alert("Please enter paid amount");

		}else{
			$.ajax({
				url : DOMAIN+"/includes/process.php",
				method : "POST",
				data : $("#get_order_data").serialize(),
				success : function(data){

					if (data < 0) {
						alert(data);
					}else{
						$("#get_order_data").trigger("reset");

						if (confirm("Do u want to print receipt ?")) {
							window.location.href = DOMAIN+"/includes/invoice_bill.php?"+invoice;
						}
					}

						
						

					

				}
			});
		}
		
			
		
		

	});

});