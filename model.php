<?php

class Model{

    private $server = "localhost";
    private $user = "root";
    private $password = "";
    private $db = "date_range";
    private $conn ;

    public function __construct()
    {
        try {
            $this->conn = new mysqli($this->server, $this->user, $this->password, $this->db);
        } catch (\Throwable $th) {
            //throw $th;
            echo "Connection error " . $th->getMessage();
        }
    }


    

    public function fetch(){
        $data = [];
        
        $sql = "SELECT * FROM student ";
      
        if($result = $this->conn->query($sql)){
            while($row = mysqli_fetch_assoc($result)){

                $data[] = $row; 


            }
        }
      
        
        return $data;
    }
    

    public function date_range($start_date, $end_date)
    {
        $data = [];

        if (isset($start_date) && isset($end_date)) {
            $query = "SELECT * FROM `student` WHERE `created_at` > '$start_date' AND `created_at` < '$end_date'";
            if ($sql = $this->conn->query($query)) {
                while ($row = mysqli_fetch_assoc($sql)) {
                    $data[] = $row;
                }
            }
        }

        return $data;
    }

}
