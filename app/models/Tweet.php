<?php
require_once 'Model.php';
class Tweet extends Model
{

    public function validate($data) {
        //TODO: messageが未入力の時のエラーチェック
    }

    public function fetch($id)
    {
        //Tweet IDで1件データ取得するSQL
        $sql = "SELECT * FROM tweets WHERE id = {$id};";
        //SQL実行
        $value = $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
        return $value;
    }

    public function get()
    {
        // 投稿データを投稿日時の新しい順に20件取得
        // ユーザ名も結合（JOIN）
        $sql = "SELECT 
                    tweets.id,
                    tweets.user_id,
                    tweets.message,
                    tweets.created_at,
                    users.name AS user_name
                FROM tweets 
                JOIN users ON tweets.user_id = users.id
                ORDER BY tweets.created_at DESC 
                LIMIT 20;";
        //SQL実行
        $values = $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        $this->values = $values;
        return $values;
    }

    /**
     * Tweet投稿
     * @param array $data
     * @return boolean
     */
    public function insert($data)
    {
        //tweets にログインユーザIDとメッセージを挿入するSQL
        $sql = "INSERT INTO tweets (user_id, message)
                VALUES (:user_id, :message)";
        $stmt = $this->pdo->prepare($sql);
        //MySQLに実行
        return $stmt->execute($data);
    }

    /**
     * Tweet削除
     * @param int $id
     * @return boolean
     */
    public function delete($id)
    {
        $data['id'] = $id;
        //TweetのIDでデータを削除
        $sql = "DELETE FROM tweets WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        //MySQLに実行
        return $stmt->execute($data);
    }
}