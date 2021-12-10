$(document).ready(function() {
	

	init();


	
	

	$("select[name='category']").on('change', function() {
		// console.log($(this).val())

     
		var cate = "cate_"+$(this).val();
		$serviceObj = $("select[name='subcategory']");
		$serviceObj.empty();
		$serviceObj.append("<option value=''>Select Sub Category</option>");
		var subcategory = subcategoryList[cate];

        console.log(subcategoryList);

       

		if(subcategory) {
			for(var i in subcategory) {
				$serviceObj.append("<option value='"+subcategory[i].id+"'>"+subcategory[i].subcategory_name+"</option>");
			}
		}
	});


});

function init() {
	var cate = "cate_"+$("select[name='category']").val();
	$serviceObj = $("select[name='subcategory']");
	$serviceObj.empty();
	$serviceObj.append("<option value=''>Select Service</option>");
	var subcategory = subcategoryList[cate];
	if(subcategory) {
		for(var i in subcategory) {
			$serviceObj.append("<option value='"+subcategory[i].id+"'>"+subcategory[i].subcategory_name+"</option>");
		}
	}

	
}

