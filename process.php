 <?php
    
    function get_size($size){
        $kb_size = $size / 1024;
        $format_size = number_format($kb_size, 2);
        return $format_size;
    }
    $path = 'upload/'. $_POST['foldername'];

    $size = get_size($_FILES['upload']['size']);

    if($size < 4.0){
        
        
        if(!file_exists($path)){
            mkdir($path, 0777, true);
        }

        $temp_file = $_FILES['upload']['tmp_name'];

        if($temp_file != ""){

            $newfilepath = $path."/".$_FILES['upload']['name'];

            if(move_uploaded_file($temp_file, $newfilepath)){

                echo "Success!";

            }else{

                echo  "Upload error encountered : ". $_FILES['upload']['error'];
            }


        }

    }else{
        echo "File To Large";
    }
 
