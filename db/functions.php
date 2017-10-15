<?php
	
	Class Functions{

		function test_input($data) {
		  $data = trim($data);
		  $data = stripslashes($data);
		  $data = htmlspecialchars($data);
		  return $data;
		}

		function reArrayFiles($file)
		{
		    $file_ary = array();
		    $file_count = count($file['name']);
		    $file_key = array_keys($file);
		    
		    for($i=0;$i<$file_count;$i++)
		    {
		        foreach($file_key as $val)
		        {
		            $file_ary[$i][$val] = $file[$val][$i];
		        }
		    }
		    return $file_ary;
		}
	}
	$func = new Functions();
?>
