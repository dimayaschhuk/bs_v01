<?php

namespace App\Http\Controllers\Pages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Faq;

class FAQController extends Controller {

    public function data() {
        $faqList = Faq::all();

        return view('cabinet/faq', ['faqList' => $faqList]);
    }
}
