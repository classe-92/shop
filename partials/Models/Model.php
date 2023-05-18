<?php
include __DIR__ . '/../server/settings.php';
abstract class Model
{


    public function __construct()
    {

    }
    public static function fetchAll($conn, array $fields, $table)
    {

        $sql = "SELECT ";
        foreach ($fields as $key => $value) {
            if ($value !== '*') {
                $sql .= $key === count($fields) - 1 ? "`$value` " : "`$value`, ";
            } else {
                $sql .= $key === count($fields) - 1 ? "$value " : "$value, ";
            }

        }
        $sql .= "FROM $table";
        echo $sql;
        $result = $conn->query($sql);

        return $result;

    }
    public static function fetchOne($conn, $id, $table, $class)
    {
        $sql = "SELECT * FROM `$table` WHERE `id` = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $id);

        $stmt->execute();

        $result = $stmt->get_result();
        var_dump($result);
        $num_rows = $result->num_rows;
        echo $num_rows;

        if ($num_rows > 0) {
            $row = $result->fetch_object($class);
            //fetch_assoc();

            return $row;

        }
    }
}
//public function __construct(User ...$Users) { e 2 come li metto ? oppure User[]