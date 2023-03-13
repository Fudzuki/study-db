<?php
class db {
    const HOST = 'localhost';
    const DBNAME = 'ph24';
    const USERNAME = 'root';
    const PASSWORD = 'password';

    private PDO $pdo;

    function __construct(){
        $this->pdo = new PDO(
            'mysql:host='.self::HOST.';dbname='.self::DBNAME.';charset=utf8mb4',
            self::USERNAME,
            self::PASSWORD
        );
    }

    public function insert(string $name, int $price): int|string
    {
        $sql = <<<EOS
            INSERT INTO kadai03_products(name, price) VALUE (?, ?)
        EOS;
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array($name, $price));
        return $this->pdo->lastInsertId();
    }

    public function delete(int $id): bool|string
    {
        $sql = <<<EOS
                DELETE FROM kadai03_products WHERE id = ?
        EOS;
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array($id));
        return $stmt->rowCount() ? '削除が完了しました。' : '削除対象のIDが存在しません。';
    }

    public function update(int $id, string $name, int $price): bool|string
    {
        $sql = <<<EOS
            	UPDATE kadai03_products SET name = ?, price = ? WHERE id = ?
        EOS;
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array($name, $price, $id));
        return $stmt->rowCount() ? '修正が完了しました。' : '削除対象のIDが存在しません。';
    }

    public function select(): bool|string|PDOStatement
    {
        $sql = <<<EOS
            	SELECT * FROM kadai03_products 
        EOS;
        return $this->pdo->query($sql);
    }
}