showOrder(1);

// SHOW ORDER
function showOrder(page)
{
    $('#page-title').html('Order');
    $('#page-content').fadeOut('slow', function()
    {
        $('#page-content').load('order-read.php?page=' + page, function()
        {
            $('#page-content').fadeIn('slow');

            // Record of Products
            // $.ajax({ 
	           //  type: 'GET', 
	           //  url: '../api/kue.php', 
	           //  data: { get_param: 'record_of_products' }, 
	           //  dataType: 'json',
	           //  success: function (data) { 
	           //      // Record of Order
	           //      var product=[];
		          //   var getrecords_product = data['record_of_products'];
	           //      console.log(getrecords_product);
		          //   for($i in getrecords_product)
		          //   {
		          //   	product[$i] = getrecords_product.nama;
		          //   }

		          //   getrecords_order=getrecords.record_of_order;
		          //   console.log(getrecords_order);
	           //      var month = ['Jan', 'Feb', 'Mar', 'Apr', 'Mai', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
		          //   var toseries=[];
		          //   toseries[0] = [0, 0, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0];
		            // console.log(toseries);
		            // for($i in getrecords) {
		            // 	for($j in month) {
			           //  	if(getrecords[$i].order_created_at == month[$j])
			           //  	{
			           //  		toseries[0][$j]+=parseInt(getrecords[$i].total_order);
			           //  	}
		            // 	}
		            // }

		    //         var data = {
						// labels: product,
						// series: toseries
				      // labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mai', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
				      // series: [
				      //   [542, 443, 320, 780, 553, 453, 326, 434, 568, 610, 756, 895],
				      //   [412, 243, 280, 580, 453, 353, 300, 364, 368, 410, 636, 695],
				      // ]
				    // };

				    // var dataSales = {
			     //      labels: ['9:00AM', '12:00AM', '3:00PM', '6:00PM', '9:00PM', '12:00PM', '3:00AM', '6:00AM'],
			     //      series: [
			     //         [287, 385, 490, 492, 554, 586, 698, 695, 752, 788, 846, 944],
			     //        [67, 152, 143, 240, 287, 335, 435, 437, 539, 542, 544, 647],
			     //        [23, 113, 67, 108, 190, 239, 307, 308, 439, 410, 410, 509]
			     //      ]
			     //    };

			     //    var optionsSales = {
			     //      lineSmooth: false,
			     //      low: 0,
			     //      high: 800,
			     //      showArea: true,
			     //      height: "245px",
			     //      axisX: {
			     //        showGrid: false,
			     //      },
			     //      lineSmooth: Chartist.Interpolation.simple({
			     //        divisor: 3
			     //      }),
			     //      showLine: false,
			     //      showPoint: false,
			     //    };

			     //    var responsiveSales = [
			     //      ['screen and (max-width: 640px)', {
			     //        axisX: {
			     //          labelInterpolationFnc: function (value) {
			     //            return value[0];
			     //          }
			     //        }
			     //      }]
			     //    ];

			     //    Chartist.Line('#chartHours', dataSales, optionsSales, responsiveSales);
	       //      }
	       //  });

		    PaginationButton();
        });
    });

}

function PaginationButton()
{
	$('#pagination li').click(function(){
		$page = $(this).attr('page');

		$('#page-content').fadeOut('slow', function()
    	{
    		showOrder($page);
    	});
	});
}