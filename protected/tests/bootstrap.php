<?php

function getDirectory( $path = '.', $level = 0 ){

    $ignore = array( 'cgi-bin', '.', '..' );
    // Directories to ignore when listing output. Many hosts
    // will deny PHP access to the cgi-bin.

    $dh = @opendir( $path );
    // Open the directory to the handle $dh

    while( false !== ( $file = readdir( $dh ) ) ){
    // Loop through the directory

        if( !in_array( $file, $ignore ) ){
        // Check that this file is not to be ignored

            $spaces = str_repeat( '&nbsp;', ( $level * 4 ) );
            // Just to add spacing to the list, to better
            // show the directory tree.

            if( is_dir( "$path/$file" ) ){
            // Its a directory, so we need to keep reading down...

                echo "$spaces $file\n";
                getDirectory( "$path/$file", ($level+1) );
                // Re-call this same function but on a new directory.
                // this is what makes function recursive.

            } else {

                echo "$spaces $file\n";
                // Just print out the filename

            }

        }

    }

    closedir( $dh );
    // Close the directory handle

}

// getDirectory( "." );

// change the following paths if necessary
$vendorDir = dirname(__FILE__) . '/../vendor';
$yiit = $vendorDir . '/yii/framework/yiit.php';

echo file_exists($yiit) ? "found yiit.php\n" : "yiit.php missing";

//if (!file_exists($yiit))
//{
//  echo "failed to find '$yiit', falling back to local dev environment...";
//  $yiit = 'yii/tags/1.1.10/framework/yiit.php';
//}

$config=dirname(__FILE__).'/../config/test.php';

require_once($yiit);
// require_once(dirname(__FILE__).'/WebTestCase.php');

Yii::createWebApplication($config);
