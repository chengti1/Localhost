<?php

class Upload extends CI_Controller {


    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');                    /***** LOADING HELPER TO AVOID PHP ERROR ****/
//      $this->load->helper(array('form'，'url'));
    }

    function index()
    {
        //$this->load->view('upload_form'，array('error' => ' ' ));
    }

    public function uploadImage()
    {
        header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        header("Cache-Control: no-store, no-cache, must-revalidate");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");

        $partner_id = "test";//$this->data['partner_id'];
        $fileType = "";//$_REQUEST['type'];
        // Settings
        $targetDir = FCPATH . 'uploads/tmp/‘;
        
        $cleanupTargetDir = true; // Remove old files
        $maxFileAge = 5 * 3600; // Temp file age in seconds

        $speed = 0.1;// 0.1 Mb/second
        if (strpos( $_SERVER['HTTP_USER_AGENT'], 'Safari') !== false){
            @set_time_limit( 15360/$speed );
        }else{
            @set_time_limit( 60/$speed);
        }

        // Uncomment this one to fake upload time
        // usleep(5000);
        // Create target dir
        if (!file_exists($targetDir)) {
            @mkdir($targetDir);
        }

        $boolRequest = true;

        // Get a file name
        if (isset($_REQUEST["name"])) {
            $fileName = $_REQUEST["name"];
        } elseif (!empty($_FILES)) {
            $fileName = $_FILES["file"]["name"];
        } else {
            $fileName = uniqid("file_");
            $boolRequest = false;
        }
        // Get parameters
        $chunk = isset($_REQUEST["chunk"]) ? intval($_REQUEST["chunk"]) : 0;
        $chunks = isset($_REQUEST["chunks"]) ? intval($_REQUEST["chunks"]) : 0;

        // Clean the fileName for security reasons
        $fileName = $partner_id."_".preg_replace('/[^\w\._]+/', '_', $fileName);
        $filePath = $targetDir."/".$fileName;

        // Remove old temp files
        if ($cleanupTargetDir) {
            if (!is_dir($targetDir) || !$dir = opendir($targetDir)) {
                die('{"jsonrpc" : "2.0", "error" : {"code": 100, "message": "Failed to open temp directory."}, "id" : "id"}');
            }

            while (($file = readdir($dir)) !== false) {
                $tmpfilePath = $targetDir . "/" . $file;

                // If temp file is current file proceed to the next
                if ($tmpfilePath == "{$filePath}.part") {
                    continue;
                }

                // Remove temp file if it is older than the max age and is not the current file
                if (preg_match('/\.part$/', $file) && (filemtime($tmpfilePath) < time() - $maxFileAge)) {
                    @unlink($tmpfilePath);
                }
            }
            closedir($dir);
        }


        // Open temp file
        if (!$out = @fopen("{$filePath}.part", $chunks ? "ab" : "wb")) {
            die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
        }

        if (!empty($_FILES)) {
            if ($_FILES["file"]["error"] || !is_uploaded_file($_FILES["file"]["tmp_name"])) {
                die('{"jsonrpc" : "2.0", "error" : {"code": 103, "message": "Failed to move uploaded file."}, "id" : "id"}');
            }

            // Read binary input stream and append it to temp file
            if (!$in = @fopen($_FILES["file"]["tmp_name"], "rb")) {
                die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
            }
        } else {
            if (!$in = @fopen("php://input", "rb")) {
                die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
            }
        }

        if($boolRequest)
        {
            while ($buff = fread($in, 4096)) {
                fwrite($out, $buff);
            }
        }else{

            preg_match('/boundary=(.*)$/', $_SERVER['CONTENT_TYPE'], $matches);

            if(count($matches) >1 && !empty($matches[1])){

                $boundary = $matches[1];

                $content_type = '';
                $disposition = '';
                $block = '';
                while (!feof($in)) {
                    $line = fgets($in);
                    if(strpos($line,$boundary)!==false){
                        $content_type = '';
                        $disposition = '';
                        $block = '';
                        if(feof($in)) break;
                        $line = fgets($in);
                        while($line!="\r\n" && !feof($in)){
                            preg_match('/^(.*): (.*)$/', $line, $type_matches);
                            if(count($type_matches)>2){
                                if($type_matches[1] == 'Content-Type'){
                                    $content_type = $type_matches[2];
                                }else if($type_matches[1] == 'Content-Disposition'){
                                    $disposition = $type_matches[2];
                                    $arr = explode(';',$disposition);

                                    foreach($arr as $item){
                                        $temp = explode('=',trim($item));
                                        if(count($temp)==2 && $temp[0] == 'name'){
                                            $block = trim($temp[1],'"');
                                        }
                                    }
                                }
                            }
                            $line = fgets($in);
                        }
                        if($content_type=='' && $block == 'name' && !feof($in)){
                            $fileName = trim(fgets($in));
                        }
                        continue;
                    }

                    if($content_type != '' && $block == 'file'){
                        fwrite($out, $line);
                    }
                }
            }else{
                while ($buff = fread($in, 4096)) {
                    fwrite($out, $buff);
                }
            }
        }

        @fclose($out);
        @fclose($in);

        $extension = strrchr($fileName, ".");
        $return_filename = $fileName;

        // Check if file has been uploaded
        if (!$chunks || $chunk == $chunks - 1) {
            if($fileType == "excel")
                $return_filename = uniqid("Xls_") . $extension;
            else
                $return_filename = uniqid("Img_") . $extension;

            // Strip the temp .part suffix off
            rename("{$filePath}.part", $targetDir . "/" . $return_filename );
        }


        // Return JSON-RPC response
        die($return_filename);
    }

    function do_upload()
    {
        $config['upload_path'] = 'http://www.landtechnology.com.hk/projects/codeigniter/images/111/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '1000';
        $config['max_width']  = '1024';
        $config['max_height']  = '768';

        $this->load->library('upload',$config);

        $this->upload->do_upload('picture');
        
        /*
        if ( ! $this->upload->do_upload('picture'))
        {
            $error = array('error' => $this->upload->display_errors());

            $this->load->view('upload_form'，$error);
            
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());

            $this->load->view('upload_success'，$data);*/

    }
}
?>