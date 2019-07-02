function TP_submit()
{
	if(document.TP_form.TP_path.value=="")
	{
	
	}
	else if(document.TP_form.TP_link.value=="")
	{

	}
	else if(document.TP_form.TP_target.value=="")
	{

	}
	else if(document.TP_form.TP_title.value=="")
	{
		alert("Please enter name.")
		document.TP_form.TP_title.focus();
		return false;
	}
	else if(document.TP_form.TP_desc.value=="")
	{
		alert("Please enter the testimonial text.")
		document.TP_form.TP_desc.focus();
		return false;
	}
	else if(document.TP_form.TP_type.value=="")
	{
		alert("Please select or create a new category.")
		document.TP_form.TP_type.focus();
		return false;
	}
	else if(document.TP_form.TP_status.value=="")
	{
		alert("Please select the visibility status.")
		document.TP_form.TP_status.focus();
		return false;
	}
	else if(document.TP_form.TP_order.value=="")
	{
		alert("Please enter the order number.")
		document.TP_form.TP_order.focus();
		return false;
	}
	else if(isNaN(document.TP_form.TP_order.value))
	{
		alert("Please enter the order number.")
		document.TP_form.TP_order.focus();
		return false;
	}
}

function TP_delete(id)
{
	if(confirm("Do you want to delete this testimonial?"))
	{
		document.frm_TP_display.action="options-general.php?page=testimonials-pro/testimonials-pro.php&AC=DEL&DID="+id;
		document.frm_TP_display.submit();
	}
}	

function TP_redirect()
{
	window.location = "options-general.php?page=testimonials-pro/testimonials-pro.php";
}
