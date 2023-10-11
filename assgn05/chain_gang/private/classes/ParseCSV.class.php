<?php 
  class ParseCSV {
    public $fileName;
    private $header;
    private $data = [];
    private $rowCount = 0;

    //The delimiter attribute defines the marker used to separate data in a row of the file. The purpose is to have an object that can easily be changed, rather than a hard coded marker in a function.
    public static $delimiter = ',';

    public function __construct($fileName = '') {
      if($fileName != '')
        $this->file($fileName);
    }

    //The file function checks to see if the name assigned to the $fileName variable corresponds to an actual file. This is a form of validation.
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
        return true;
      }
    }

    //The parse function checks to see if a file name has been assigned to the $fileName variable and returns an error if it has not. This is a form of validation.
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
          $this->header = $row;
        else 
          $this->data[] = array_combine($this->header, $row);
          $this->rowCount++;
        }
        fclose($file);
      return $this->data;
    }

    // The last results function returns the array stored in the $data variable. This allows us to see the last row that was loaded from the file.
    public function last_results() {
      return $this->data;
    }

    //The row_count function simply displays the number stored in the $rowCount variable. This allows us to see how many rows of data have been read from the file.
    public function row_count() {
      return $this->rowCount;
    }

    //The reset function clears data already loaded from a file. This allows us to load another file or the same file without errors.
    private function reset() {
      $this->header = NULL;
      $this->data = [];
      $this->rowCount = 0;
    }
  }
?>