<?php
require_once("Model.php");
class User extends Model
{
    public static function authUser()
    {
        if (!empty($_SESSION['auth_user'])) {
            return $_SESSION['auth_user'];
        }
    }

    public static function userIcon($id)
    {
        $iconFile = "{$id}.png";
        $iconFilePath = BASE_DIR . "/images/user_icon/{$iconFile}";
        if (file_exists($iconFilePath)) {
            return $iconFile;
        } else {
            return "me.png";
        }
    }

    /**
     * ユーザ認証（Authorize)
     * @param string $email
     * @param string $password
     * @return array $user
     */
    public function auth($email, $password)
    {
        //検索したEmailのユーザがいれば
        if ($user = $this->findByEmail($email)) {
            //ユーザのパスワードを Hashでチェック
            if (password_verify($password, $user['password'])) {
                return $user;
            }
        }
    }

    /**
     * Emailでユーザ検索
     * @param string $email
     * @return array $user
     */
    public function findByEmail($email)
    {
        // Emailでユーザ検索するSQL
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        //MySQLサーバに実行
        $stmt->execute();
        //ユーザデータを1件取得
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user;
    }

    public function insert($data)
    {
        //パスワードをHash化
        $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
        //usersにデータを挿入するSQL
        $sql = "INSERT INTO users (name, email, password)
                VALUES (:name, :email, :password)";
        $stmt = $this->pdo->prepare($sql);
        //MySQLに実行
        return $stmt->execute($data);
    }

    function validateRegist($data)
    {
        $errors = [];
        if (empty($data['name'])) $errors['name'] = '氏名を入力してください。';
        if (empty($data['email'])) {
            $errors['email'] = 'Emailを入力してください。';
        } else if ($this->findByEmail($data['email'])) {
            $errors['email'] = 'Emailが登録済みです';
        }
        if (empty($data['password'])) {
            $errors['password'] = 'パスワードを入力してください。';
        } else if (strlen($data['password']) < 6 || strlen($data['password']) > 20) {
            $errors['password'] = 'パスワードは6文字以上、20文字以内で入力してください';
        }
        return $errors;
    }
}