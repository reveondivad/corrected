class ViewFile { 
    public $filename = ''; 

    public function __toString() { 
        if(file_exists($this->filename)) {
            include $this->filename; 
        }
        return """"; 
    } 
}

if (isset($_GET['page'])) { 
    $page = base64_decode($_GET['page']);
    if (preg_match('/^[a-zA-Z0-9_]+$/', $page)) {
        $pdfobject = unserialize($page); 
    } 
} else { 
    $pdfobject = new File(); 
}