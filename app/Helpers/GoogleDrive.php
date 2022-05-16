<?php

if ( ! function_exists('create_drive_url'))
{
    /**
     * Membuat link share file Google Drive berdasarkan ID
     * 
     * @param  string $fileId
     * @return string
     */
    function create_drive_url($fileId) {
        return 'https://drive.google.com/file/d/'. $fileId .'/view?usp=sharing';
    }
}