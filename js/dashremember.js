$(document).ready(function() {
	
function restoreOrder(id,strCookieName) {
	var list = $("#"+id);
	if (list == null) return
	
	// fetch the cookie value (saved order)
	var cookie = $.cookie(strCookieName);
	if (!cookie) return;
	
	// make array from saved order
	var IDs = cookie.split(",");
	
	// fetch current order
	var items = list.sortable("toArray");
	//alert(items);
	// make array from current order
	var rebuild = new Array();
	for ( var v=0, len=items.length; v<len; v++ ){
		rebuild[items[v]] = items[v];
	}
	
	for (var i = 0, n = IDs.length; i < n; i++) {
		
		// item id from saved order
		var itemID = IDs[i];
		
		if (itemID in rebuild) {
		
			// select item id from current order
			var item = rebuild[itemID];
			
			// select the item according to current order
			var child = $("div#"+id+".ui-sortable").children("#" + item);
			
			// select the item according to the saved order
			var savedOrd = $("div#"+id+".ui-sortable").children("#" + itemID);
			
			// remove all the items
			child.remove();
			
			// add the items in turn according to saved order
			// we need to filter here since the "ui-sortable"
			// class is applied to all ul elements and we
			// only want the very first!  You can modify this
			// to support multiple lists - not tested!
			$("div#"+id+".ui-sortable").filter(":first").append(savedOrd);
		}
	}
}
   
function setOrder(id,strCookieName) {
$("#"+id).sortable({
    handle : '.portlet-header',
    update: function() {
        $.cookie(strCookieName, $("#"+id).sortable("toArray"), { expires: 7, path: "/" });
        //var order = $("#boxes").sortable("toArray");
        //alert(order);

    }
	
});
}
/*  Example Usage
setOrder("boxes","boxesSortOrder")
  restoreOrder("boxes","boxesSortOrder");  
  setOrder("boxes2","boxesSortOrder2")
  restoreOrder("boxes2","boxesSortOrder2");  
  */
});