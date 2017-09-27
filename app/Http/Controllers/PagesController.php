<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function getIndex()
    {
        return view('pages.index');
    }

    public function get404()
    {
        return view('pages.404');
    }

    public function getBlog()
    {
        return view('pages.blog');
    }

    public function getBlog_Single()
    {
        return view('pages.blog-single');
    }
    public function getCart()
    {
        return view('pages.cart');
    }
    public function getCheckout()
    {
        return view('pages.checkout');
    }
    public function getContact()
    {
        return view('pages.contact-us');
    }
    public function getLogin()
    {
        return view('pages.login');
    }
    public function getProduct_Details()
    {
        return view('pages.product-details');
    }
    public function getSend_Mail()
    {
        return view('pages.sendemail');
    }
    public function getShop()
    {
        return view('pages.shop');
    }

}