<?php
class DatabaseUtility
{
    public $conn;
    private $hostname = 'db';
    private $username = 'root';
    private $password = 'root';
    private $database = 'doctor_appointment';

    public function __construct()
    {
        $this->conn = new mysqli($this->hostname, $this->username, $this->password, $this->database);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    /**
     * Method to inseert data in a given table.
     */

    public function insertData($table, $data)
    {
        $columns = implode(', ', array_keys($data));
        $values = "'" . implode("', '", array_map([$this->conn, 'real_escape_string'], array_values($data))) . "'";

        $query = "INSERT INTO $table ($columns) VALUES ($values)";

        if ($this->conn->query($query) === TRUE) {
            echo "Data inserted successfully";
            return $this->conn->insert_id;
        } else {
            echo "Error: " . $query . " " . $this->conn->error;
            return false;
        }
    }
    /**
     * Method to retrieve data from a table.
     */
    public function getData($table, $columns = "*", $where = "")
    {
        $query = "SELECT $columns FROM $table";
        if ($where !== "") {
            $query .= " WHERE $where";
        }

        $result = $this->conn->query($query);

        if ($result === FALSE) {
            echo "Error: " . $query . " " . $this->conn->error;
            return false;
        }

        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        return $data;
    }

    /**
     * Method to retrieve appointment data from the appointments table.
     */
    public function getAppointments($where = "")
    {
        return $this->getData("appointments", "*", $where);
    }
    public function closeConnection()
    {
        $this->conn->close();
    }
}


?>