<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('publicOrPrivate'))
{
	function publicOrPrivate($name){
		$return_radio = "<p>";

		$data = array(
				'name'        => $name,
				'value'       => '1',
				'checked'     => TRUE,
		);

		$return_radio.='<span style="margin-top: 10px; display: inline-block;"> ';
		$return_radio.=form_radio($data);
		$return_radio.="</span>";
		$return_radio.='<span style="margin: 0 12px 0 4px; vertical-align: text-bottom;"> Public </span>';

		$data = array(
				'name'        => $name,
				'value'       => '2',
				'checked'     => FALSE,
		);
		$return_radio.='<span style="margin-top: 10px; display: inline-block;"> ';
		$return_radio.= form_radio($data);
		$return_radio.="</span>";
		$return_radio.='<span style="vertical-align: text-bottom;"> Confidential </span>';
		$return_radio.="</p>";

		return $return_radio;
	}
}
