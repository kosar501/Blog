<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\Common\XMLWriter;
use PhpOffice\PhpWord\Exception\Exception;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Settings;
use PhpOffice\PhpWord\Shared\Html;
use PhpOffice\PhpWord\Shared\ZipArchive;
use PhpOffice\PhpWord\SimpleType\TblWidth;
use PhpOffice\PhpWord\Style\Table;
use PhpOffice\PhpWord\Writer\Word2007\Element\Container;

class IndexController extends Controller
{
    //
    public function index()
    {
        return view('index');
    }

    public function editDocx()
    {
        // Create the Object.
        $zip = new ZipArchive();
        // Use same filename for "save" and different filename for "save as".
        $inputFilename = 'testfile.docx';
        $outputFilename = 'testfile.docx';
        // Some new strings to put in the document.
        $token1 = 'Hello World!';
        $token2 = 'Your mother smelt of elderberries, and your father was a hamster!';
        $filename = 'word.docx';
        // Open the Microsoft Word .docx file as if it were a zip file... because it is.
        if ($zip->open($filename, ZipArchive::CREATE) !== TRUE) {
            echo "Cannot open $filename :( ";
            die;
        }
        // Fetch the document.xml file from the word subdirectory in the archive.
        $xml = $zip->getFromName('word/document.xml');
        // Replace the tokens.
        $xml = str_replace('{TOKEN1}', $token1, $xml);
        $xml = str_replace('{TOKEN2}', $token2, $xml);
        // Write back to the document and close the object
        if ($zip->addFromString('word/document.xml', $xml)) {
            echo 'File written!';
        } else {
            echo 'File not written.  Go back and add write permissions to this folder!l';
        }
        $zip->close();
    }

    public function editDocx1()
    {
        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor('word.docx');
        $templateProcessor->setValue('Hi kosar','Hello kosar','1');
        $templateProcessor->saveAs('word.docx');
    }

    public function editDocx2()
    {
        //Solution to injet into templates without breaking things
        function containerToXML($container){
            $xmlWriter = new XMLWriter(XMLWriter::STORAGE_MEMORY, './', Settings::hasCompatibility());
            $containerWriter = new Container($xmlWriter, $container);
            $containerWriter->write();
            return($xmlWriter->getData());
        }

        //1st working template load and inject content via xml...
        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor("word.docx");
        //Try and build xml from objects and insert xml instead...
        $phpWord = new PhpWord();
        dd($phpWord);

        $fontStyle = array();//if no style given levels do not register (if empty array defaults to template)
        $phpWord->addTitleStyle(1, $fontStyle);
        $phpWord->addTitleStyle(2, $fontStyle);
        $phpWord->addTitleStyle(3, $fontStyle);

        $section = $phpWord->addSection();
        for($i=0;$i < 25;$i++){
            $section->addText("Hello world $i");
        }
        //Table add test
        $tbl = $section->addTable(array(
            "layout" => Table::LAYOUT_AUTO,
            "width"	 => 100 * 50, //in word 1% == 50 unit (with in 1/50)
            "unit"	 => TblWidth::PERCENT
        ));
        $tbl->addRow(900, array('tblHeader' => true));
        $tbl->addCell(150)->addText('Header1');
        $tbl->addCell(150)->addText('Header2');
        $tbl->addCell(150)->addText('Header3');
        $tbl->addCell(150)->addText('Header4');
        for($i=0;$i < 40;$i++){
            $tbl->addRow();
            $tbl->addCell(150)->addText("cell 1 row:$i");
            $tbl->addCell(150)->addText("cell 2 row:$i");
            $tbl->addCell(150)->addText("cell 3 row:$i");
            $tbl->addCell(150)->addText("cell 4 row:$i");
        }

        $section->addTitle('Level 1', 1);
        $section->addTitle('Level 2', 2);
        $section->addTitle('Level 3', 3);

        $elXml = containerToXML($section);

        // remplace our templateContent
        Settings::setOutputEscapingEnabled(false);
        $templateProcessor->setValue('content', $elXml);
        Settings::setOutputEscapingEnabled(true);

        // Save the file :
        $templateProcessor->saveAs("word1.docx");
    }

    public function editDocx3()
    {
        try {
            $PHPWord = new \PhpOffice\PhpWord\PhpWord();
            $document = $PHPWord->loadTemplate('word.docx');
            dd($document);
            $document->setValue('Hi', 'Hello');
            $document->saveAs('word1.docx');
        }
        catch (Exception $e) {
        }
    }

    public function editDocx4()
    {
        $phpWord = \PhpOffice\PhpWord\IOFactory::load('word.docx');
        $section = $phpWord->addSection();


        $description = "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod

        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,

        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo

        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse

        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non

        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.";


        $section->addImage("http://itsolutionstuff.com/frontTheme/images/logo.png");

        $section->addText($description);


        try {
            $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');

            $objWriter->save(storage_path('helloWorld.docx'));

        } catch (Exception $e) {

        }


        return response()->download(storage_path('helloWorld.docx'));
    }

}
