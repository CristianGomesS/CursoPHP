<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TesteController extends Controller{
    public function Teste(
    int $p1,
    int $p2
    ){
       // echo "A Soma de $p1 +$p2 é:".($p1+$p2);
       // return view('site.teste',['x'=>$p1,'y'=>$p2,'c'=>$p1+$p2]); - array associativa com parametro da view
       //return view('site.teste',compact('p1','p2')); // compact
       return view('site.teste')->with('p1',$p1)->with('p2',$p2);
    }
}


