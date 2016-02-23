<?php

Yii::import('base.extensions.phpExcel.PHPExcel');

abstract class PhpExcelComponent extends PHPExcel {
    private $allowfileType = array('Excel5','Excel2007','Excel2003XML','csv','Gnumeric');
    private $inputFileName;
    private $objPHPExcel;
    private $objReader;
    private $chunkFilter;
    
    public function init() {
        
    }
    
    /**
     * 读取EXCEL文件
     * @param string inputFileName 文件路径
     * @param int start 开始行 
     * @param int num 结束行   从start行开始 读取num行  默认为全部
     * @param boolen active true 获取活动区间 false 获取全部不为空区间 
     */
    public function readExcelFile($inputFileName='', $start=0, $num=0, $active=true) {
        $this->inputFileName = $inputFileName;
        //是否是EXCEL文件
        if (! $fileType = $this->getFileType()) {
            return array();
        }
        $this->objReader = PHPExcel_IOFactory::createReader($fileType);
        $this->chunkFilter = new chunkReadFilter($start, $num);
        $this->objReader->setReadFilter($this->chunkFilter);
        if ($active) {
            return $this->loadActiveSheetContent();
        } else {
            return $this->loadAllSheetContent();
        }
    }
    
    /**获取活动区间的数据**/
    private function loadActiveSheetContent() {
        $this->loadExcelFile();
        return $this->doGetActiveSheetContent();
    }
    
    /**执行活动区间获取数据**/
    private function doGetActiveSheetContent() {
        return $this->objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
    }
    
    /**获取所有区间的数据**/
    private function loadAllSheetContent() {
        
    }
    
    /**加载文件**/
    private function loadExcelFile() {
        $this->objPHPExcel = $this->objReader->load($this->inputFileName);
    }
    
    /**返回文件的类型**/
    private function getFileType() {
        //文件不存在
        if (! file_exists($this->inputFileName)) {
            return false;
        }
        //根据文件类型判断
        $fileType = PHPExcel_IOFactory::identify($this->inputFileName);
        return in_array($fileType, $this->allowfileType) ? $fileType : false;
    }
}

/**过滤**/
class chunkReadFilter implements PHPExcel_Reader_IReadFilter {
    private $_startRow = 0;
    private $_endRow = 0;

    public function __construct($startRow=0, $num=0) {
        $this->_startRow = $startRow;
        $this->_endRow = $startRow + $num;
    }

    public function readCell($column, $row, $worksheetName = '') {
        if ( $this->_startRow == $this->_endRow ) {
            if ($row > $this->_startRow) {
                return true;
            }
        } else if ( ($row > $this->_startRow && $row <= $this->_endRow) ) {
            return true;
        }
        return false;
    }
}
