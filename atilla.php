<?php
?>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<?php
/*
Plugin Name: Mon plugin
Description: A test plugin to demonstrate wordpress functionality
Author: Atilla Kahraman
Version: 0.1
*/
add_action('admin_menu', 'test_plugin_setup_menu');
 
function test_plugin_setup_menu(){
    add_menu_page( 'Test Plugin Page', 'Mon plugin', 'manage_options', 'test-plugin', 'test_init' );
}
 
function test_init(){
    test_handle_post();
?>












<div class="flex">
  <div class="flex-none w-48 relative">
    <img src="/classic-utility-jacket.jpg" alt="" class="absolute inset-0 w-full h-full object-cover" />
  </div>
  <form class="flex-auto p-6">
    <div class="flex flex-wrap">
      <h1 class="flex-auto text-xl font-semibold">
        Mon plugin permet de telecharger des images
      </h1>
      </div>
      <div class="w-full flex-none text-sm font-medium text-gray-500 mt-2">
        Upload ton fichier mon reuf
      </div>
    </div>
    <div class="flex items-baseline mt-4 mb-6">
      <div class="space-x-2 flex">
      </div>
    <div class="flex space-x-3 mb-4 text-sm font-medium">
      <div class="flex-auto flex space-x-3">

<form  method="post" enctype="multipart/form-data">
	<input type='file' id='test_upload_pdf' name='test_upload_pdf'></input>
	<?php submit_button('Televerser') ?>
    </form>






      </div>
    </div>
    <p class="text-sm text-gray-500">
      Plugin cree par Atilla Kahraman
    </p>
  </form>
</div>


<?php
}
 
function test_handle_post(){
    // First check if the file appears on the _FILES array
    if(isset($_FILES['test_upload_pdf'])){
        $pdf = $_FILES['test_upload_pdf'];
 
        // Use the wordpress function to upload
        // test_upload_pdf corresponds to the position in the $_FILES array
        // 0 means the content is not associated with any other posts
        $uploaded=media_handle_upload('test_upload_pdf', 0);
        // Error checking using WP functions
        if(is_wp_error($uploaded)){
            echo "Erreur dans l upload du fichier: " . $uploaded->get_error_message();
        }else{
            echo "fichier upload avec succes!";
        }
    }
}
 
?>
