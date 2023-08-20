<?php
class Challenge {
    const UPLOAD_DIRECTORY = './solutions/';
    private $file;
    private $whitelist;

    public function __construct($file) {
        $this->file = $file;
        $this->whitelist = range(1, 24);
    }

    public function moveFile() {
        if (in_array(pathinfo($this->file['name'], PATHINFO_FILENAME), $this->whitelist) && $this->file['error'] == 0) {
            $safeFilename = basename($this->file['name']);
            move_uploaded_file(
                $this->file['tmp_name'],
                self::UPLOAD_DIRECTORY . $safeFilename
            );
        }
    }
}

$challenge = new Challenge($_FILES['solution']);
$challenge->moveFile();
?>