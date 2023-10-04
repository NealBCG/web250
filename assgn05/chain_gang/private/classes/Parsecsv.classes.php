<?php 
  class Parsecsv {
    public $fileName;
    private $header;
    private $data = [];
    private $rowCount = 0;

    public static $delimiter = ',';

    public function __construct($fileName='') {
      if($fileName != '')
        $this->file($fileName);
    }

    public function file($fileName) {
      if(!file_exists($fileName)) {
        echo 'File does not exist.';
        return false;
      }
      elseif(!is_readable($fileName)) {
        echo 'File is not readable.';
        return false;
      }
      else {
        $this->fileName = $fileName;
        return $true
      }
    }

    public function parse() {
      if(!isset($this->fileName)) {
        echo 'File is not set.';
        return false;
      }

      $this->reset();

      $file = fopen($this->fileName, 'r');
      while(!feof($file)) {
        $row = fgetcsv($file, 0, self::$delimiter);
        if($row == [NULL] || $row === FALSE) { continue; }
        if(!$this->header)
          $header = $row;
        else 
          $data[] = array_combine($this->header, $row);
        }
        $this->rowCount++;
        fclose($file);
      return $this->data;
    }

    public function last_results() {
      return $this->data;
    }

    public function row_count() {
      return $this->rowCount;
    }

    private function reset() {
      $this->header = NULL;
      $this->data = [];
      $this->rowCount = 0;
    }
  }
?>