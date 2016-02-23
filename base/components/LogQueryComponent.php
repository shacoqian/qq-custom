<?php

/**
 * 基于行数的日志查看(日志目录在runtime下)
 *
 * @author 001425
 */
abstract class LogQueryComponent extends CApplicationComponent {

    public $logFile;
    private $fp;

    /**
     * 初始化
     */
    public function init() {
        parent::init();
        $this->handlerLogFile();
    }

    /**
     * 检测日志文件信息
     */
    private function handlerLogFile() {
        $this->logFile = Yii::app()->request->getParam('f');
        //不允许..
        if (preg_match('~\.\.~', $this->logFile)) {
            $this->logFile = str_replace(array('../', '..\\', '..'), '', $this->logFile);
        }

        $runtime_path = Yii::app()->getRuntimePath();
        $this->logFile = $runtime_path . DIRECTORY_SEPARATOR . $this->logFile;
        if (!is_file($this->logFile)) {
            $this->display('log file not exists');
        }

        $this->fp = fopen($this->logFile, 'r');
    }

    /**
     * 查看最后{n}条数据
     */
    public function tail() {
        $fseek = -0;
        fseek($this->fp, $fseek, SEEK_END);
        $max_fseek = ftell($this->fp);

        $lines = Yii::app()->request->getParam('n');
        $_lines = 0;
        while (($_lines < $lines) && ftell($this->fp) != 1) {
            fseek($this->fp, --$fseek, SEEK_END);
            $char = fread($this->fp, 1);
            if (ord($char) == 10) {
                fseek($this->fp, --$fseek, SEEK_END);
                $next_char = fread($this->fp, 1);
                if (ord($next_char) != 13) {
                    fseek($this->fp, ++$fseek, SEEK_END);
                }

                $_lines++;
            }
        }

        $last_fseek = $max_fseek + $fseek;
        if ($last_fseek <= 0) {
            $last_fseek = $max_fseek;
        }

        $this->display(fread($this->fp, $last_fseek));
    }

    /**
     * 查看前面几条
     */
    public function head() {
        $lines = Yii::app()->request->getParam('n');
        $buffers = '';
        $_lines = 0;
        while (($buffer = fgets($this->fp)) !== false && ($_lines < $lines)) {
            $_lines++;
            $buffers .= $buffer;
        }

        $this->display($buffers);
    }

    /**
     * 查看{n, m}中间几条
     */
    public function view() {
        $lines = explode(',', Yii::app()->request->getParam('n'));
        if ($lines[1] < $lines[0]) {
            $this->display('error lines');
        }

        $i = 1;
        while ($i++ < $lines[0]) {
            fgets($this->fp);
        }

        //$i一直运算到这一步等于$lines[0]的值，所以此处需要-1
        $i--;
        $buffers = '';
        while ($i++ <= $lines[1]) {
            $buffers .= fgets($this->fp);
        }

        $this->display($buffers);
    }

    /**
     * 查看所有日志(下载)
     */
    public function all() {
        header('Content-type: text/plain');
        header('Accept-Ranges: bytes');
        header('Accept-Length: ' . filesize($this->logFile));
        header('Content-Disposition: attachment; filename=' . basename($this->logFile));

        readfile($this->logFile);
    }

    /**
     * 输出日志
     */
    private function display($log_lines = '') {
        ob_start();
        header('content-Type:text/plain;charset=utf-8');
        print_r($log_lines);
        ob_end_flush();
        exit;
    }

    /**
     * 释放资源
     */
    public function __destruct() {
        if ($this->fp) {
            fclose($this->fp);
        }
    }

}
