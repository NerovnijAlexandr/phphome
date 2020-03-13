<?php
class SomeFile
{
    public $filename;
    protected $mode;
    protected $file;
    protected $statAttrs = ['dev', 'ino', 'mode', 'nlink',
        'uid', 'gid', 'rdev', 'size',
        'atime', 'mtime', 'ctime', 'blksize', 'blocks'];

    function __construct(string $filename, $mode='r')
    {
        $this->filename = $filename;
        $this->mode = $mode;
    }

//    function __destruct()
//    {
//        $this->close();
//    }

    protected function open() {
        $this->file = fopen($this->filename, $this->mode);
    }

    protected function close() {
        fclose($this->file);
    }

    public function read(int $size) {
        $this->checkExist();
        $this->open();
        $size = ($size <= 0) ? 1 : $size;
        $text = fread($this->file, $size);
        $this->close();

        return $text;
    }

    public function readAll() {
        $this->checkExist();
        return file_get_contents($this->filename);
    }

    public function write(string $text) {
        $this->open();
        fwrite($this->file, $text);
        $this->close();
    }

    public function rename($newName) {
        $this->checkExist();
        rename($this->filename, $newName);
    }

    public function copy($anotherName) {
        $this->checkExist();
        if($this->filename !== $anotherName)
        {
            copy($this->filename, $anotherName);
        }
    }

    public function getStat() {
        $this->checkExist();

        return stat($this->filename);
    }

    public function getStatParamByName($name) {
        $ind = array_search($name, $this->statAttrs);

        return $this->getStat()[$ind];
    }

    public function getSize() {

        return $this->getStatParamByName('size');
    }

    public function getSizeMb($presition = 2) {

        return round($this->getSize()/(2**10), $presition);
    }

    public function exists():bool {

        return file_exists($this->filename);
    }

    protected function checkExist($filename=null) {
        $filename = $filename ?? $this->filename;
        if(!$this->exists()) {
            throw new Exception($filename.' файла не существует');
        }
    }

    public function delete() {
        $this->checkExist();
        unlink($this->filename);
    }

    public function lines():array {
        $this->checkExist();

        return file($this->filename);
    }
}

class SomeCsvFile extends SomeFile
{
    public $datas = [];

    function __construct($filename, $mode = 'r')
    {
        $this->checkCsv($filename);
        parent::__construct($filename, $mode);
    }

    private function checkCsv($filename) {
        $extension = mb_strtolower(pathinfo($filename)['extension']);
        if($extension != 'csv') {
            throw new Exception('Файл должен имет расширение csv');
        }
    }

    public function readCsv($isFirstRowHeaders = true) {
        $this->checkExist();
        $this->open();

        $i = 0;
        while($data = fgetcsv($this->file, 1000, ';'))
        {
            if($isFirstRowHeaders) {
                if($i != 0) {
                    $this->datas[] = $data;
                }
            } else {
                $this->datas[] = $data;
            }

            $i++;
        }
        $this->close();
    }
}