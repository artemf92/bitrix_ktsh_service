<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
	die();

if(!empty($arParams["FORM_TITLE"]))
	$arParams["FORM_TITLE"] = strip_tags($arParams["FORM_TITLE"]);
else
	$arParams["FORM_TITLE"] = GetMessage("COMPONENT_FORM_TITLE_DEFAULT");
	

$defaultCallBack = array(
	"COUNT" => "
		<input type='text' name='userCount' class='b-form-input' placeholder='".GetMessage("COMPONENT_FEEDBACK_COUNT").(in_array("COUNT", $arParams["REQUIRED_FIELDS"]) ? '' : '')."' ".(in_array("COUNT", $arParams["REQUIRED_FIELDS"]) ? 'required=required' : '')." />
	",
	"ADDRESS" => "
		<input type='text' name='userAddress' class='b-form-input' placeholder='".GetMessage("COMPONENT_FEEDBACK_ADDRESS").(in_array("ADDRESS", $arParams["REQUIRED_FIELDS"]) ? '' : '')."' ".(in_array("ADDRESS", $arParams["REQUIRED_FIELDS"]) ? 'required=required' : '')." />
	",
	"NAME" => "
		<input type='text' name='userName' class='b-form-input' placeholder='".GetMessage("COMPONENT_FEEDBACK_NAME").(in_array("NAME", $arParams["REQUIRED_FIELDS"]) ? '' : '')."' ".(in_array("NAME", $arParams["REQUIRED_FIELDS"]) ? 'required=required' : '')." />
	",
	"PHONE" => "
		<input type='tel' name='userPhone' class='b-form-input phone-input' placeholder='".GetMessage("COMPONENT_FEEDBACK_PHONE").(in_array("PHONE", $arParams["REQUIRED_FIELDS"]) ? '' : '')."' ".(in_array("PHONE", $arParams["REQUIRED_FIELDS"]) ? 'required=required' : '')." />
	",
	"DATE" => "
		<input type='text' name='userDate' class='b-form-input' placeholder='".GetMessage("COMPONENT_FEEDBACK_DATE").(in_array("DATE", $arParams["REQUIRED_FIELDS"]) ? '' : '')."' ".(in_array("DATE", $arParams["REQUIRED_FIELDS"]) ? 'required=required' : '')." />
	",
	"FILE" => "
        <div class='b-form-input-file-wrap'>
	        <label>".GetMessage("COMPONENT_FEEDBACK_FILE"). "</label>
		    <input type='file' name='userFile' class='b-form-input b-form-input-file' ".(in_array("FILE", $arParams["REQUIRED_FIELDS"]) ? '' : '')."' ".(in_array("FILE", $arParams["REQUIRED_FIELDS"]) ? 'required=required' : '')." />
		    <span></span>
		</div>
	",
	"EMAIL" => "
		<input type='email' name='userEmail' class='b-form-input' placeholder='".GetMessage("COMPONENT_FEEDBACK_EMAIL").(in_array("EMAIL", $arParams["REQUIRED_FIELDS"]) ? '' : '')."' ".(in_array("EMAIL", $arParams["REQUIRED_FIELDS"]) ? 'required=required' : '')." />
	",
	"COMMENT" => "
		<textarea name='userComment' class='b-form-input b-form-texarea' placeholder='".GetMessage("COMPONENT_FEEDBACK_COMMENT")."'></textarea>
	",
);

foreach($arParams["ELEMENT_FORM"] as $key => $element)
{
	$arResult["ELEMENT"][$key][] = $defaultCallBack[$element];
	$arResult["ELEMENT"][$key]["NAME"] = $element;
}