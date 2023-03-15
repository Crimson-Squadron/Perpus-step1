<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Book;

class PDFController extends Controller
{
    public function generatePDF()
    {
      $books = Book::all();

      $pdf = \PDF::loadView('pdf', compact('books'));

      return $pdf->download('Book Report.pdf');
    }
}
