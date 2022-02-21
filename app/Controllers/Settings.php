<?php


namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\DashboardModel;
use App\Models\StoreModel;

class Settings extends Controller {

    /**
     * an instance of the DashboardModel Class
     * @var object $dashModel
     */
    public $dashModel;

    /**
     * an instance of the StoreModel Class
     * @var object $storeModel
     */
    public $storeModel;

    /**
     * user id of the logged user
     * @var array|string|null
     */
    public $user_id;

    /**
     * store id of the current store
     * @var array|string|null
     */
    public $store_id;

    /**
     * array of the data of the current logged user
     * @var false|mixed
     */
    public $userdata;

    /**
     * object class of the data of the current logged store
     * @var false|mixed
     */
    public $store_data;

    /**
     * Store Class constructor.
     */
    public function __construct() {
        $this->dashModel = new DashboardModel();
        $this->storeModel = new StoreModel();
        $this->user_id = session()->get("user_id");
        $this->store_id = session()->get("store_id");
        helper(['form']);
        session()->setTempdata('store','active',1);
    }

    /**
     * Main function of this Controller
     * @return string
     */
    public function index(){
        /**
         * checks the session for active user otherwise it will
         * redirect to the login page
         */
        if (!session()->has("logged_user")) {
            return redirect()->to(base_url());
        }

        $this->userdata = $this->dashModel->getLoggedUserData((string)$this->user_id);
        $this->store_data = $this->storeModel->getStoreData($this->store_id);
        $data['storedata'] = $this->store_data;
        $data['userdata'] = $this->userdata;
        return view("settings_view", $data);
    }

}