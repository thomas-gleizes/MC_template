<?php
class File {

    public static function build_path($path_array){
        $DS = DIRECTORY_SEPARATOR;
        $ROOT_FOLDER = __DIR__.$DS.'..';
        $r = implode("/",$path_array);
        $path = $ROOT_FOLDER . "/" .$r."";

        return $path;
    }

    public static function requireOnce($directory, $file){
        require(File::build_path(array($directory, $file)));
    }


}