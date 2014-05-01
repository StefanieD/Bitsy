<?php
error_reporting(E_ALL);

$bitsyPath = dirname(dirname(__FILE__));

//read plugins from XML file 
$xmlFile = '../plugins/Plugin_List.xml';
$plugins = readPlugins($xmlFile);

function readPlugins($xmlFile)
{
    if (file_exists($xmlFile) != false) {
        $xmlObject = simplexml_load_file($xmlFile);
        if (is_object($xmlObject->plugin) == true) {
            foreach ($xmlObject->plugin as $plugin) {
                $tmpPlugins[] = $plugin;
            }
        }
        return $tmpPlugins;
    } else {
        exit('Konnte ' . $xmlFile . ' nicht öffnen.');
    }
}

//create project folder
if (isset($_REQUEST['createProject']) && !empty($_REQUEST['name'])) {
    if (!file_exists(dirname(dirname(dirname(__FILE__))) . "/" . $_REQUEST['name'])) {
        $zip = new ZipArchive;
        $projectPath = dirname(dirname(dirname(__FILE__))) . "/" . $_REQUEST['name'];
        
        //unzip structure
        if ($zip->open('structure.zip') === TRUE) {
            $zip->extractTo($projectPath);
            recursive_chmod($projectPath, 0777, 0777);
            $zip->close();
            if(isset($_REQUEST['plugin_list'])) {
                includeLibIntoProject($bitsyPath, $projectPath, $_REQUEST['plugin_list']);
            }
            else {
                includeLibIntoProject($bitsyPath, $projectPath, null);
            }
        } else {
            echo 'Fehler';
        }
    } else {
        echo "Eine Datei mit diesen Namen existiert bereits";
    }
}
else if (isset($_REQUEST['createProject']) && empty($_REQUEST['name'])){
    echo ">>>>>>>>>>>>>>>>> Kein Projekt-Name angegeben!";
}

function includeLibIntoProject($bitsyPath, $projectPath, $selectedPlugins) 
{
    $directories = array("base", "supplies");
    $files = array("base_config.php");
    $bitsyLibraryPath = $projectPath . "/lib/Bitsy";
    
    if (mkdir($bitsyLibraryPath, 0777) && chmod($bitsyLibraryPath, 0777)) {
        //copy bitsy folders
        foreach($directories as $directory) {
            recurse_copy($bitsyPath . "/" . $directory, $bitsyLibraryPath . "/" . $directory);
        }
        //copy bitsy files
        foreach($files as $file) {
            copy($bitsyPath . "/" . $file, $bitsyLibraryPath . "/" . $file);
        }
        //copy plugins
        if (!is_null($selectedPlugins)) {
            if (mkdir($bitsyLibraryPath . "/plugins", 0777) && 
                    chmod($bitsyLibraryPath . "/plugins", 0777)) {
                foreach($selectedPlugins as $plugin) {
                    includePlugin($bitsyPath, $bitsyLibraryPath, $plugin);
                }
            }
        }
        //change rights for lib
        recursive_chmod($bitsyLibraryPath, 0777, 0777);
    }
}

function includePlugin($bitsyPath, $bitsyLibraryPath, $plugin) 
{
    recurse_copy($bitsyPath . "/plugins/" . $plugin, $bitsyLibraryPath . "/plugins/" . $plugin);
}

function recurse_copy($src,$dst) { 
    $dir = opendir($src); 
    mkdir($dst); 
    while(false !== ( $file = readdir($dir)) ) { 
        if (( $file != '.' ) && ( $file != '..' )) { 
            if ( is_dir($src . '/' . $file) ) { 
                recurse_copy($src . '/' . $file,$dst . '/' . $file); 
            } 
            else { 
                copy($src . '/' . $file,$dst . '/' . $file); 
            } 
        } 
    } 
    closedir($dir); 
}

function recursive_chmod($foldername, $dir_mode, $file_mode)
{
    $dh = opendir($foldername);

    while ($entry = readdir($dh)) {
        if ('' != $entry && '.' != $entry && '..' != $entry) {
            $_entry = $foldername . '/' . $entry;

            if (!is_dir($_entry)) {
                chmod($_entry, $file_mode);
            }

            if (is_dir($_entry)) {
                recursive_chmod($_entry, $dir_mode, $file_mode);
            }
        }
    }
    closedir($dh);
    chmod($foldername, $dir_mode);
}
?>
<!-- Darstellung -->
<a href="../api/index.html">Hier gehts zur API !</a>
<form >
    
    <h3>folgende Plugins integrieren:</h3>
    
    <table border="0">
        <tr>
        <?php foreach ($plugins as $plugin): ?>
            <td><input type="checkbox" 
                   name="plugin_list[]" 
                   value="<?php echo $plugin->path ?>"> <?php echo $plugin->name ?><br></td>
        
            <td style="padding-left: 20px; font-size: 11px;"><?php echo $plugin->description ?></td>
        </tr>
    
        <?php endforeach; ?>
    </table>
    

    <p>Projektname: <input type="text" name="name" /></p>
    <p><input type="submit" name="createProject" value="Projekt anlegen"/></p>
</form>
