<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    function checkLogin()
    {
         if (empty($_SESSION['admin_id'])) 
         {
            redirect(base_url().'ipanel/login');
         } 
        return "";
    } 
   
    function checkLoginUser() {
  
         if (empty($_SESSION['user_id'])) 
         {
            $CI =& get_instance();
           $CI->session->set_flashdata('msg', 'Please Login To Continue');
             redirect(base_url().'welcome/index');
         } 
                return "";
    }
      function checkcart()
    {
      
       if (empty(json_decode($_SESSION['products']))) 
         {
            redirect(base_url().'cart');
         } 


    }
    
   

   

    #uploadImages
    function uplodeImage($gallery_path,$imageName,$pass_data,$image_upload_status = FALSE)
     {      
            $config['upload_path']   = $gallery_path;
            $config['allowed_types'] = 'jpg|png|jpeg|pdf|mp4|3gp|mkv';
            /*$config['max_size']    = '1024';*/    
            //$config['max_width']   = '1024';
            //$config['max_height']  = '768';
            $CI =& get_instance();
            $CI->load->library('upload', $config);
            if(!$CI->upload->do_upload($imageName))
            { 
                $image_upload_status     =FALSE;
                $pass_data['file_error'] = $CI->upload->display_errors();
            }
            else
            { 
                $image_upload_status     =TRUE;
                $image_data = $CI->upload->data(); 
            }
            return ($image_upload_status) ? $image_data['file_name']:FALSE;      
     }

    function uplodevideo($gallery_path,$imageName,$pass_data,$image_upload_status = FALSE)
     {
         
            $config['upload_path']   = $gallery_path;
            $config['allowed_types'] = 'mp4|3gp|mkv';
            /*$config['max_size']    = '1024';*/    
            //$config['max_width']   = '1024';
            //$config['max_height']  = '768';
            $CI =& get_instance();
            $CI->load->library('upload', $config);
            if(!$CI->upload->do_upload($imageName))
            { 
                $image_upload_status     =FALSE;
                $pass_data['file_error'] = $CI->upload->display_errors();
            }
            else
            { 
                $image_upload_status     =TRUE;
                $image_data = $CI->upload->data(); 
            }
            return ($image_upload_status) ? $image_data['file_name']:FALSE;     


     }
     # Resize Image(make thumb)
      function resize_image($file_path,$thumb_path, $width, $height)
     {
        $CI =& get_instance();
        $CI->load->library('image_lib');

        $img_cfg['image_library'] = 'gd2';
        $img_cfg['source_image'] = $file_path;
        $img_cfg['maintain_ratio'] = TRUE;
        $config['create_thumb'] = TRUE;
        $img_cfg['new_image'] = $thumb_path;
        $img_cfg['width'] = $width;
        $img_cfg['quality'] = 100;
        $img_cfg['height'] = $height;
    
        $CI->image_lib->initialize($img_cfg);
        $CI->image_lib->resize();
    }

function clean($string) {
   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
   return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
  }

  
     function strreplace_encode($stirng)
     {

      $result=str_replace(array('+', '/', '='), array('-', '_', '~'), $stirng);
      return $result;
     }
     
     function strreplace_decode($stirng)
     {

       $result=str_replace(array('-', '_', '~'), array('+', '/', '='), $stirng);
     return $result;

     }


     function in_array_field($needle, $needle_field, $haystack, $strict = false) { 
    if ($strict) { 
        foreach ($haystack as $item) 
            if (isset($item->$needle_field) && $item->$needle_field === $needle) 
                return true; 
    } 
    else { 
        foreach ($haystack as $item) 
            if (isset($item->$needle_field) && $item->$needle_field == $needle) 
                return true; 
    } 
    return false; 
} 

function getCurrentURL()
     {
    $currentURL = (@$_SERVER["HTTPS"] == "on") ? "https://" : "http://";
    $currentURL .= $_SERVER["SERVER_NAME"];
 
    if($_SERVER["SERVER_PORT"] != "80" && $_SERVER["SERVER_PORT"] != "443")
    {
        $currentURL .= ":".$_SERVER["SERVER_PORT"];
    } 
 
        $currentURL .= $_SERVER["REQUEST_URI"];

    return $currentURL;
    }

      function substrwords($text, $maxchar, $end='...') {
    if (strlen($text) > $maxchar || $text == '') {
        $words = preg_split('/\s/', $text);      
        $output = '';
        $i      = 0;
        while (1) {
            $length = strlen($output)+strlen($words[$i]);
            if ($length > $maxchar) {
                break;
            } 
            else {
                $output .= " " . $words[$i];
                ++$i;
            }
        }
        $output .= $end;
    } 
    else {
        $output = $text;
    }
    return $output;
}
    