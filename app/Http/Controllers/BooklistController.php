<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BooklistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ebooks = [
            ['id' => 1, 'title' => 'Ebook 1', 'description' => 'Sample Description'],
            ['id' => 2, 'title' => 'Ebook 2', 'description' => 'Sample Description'],
            ['id' => 3, 'title' => 'Ebook 3', 'description' => 'Sample Description'],
            ['id' => 4, 'title' => 'Ebook 4', 'description' => 'Sample Description'],
            ['id' => 5, 'title' => 'Ebook 5', 'description' => 'Sample Description'],
        ];
    
        $title = 'Senarai ebook';
    
        return view('template_booklist', compact('ebooks', 'title'));
    }
}
