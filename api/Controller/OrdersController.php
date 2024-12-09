<?php
require_once "Controller.php";
require_once "Repository/OrdersRepository.php" ;


// This class inherits the jsonResponse method  and the $cnx propertye from the parent class Controller
// Only the process????Request methods need to be (re)defined.

class OrdersController extends Controller {

    private OrdersRepository $orders;

    public function __construct(){
        $this->orders = new OrdersRepository();
    }

   
    protected function processGetRequest(HttpRequest $request) {
        $id = $request->getId("id");
        if ($id){
            // URI is .../Orders/{id}
            $p = $this->orders->find($id);
            return $p==null ? false :  $p;
        }
        else{
            return $this->orders->findAll();
        }
    }

    protected function processPostRequest(HttpRequest $request) {
        return false;
    }
   
}

?>