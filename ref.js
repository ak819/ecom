
	function post_frm_src_cat(id){
		
		var sub_cat_id ='';
		var volume = '';
		var comp_id ='';
		jQuery('.sub_cat:checked').each(function(index, element) {
            sub_cat_id += jQuery(this).val()+",";
        });
		jQuery('.volume:checked').each(function(index, element) {
            volume += jQuery(this).val()+",";
        });
		jQuery('.company:checked').each(function(index, element) {
            comp_id += jQuery(this).val()+",";
        });
		jQuery("#price_from").val(jQuery("#amount").val());
		jQuery("#cat_id").val(id);
		jQuery("#price_to").val(jQuery("#amount1").val());
		jQuery("#sort_by").val(jQuery("#sort_by_select").val());
		jQuery("#comp_id").val(comp_id);
		jQuery("#volume").val(volume);
		jQuery("#sub_serval").val(sub_cat_id);
		jQuery("#header_search_frm").trigger('submit');
		
	}

	function getBulkProduct(){
		var bulk_product_search_val = jQuery('#bulk_product_search').val();
		jQuery("#bulk_serch_val").val(bulk_product_search_val);
		jQuery("#header_search_frm").trigger('submit');

		/*$.ajax({
		type:"POST",
		url:'https://agribegri.com/product_category.php',
		data:{bulk_product_search_val:bulk_product_search_val,type:'bulk_product_search_by_name'},
		  
		});*/

	}
<form name="header_search_frm" id="header_search_frm" action="https://agribegri.com/set_session_search_cat.php" method="post">
    	<input type="hidden" name="paging_id" id="paging_id" value="">
        <input type="hidden" name="serval" id="serval" value="">
        <input type="hidden" name="cat_id" id="cat_id" value="">
        <input type="hidden" name="sub_serval" id="sub_serval" value="">
        <input type="hidden" name="byval" id="byval" value="">
        <input type="hidden" name="child_sub_serval" id="child_sub_serval" value="">
        <input type="hidden" name="comp_id" id="comp_id" value="">
        <input type="hidden" name="volume" id="volume" value="ml">
        <input type="hidden" name="price_from" id="price_from" value="">
        <input type="hidden" name="price_to" id="price_to" value="">
        <input type="hidden" name="sort_by" id="sort_by" value="">
        <input type="hidden" name="from_search" id="from_search" value="">
        <input type="hidden" name="bulk_serch_val" id="bulk_serch_val" value="">
        <input type="hidden" name="redirect_url" id="redirect_url" value="/buy-online-organic-products.php">
    </form>