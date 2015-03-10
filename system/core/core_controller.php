<?php 

class core_controller {


	protected function load_view($viewName, $data=array(), $async = false){
		if (file_exists(APP_BASE."/view/$viewName.php")) {
			$view = new view();
			return $view->load($viewName, $data, $async);
		} else echo 404;
	}

	protected function load_model($modelName){
		include('aplication/model/'.$modelName.'.php'); 
		$this->$modelName = new $modelName();
	}

	protected function redirect($url, $permanent = false)
	{
	    if (headers_sent() === false)
	    {
	    	header('Location: ../' . $url, true, ($permanent === true) ? 301 : 302);
	    }

	    exit();
	}
}