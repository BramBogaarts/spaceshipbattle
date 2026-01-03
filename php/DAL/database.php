<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../../css/data.css">
</head>
<body>
<?php
class database
{
  private $conn;
  private $host;
  private $username;
  private $password;
  private $database;
  
  public function __construct()
  {
    // Laad .env bestand 
    $this->loadEnv(__DIR__ . '/../../.env');
    
    // Haal waarden op uit variabelen
    $this->host = getenv('DB_HOST');
    $this->username = getenv('DB_USER');
    $this->password = getenv('DB_PASS');
    $this->database = getenv('DB_NAME');
    
    try {
      // Eerste verbinding ZONDER database om database aan te maken
      $this->conn = new PDO(
        "mysql:host={$this->host};charset=utf8mb4",
        $this->username,
        $this->password
      );
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
      // Database aanmaken als deze nog niet bestaat
      $sql = "CREATE DATABASE IF NOT EXISTS `{$this->database}`";
      $this->conn->exec($sql);
      
      // Database selecteren
      $this->conn->exec("USE `{$this->database}`");
      
      // Tabel aanmaken als deze nog niet bestaat
      $sql = "CREATE TABLE IF NOT EXISTS spaceship (
        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100) NOT NULL,
        health INT NOT NULL,
        power INT NOT NULL,
        length INT NOT NULL
      )";
      $this->conn->exec($sql);
      
    } catch (PDOException $e) {
      die("Database setup mislukt: " . $e->getMessage());
    }
  }
  
  /**
   * Laadt .env bestand en zet variabelen in environment
   */
  private function loadEnv($path)
  {
    if (!file_exists($path)) {
      throw new Exception(".env bestand niet gevonden op: {$path}");
    }
    
    $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
      // Skip comments
      if (strpos(trim($line), '#') === 0) {
        continue;
      }
      
      // Controleert of de regel een = teken bevat. Als er geen = in staat, wordt deze regel overgeslagen
      if (strpos($line, '=') !== false) {
        // Splitst de regel in twee delen bij het eerste = teken
        list($key, $value) = explode('=', $line, 2);
        // verwijdert de spaties aan het begin en einde
        $key = trim($key);
        $value = trim($value);
        
        // Verwijder quotes als aanwezig
        $value = trim($value, '"\'');
        
        // Zet in environment
        putenv("{$key}={$value}");
      }
    }
  }
  
  public function GetSpaceships()
  {
    try {
      $sql = "SELECT * FROM spaceship";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC); 
    } catch (PDOException $e) {
      echo "fout bij ophalen spaceships: " . $e->getMessage();
      return [];
    }
  }
  
  public function GetSpaceshipById($id)
  {
    try {
      $sql = "SELECT * FROM spaceship WHERE id = :id";
      $stmt = $this->conn->prepare($sql);
      $stmt->bindParam(':id', $id, PDO::PARAM_INT);
      $stmt->execute();
      return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      echo "Fout bij ophalen spaceship: " . $e->getMessage();
      return null;
    }
  }
  
  public function AddSpaceship($name, $health, $power, $length)
  {
    try {
      $sql = "INSERT INTO spaceship (name, health, power, length) VALUES (:name, :health, :power, :length)";
      $stmt = $this->conn->prepare($sql);
      $stmt->bindParam(':name', $name);
      $stmt->bindParam(':health', $health, PDO::PARAM_INT);
      $stmt->bindParam(':power', $power, PDO::PARAM_INT);
      $stmt->bindParam(':length', $length, PDO::PARAM_INT);
      $stmt->execute();
      return $this->conn->lastInsertId();
    } catch (PDOException $e) {
      echo "Fout bij toevoegen spaceship: " . $e->getMessage();
      return false;
    }
  }
  
  public function UpdateSpaceship($id, $name, $health, $power, $length)
  {
    try {
      $sql = "UPDATE spaceship SET name = :name, health = :health, power = :power, length = :length WHERE id = :id";
      $stmt = $this->conn->prepare($sql);
      $stmt->bindParam(':id', $id, PDO::PARAM_INT);
      $stmt->bindParam(':name', $name);
      $stmt->bindParam(':health', $health, PDO::PARAM_INT);
      $stmt->bindParam(':power', $power, PDO::PARAM_INT);
      $stmt->bindParam(':length', $length, PDO::PARAM_INT);
      return $stmt->execute();
    } catch(PDOException $e) {
      echo "Fout bij updaten spaceship: " . $e->getMessage();
      return false;
    }
  }
  
  public function DeleteSpaceship($id)
  {
    try {
      $sql = "DELETE FROM spaceship WHERE id = :id";
      $stmt = $this->conn->prepare($sql);
      $stmt->bindParam(':id', $id, PDO::PARAM_INT);
      return $stmt->execute();
    } catch(PDOException $e) {
      echo "Fout bij verwijderen spaceship: " . $e->getMessage();
      return false;
    }
  }
  
  public function DropDatabase()
  {
    try {
      $sql = "DROP DATABASE IF EXISTS `{$this->database}`";
      $this->conn->exec($sql);
      return true;
    } catch(PDOException $e) {
      echo "Fout bij verwijderen database: " . $e->getMessage();
      return false;
    }
  }
}
?>
</body>
</html>
