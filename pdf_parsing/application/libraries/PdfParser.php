<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once './vendor/autoload.php';

use Smalot\PdfParser\Parser;

class PdfParser {
    protected $parser;

    public function __construct() {
        $this->parser = new Parser();
    }

    public function parsePdf($pdfFilePath) {
        return $this->parser->parseFile($pdfFilePath);
    }
}
