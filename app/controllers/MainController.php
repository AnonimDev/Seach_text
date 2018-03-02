<?php
namespace app\controllers;

use vendor\anom\core\Controller;

class MainController extends Controller
{
    private $arr;
    private $text;

    public function index(){
        $this->getText();
        self::rend('main', [
            'text' => nl2br($this->text)
        ]);
    }
    public function ajax(){
        $this->getText();
        if (isset($_POST['value'])){
            $value = $_POST['value'];
            if (!empty($value)) {
                die(json_encode(array('status' => 200, 'text' => nl2br($this->parseText($value)))));
            } else die(json_encode(array('status' => 300, 'text' => nl2br($this->text))));
        } else die(json_encode(array('status' => 400, 'text' => "Ошибка при отправке данных!!!")));
    }
    private function parseText($value){

        $this->arr = str_replace($value, '<span class="text-sea">' . $value . '</span>', $this->text);

        return $this->arr;
    }
    private function getText(){
       $this->text = file_get_contents('files/text.txt');
    }
}