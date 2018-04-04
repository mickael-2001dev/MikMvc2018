<?php  

class ForgetPassword extends Controller
{
	
	public function __construct()
	{
		parent::__construct();
        $this->view->setTemplate('admin');
        $this->login = new Login();	
	}

	public function index() 
	{
		$data = null;
        $work = false;

        if(filter_input(INPUT_POST, 'forget')) {

            $index = $this->indexInput($_POST);
            $newPass = $this->passowordGenerator(8);

            //var_dump($index);
            //var_dump($newPass);
            
            if($this->login->updateTempPassword($index['user'], $newPass)) {

            	$msg = 'A sua senha é: '.$newPass;
                $this->sendMail($index['email'], $msg);
               	$this->location();
            }
            
        }

        if(!$work) {
            $this->view->load('forgot-password', $data); 
        }
	}

	private function indexInput(array $indexForm)
    {
        $index = [];

        foreach ($indexForm as $key => $value) {
            $index [$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_STRING);
        }

        return $index;
    }  

    private function passowordGenerator($size) 
	{
		$randomPass = "";

		$strings = 'ABCDEFGHIJKLMNOPQRSTUVXWYZabcdefghijklmnopqrstuvxwyz123456789!@#$%*-';

		for ($i = 0; $i < $size ; $i++) { 
			$randomPass.= $strings[rand(0, strlen($strings) - 1)];
		}

		return $randomPass;
	}

	private function sendMail($mail, $msg, $replyUser = null, $theme = "Nova Senha!") 
    {
     	var_dump($msg);
        $mail = new Email($mail, $theme, $msg, null, $replyUser);
        if($mail->send()) {
            return true;
        } else {
            return false;
        }

    }

}