<?php

namespace App\Http\Controllers\Backend\Gallery;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\MOdels\Backend\Gallery\Gallery;

class GalleryPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gallerys = Gallery::orderBy('id', 'desc')->get();
        return view('backend.pages.gallery.manage', compact(
            'gallerys'
        ));
    }


}