<?php
class NhanVien {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getAll($start, $limit) {
        $sql = "SELECT NV.Ma_NV, NV.Ten_NV, NV.Phai, NV.Noi_Sinh, PB.Ten_Phong, NV.Luong
                FROM NHANVIEN NV
                JOIN PHONGBAN PB ON NV.Ma_Phong = PB.Ma_Phong
                LIMIT $start, $limit";

        $result = $this->conn->query($sql);
        $nhanviens = [];
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $nhanviens[] = $row;
            }
        }
        return $nhanviens;
    }
}