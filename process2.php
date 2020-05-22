 <?php
    
    function get_size($size){
        $kb_size = $size / 1024;
        $format_size = number_format($kb_size, 2);
        return $format_size;
    }


    $total = count($_FILES['upload']['name']);

    for($i = 0; $i < $total; $i++){

    

    $path = 'upload/'. $_POST['foldername'];

    $size = get_size($_FILES['upload']['size'][$i]);

    if($size < 10){
        
        
        if(!file_exists($path)){
            mkdir($path, 0777, true);
        }

        $temp_file = $_FILES['upload']['tmp_name'][$i];

        if($temp_file != ""){

            $newfilepath = $path."/".$_FILES['upload']['name'][$i];

            if(move_uploaded_file($temp_file, $newfilepath)){

                echo "Success!";

            }else{

                echo  "Upload error encountered : ". $_FILES['upload']['error'][$i];
            }


        }

    }else{
        echo "File To Large";
    }
 

    }
