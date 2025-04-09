<?php   
require_once __DIR__ . '/../Models/NhanVien.php';

class NhanVienController {
    private $nhanvienModel;
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
        $this->nhanvienModel = new NhanVien($this->conn);
    }

    public function index() {
        $limit = 5;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $start = ($page - 1) * $limit;

        $nhanviens = $this->nhanvienModel->getAll($start, $limit);
        $total_records = $this->nhanvienModel->getTotalRecords();
        $total_pages = ceil($total_records / $limit);

        include 'app/Views/nhanvien/index.php';
    }
}