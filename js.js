var options = {

  url: function(phrase) {
    return "employee.php";
  },

  getValue: function(element) {
    return element.Tu;
  },

  ajaxSettings: {
    dataType: "json",
    method: "POST",
    data: {
      dataType: "json"
    }
  },

  preparePostData: function(data) {
    data.phrase = $("#example-ajax-post").val();
    return data;
  },
list: {

		onSelectItemEvent: function() {
			var value = $("#example-ajax-post").getSelectedItemData().Nghia;

			 $("#Nghia").text(value);
		}
	},
  requestDelay: 20
};

$("#example-ajax-post").easyAutocomplete(options);