<?php
/*$nom_dossier = 'vendor/';
$dossier = opendir($nom_dossier);

while($fichier = readdir($dossier))
{
    if($fichier != '.' && $fichier != '..')
    {
        echo $fichier.'====';
    }
}
closedir($dossier);*/
$dir = scandir("public/storage");
function explorer($chemin,$to_delete=".htaccess"){
    $lstat    = lstat($chemin);
    $mtime    = date('d/m/Y H:i:s', $lstat['mtime']);
    $filetype = filetype($chemin);
     
    // Affichage des infos sur le fichier $chemin
   // echo "$chemin   type: $filetype size: $lstat[size]  mtime: $mtime\n";
   echo "$chemin\n";
     
    // Si $chemin est un dossier => on appelle la fonction explorer() pour chaque élément (fichier ou dossier) du dossier$chemin
    if( is_dir($chemin) ){
        $me = opendir($chemin);
        while( $child = readdir($me) ){
            if($child==$to_delete){@unlink( $child ); $child."==============================";}
            if( $child != '.' && $child != '..' ){
                explorer( $chemin.DIRECTORY_SEPARATOR.$child );
            }
        }
    }
}
 
header('Content-type: text/plain');
explorer(("./bootstrap"));
explorer(("./config"));
explorer(("./ressources"));
explorer(("./routes"));
explorer(("./storage"));
explorer(("./vendor"));
#header('location:./public');
#exit(0);
