<?php
class User {
    private int $id;
    private string $login;
    private string $password;
    private string $firstName;
    private string $lastName;

    public function __construct(string $login, string $password)
    {
        $this->login = $login;
        $this->password = $password;
        $this->firstName = "";
        $this->lastName = "";
    }

    public function register() {
        $passwordHash = password_hash($this->password, PASSWORD_ARGON2I);
        $q = "INSERT INTO user VALUES (NULL, ?, ?, ?, ?)";
        $db = new mysqli('localhost', 'root', '', 'loginFormOP');
        $preparedQuery = $db->prepare($q);
        $preparedQuery->bind_param('ssss', $this->login, $passwordHash, $this->firstName, $this->lastName);

        $result = $preparedQuery->execute();
        return $result;
    }

    public function login() {
        $q = "SELECT * FROM user WHERE login = ? LIMIT 1";
        $db = new mysqli('localhost', 'root', '', 'loginFormOP');
        $preparedQuery = $db->prepare($q);
        $preparedQuery->bind_param('s', $this->login);
        $preparedQuery->execute();
        $result = $preparedQuery->get_result();
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $passwordHash = $row['password'];
            if (password_verify($this->password, $passwordHash)) {
                $this->id = $row['id'];
                $this->firstName = $row['firstName'];
                $this->lastName = $row['lastName'];
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }

    }
}
?>