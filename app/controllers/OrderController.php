<?php
// app/controllers/UserController.php
require_once '../app/models/Order.php';
require_once '../app/models/produk.php';
require_once '../app/models/User.php';

class OrderController {
    private $orderModel;
    private $produkModel;
    private $userModel;

    public function __construct() {
        $this->orderModel = new Order();
        $this->produkModel = new Produk();
        $this->userModel = new User();
    }

    public function index() {
        $orders = $this->orderModel->getAllOrders();
        $produk = $this->produkModel;
        $user = $this->userModel;
        $judul = "order";
        require_once '../app/views/template/navbar.php';
        require_once '../app/views/template/table.php';
        require_once '../app/views/order/index.php';
        require_once '../app/views/template/tutup_table.php';
        require_once '../app/views/template/footer.php';
    }

    public function create() {
        $produk = $this->produkModel->getAllProduks();
        $user = $this->userModel->getAllUsers();
        $judul = "order";
        $metode = "Tambah";
        require_once '../app/views/template/navbar.php';
        require_once '../app/views/template/form.php';
        require_once '../app/views/order/create.php';
        require_once '../app/views/template/tutup_form.php';
        require_once '../app/views/template/footer.php';
    }

    public function store() {
        $id_produk = $_POST['id_produk'];
        $id_user = $_POST['id_user'];
        $status = $_POST['status'];
        $this->orderModel->add($id_produk, $id_user, $status);
        header('Location: /order/index');
    }
    // Show the edit form with the user data
    public function edit($id) {
        $order = $this->orderModel->find($id); // Assume find() gets user by ID
        $produk = $this->produkModel->getAllProduks();
        $user = $this->userModel->getAllUsers();
        $judul = "order";
        $metode = "Edit";

        require_once '../app/views/template/navbar.php';
        require_once '../app/views/template/form.php';
        require_once __DIR__ . '/../views/order/edit.php';
        require_once '../app/views/template/tutup_form.php';
        require_once '../app/views/template/footer.php';
    }

    // Process the update request
    public function update($id, $data) {
        $updated = $this->orderModel->update($id, $data);
        if ($updated) {
            header("Location: /order/index"); // Redirect to user list
        } else {
            echo "Failed to update order.";
        }
    }

    // Process delete request
    public function delete($id) {
        $deleted = $this->orderModel->delete($id);
        if ($deleted) {
            header("Location: /order/index"); // Redirect to user list
        } else {
            echo "Failed to delete order.";
        }
    }
}
