<?php
/*
* Filename.......: vcard.php
* Author.........: Troy Wolf [troy@troywolf.com]
* Last Modified..: 2005/07/14 13:30:00
* Description....: Generate a vCard from form data.
*/

$vc = new Modesto_vCard();

/*
The secret here is to name your form fields exactly the same as the vCard
data key names in the class.
*/
foreach ($_POST as $key=>$val) {
	$vc->data[$key] = $val;
}

$vc->download();