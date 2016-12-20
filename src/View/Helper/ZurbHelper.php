<?php

namespace Gerrymcdonnell\Changelog\View\Helper;
use Cake\View\Helper;

class ZurbHelper extends Helper{
	
	var $helpers = array('Html');
	
	public function initialize(array $config){
		//debug('Zurbdemo helper loaded');
	}
	
	

	//alert divs
	public function alertBoxBlue($msg){
		echo $this->_View->element('bluealert', ["msg" => $msg]);
	}	
	
	public function alertBoxGreen($msg){
		echo $this->_View->element('sucessbox', ["msg" => $msg]);
	}
	
	public function alertBoxOrange($msg){
		echo $this->_View->element('orangealert', ["msg" => $msg]);
	}
		
	public function alertBoxSecondary($msg){
		echo $this->_View->element('alertsecondary', ["msg" => $msg]);
	}
	
	
	//breadcrumbs - to finish
	//************************************************************************************************	
	public function breadcrumbs($msg){
		//echo $this->_View->element('breadcrumbs', ["msg" => $msg]);
		
		echo '<h4 id="breadcrumbs">Breadcrumbs</h4>';
		echo '<ul class="breadcrumbs">';
		  
		  //add items here
		  
		echo '</ul>';
	}
	
	function breadcrumb_additem($text,$url){
		return '<li>'.$this->Html->link($text,$url).'</li>';
	}
	
	//'<li class="unavailable"><a href="#">Gene Splicing</a></li>';
	function breadcrumb_addunavailableitem($text,$url){
		return '<li class="unavailable">'.$$this->Html->link($text,$url).'</li>';
	}
	
	function breadcrumb_addcurrentitem($text,$url){
		return '<li class="current">'.$$this->Html->link($text,$url).'</li>';
	}
	//************************************************************************************************	
	
	
	
	//buttons
	
	//tiny button
	public function addButton($text,$url,$class){
		echo $this->Html->link($text,$url,['class'=>$class]).'<br>';
	}
	
	

	
	//labels  
	//http://foundation.zurb.com/sites/docs/v/5.5.3/components/labels.html
	public function printLabel($labeltype,$text){
		
		if($labeltype=='regular'){
			echo '<span class="label">'.$text.'</span><br>';
		}
		elseif ($labeltype=='secondary'){
			echo '<span class="radius secondary label">'.$text.'</span><br>';
		}
		elseif ($labeltype=='alert'){
			echo'<span class="round alert label">'.$text.'</span><br>';
		}
		elseif ($labeltype=='success'){
			echo '<span class="success label">'.$text.'</span><br>';
		}	
		elseif ($labeltype=='warning'){
			echo '<span class="warning label">'.$text.'</span><br>';
		}
		elseif ($labeltype=='info'){
			echo '<span class="info label">'.$text.'</span><br>';
		}
	}
	
	
	//may 4th
	//top menu
	
	
	
	
	
}

?>
