<?php
    session_start();
    if($_SESSION['user']==''){
        echo "<script>window.location.href='../index.php';</script>";
    }
    
	require_once 'PHPExcel/Classes/PHPExcel.php';
	require_once 'PHPExcel/Classes/PHPExcel/IOFactory.php';
	require_once 'PHPExcel/Classes/PHPExcel/Reader/Excel5.php';
	//以上三步加载phpExcel的类
    $objReader = PHPExcel_IOFactory::createReader('excel2007'); // use Excel5 for 2003 format
     
    if(isset($_POST['sub'])){
        if(!is_dir('../upload')){   //没有目录创建目录
            mkdir('../upload');
        }
        $file=$_FILES['test'];   //获取文件域数据
        //print_r($file);
        //echo $file['type'];
        if(is_uploaded_file($file['tmp_name'])){
            $rand=rand(1,9999999);   //随机
            $floatTime=microtime();  //毫秒
            $extends=substr($file['name'],-5,5);
            $path='../upload/'.$rand.$floatTime.$extends;  //路径
            if($extends==".xlsx"){  // 控制了扩展名
                if(move_uploaded_file($file['tmp_name'],$path)){
                    //echo "上传成功，文件名为：".$path;

                    $excelpath=$path;
                    $objPHPExcel = PHPExcel_IOFactory::load($excelpath);
                    $sheet = $objPHPExcel->getSheet(0);   //第一个标签
                    $highestRow = $sheet->getHighestRow();       //取得总行数 
                    $highestColumn = $sheet->getHighestColumn(); //取得总列数
                    error_reporting( E_ALL&~E_NOTICE );
                    include('../php/public.php');
                    $str = "";
                    for($j=2;$j<=$highestRow;$j++){ 
                        $titles='';
                        $types='';
                        $A='';
                        $B='';
                        $C='';
                        $D='';
                        $rights='';
                        for($k='A';$k<=$highestColumn;$k++){ 
                            $str = $sheet->getCell($k.$j)->getValue();
                            if ($k=='A') $titles = $str;
                            if ($k=='B') $types = $str;
                            if ($k=='C') $A = $str;
                            if ($k=='D') $B = $str;
                            if ($k=='E') $C = $str;
                            if ($k=='F') $D = $str;
                            if ($k=='G') $rights = $str;
                        } 
                        $sql="insert into item_pool(titles,types,A,B,C,D,rights) values('$titles','$types','$A','$B','$C','$D','$rights')";
                        $res=$conn->query($sql);
                        
                    }
                    if($res){
                        echo "<script>alert('数据导入成功！')</script>";
                    }

                }
            }else{
                echo "<script>alert('文件类型不对！文件类型为.xlsx')</script>";
            }
            
        }
    }


	
?>
<form action="#" method="post" enctype="multipart/form-data">
    <div class="box" style="width:300px; height:120px; margin:auto; margin-top:200px;"> 
        <input type="file" name="test" />
        <br />
        <br />
        <input type="submit" name="sub" value="导入excel考试题" />
    </div>  
</form>
