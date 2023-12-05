<?php
class LoginModel
{
    private $param;
    private $conn;
    private $statement;

    public function __construct()
    {
        try {
            $this->conn = new PDO('mysql:host=localhost;dbname=db_cc', 'root', '');
            $this->param = new stdClass;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function login($request = [])
    {
        try {
            $username = htmlspecialchars(trim($request[0]['username'])) ?? null;
            $password = htmlspecialchars(trim($request[0]['password'])) ?? null;

            //validasi akun
            $query = "SELECT * FROM users WHERE username = :username";
            $result = $this->conn->prepare($query);
            $result->bindParam(':username', $username);
            $result->execute();
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $res = $result->fetchAll();

            //logic login
            if ($username == $res[0]['username'] && password_verify($password, $res[0]['password'])) {
                return [
                    'status' => true,
                    'tipe' => $res[0]['tipe'],
                    'id' => $res[0]['id']
                ];
            } else {
                return null;
            }
        } catch (Exception $e) {

        } catch (PDOException $e) {

        }
    }
}
?>