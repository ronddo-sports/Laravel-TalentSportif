<?php

/**
 * Global helpers file with misc functions.
 */
use App\Model\Medium;

if (! function_exists('app_name')) {
    /**
     * Helper to grab the application name.
     *
     * @return mixed
     */
    function app_name()
    {
        return config('app.name');
    }
}

if (! function_exists('transUpl')) {
    /**
     * Access (lol) the Access:: facade as a simple function.
     */
    function transUpl($text)
    {
        if ($text == 'uploads')
            return 'Telechargements';
        return $text;
    }
}

if (! function_exists('formatDate')) {
    /**
     * Access (lol) the Access:: facade as a simple function.
     */
    function formatDate($date)
    {
        //return ($date)->format('d M Y H:i');
    }
}
if (! function_exists('getAlbums')) {
    /**
     * Access (lol) the Access:: facade as a simple function.
     */
    function getAlbums(){
        if (Auth::check()){
            return \App\Model\Album::where('owner_id',Auth::id())
                ->where('owner_table','users')
                ->where('name_canonical','<>','profile')->get();
        }
        return null;
    }
}
if (! function_exists('getAlbumFromId')) {
    /**
     * Access (lol) the Access:: facade as a simple function.
     */
    function getAlbumFromId($id){
        $qry = \App\Model\Album::where('id',$id)
            ->withTrashed()->where('owner_table','users');
        if ($qry->count() > 0){
            return $qry->first();
        }
        return null;
    }
}

if (! function_exists('getAlbumImagesFromAlbumId')) {
    /**
     * Access (lol) the Access:: facade as a simple function.
     */
    function getAlbumImagesFromAlbumId($id){
        $qry = Medium::where('discr','image')
            ->where('album_id',$id)
            ->join('photos','media.id','=','photos.media_id')
            ->select('photos.url')
            ->limit(4);
        if ($qry->count() > 0){
            return $qry->get();
        }
        return null;
    }
}

if (! function_exists('getImageSrcFromMediaId')) {
    /**
     * Access (lol) the Access:: facade as a simple function.
     */
    function getImageSrcFromMediaId($id){
       return \App\Model\Photo::where('media_id',$id)->first();
    }
}

if (! function_exists('profilePicFromUserId')) {
    /**
     * Access (lol) the Access:: facade as a simple function.
     */
    function profilePicFromUserId($id){

       $qry = Medium::where('user_id',$id)
           ->where('discr','profil')
           ->where('actif',true)
           ->join('photos','media.id','=','media_id')
           ->select('photos.url');
       if($qry->count() > 0){
           return $qry->first()['url'];
       }
           return '/img/default_prof.jpg';
    }
}

if (! function_exists('banierePicFromUserId')) {
    /**
     * Access (lol) the Access:: facade as a simple function.
     */
    function banierePicFromUserId($id){
       $qry = Medium::where('user_id',$id)
           ->where('discr','baniere')
           ->where('actif',true)
           ->join('photos','media.id','=','media_id')
           ->select('photos.url');
       if($qry->count() > 0){
           return $qry->first()['url'];
       }
           return '/img/default_ban.jpg';
    }
}

if (! function_exists('access')) {
    /**
     * Access (lol) the Access:: facade as a simple function.
     */
    function access()
    {
        return app('access');
    }
}

if (! function_exists('history')) {
    /**
     * Access the history facade anywhere.
     */
    function history()
    {
        return app('history');
    }
}

if (! function_exists('gravatar')) {
    /**
     * Access the gravatar helper.
     */
    function gravatar()
    {
        return app('gravatar');
    }
}

if (! function_exists('includeRouteFiles')) {

    /**
     * Loops through a folder and requires all PHP files
     * Searches sub-directories as well.
     *
     * @param $folder
     */
    function includeRouteFiles($folder)
    {
        $directory = $folder;
        $handle = opendir($directory);
        $directory_list = [$directory];

        while (false !== ($filename = readdir($handle))) {
            if ($filename != '.' && $filename != '..' && is_dir($directory.$filename)) {
                array_push($directory_list, $directory.$filename.'/');
            }
        }

        foreach ($directory_list as $directory) {
            foreach (glob($directory.'*.php') as $filename) {
                require $filename;
            }
        }
    }
}

if (! function_exists('getRtlCss')) {

    /**
     * The path being passed is generated by Laravel Mix manifest file
     * The webpack plugin takes the css filenames and appends rtl before the .css extension
     * So we take the original and place that in and send back the path.
     *
     * @param $path
     *
     * @return string
     */
    function getRtlCss($path)
    {
        $path = explode('/', $path);
        $filename = end($path);
        array_pop($path);
        $filename = rtrim($filename, '.css');

        return implode('/', $path).'/'.$filename.'.rtl.css';
    }
}