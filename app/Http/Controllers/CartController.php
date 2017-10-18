<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use Illuminate\Support\Facades\Auth;
use Session;
use File;
use Illuminate\Support\Facades\Input;
use Intervention\Image\ImageManagerStatic as Image;
use App\SanPham;
use App\PhieuNhapChiTiet;
use App\TonKho;

class CartController extends Controller
{
    public function cart($id) {
       $product = SanPham::where('id', $id)->first();
        Cart::add(array('id' => $product->id, 'name' => $product->ten_sanpham, 'qty' => 1, 'price' => $product->dongia,'options' => array('img' => $product->image, 'donvitien'=>$product->donvitien, 'donvitinh'=>$product->donvitinh)));
        Session::flash('success','Sản Phẩm Đả Thêm Vào Giỏ Hàng');
        return redirect('/');
    }
    public function updateQtyPlus(Request $request,$id)
    {
        $rowid = $request->rowid;
        $proid = $request->proid;
        $qty = $request->qty;
        $item = Cart::get($rowid);
        $cart = Cart::content();
//        Cart::update($rowid, $qty );
//        $cart = Cart::content();

        if($request->ajax()){
            Cart::update($rowid, $qty );
            return view('layouts.main.Cart.updatecart',compact('cart'));
        }
        // if ($item->qty > 8){
        //     if(Auth::check()){
        //         if ($item->qty > 13){
        //         Session::flash('error','Bạn đang mua số lượng sản phẩm lớn. Vui lòng liên hệ với chúng tôi để được ưu đải!');
        //         return view('layouts.main.Cart.updatecart',compact('cart'));
        //         }
        //         else{
        //             if($request->ajax()){
        //                 Cart::update($rowid, $qty );
        //                 return view('layouts.main.Cart.updatecart',compact('cart'));
        //             }
        //         }
        //     }
        //     Session::flash('error','Xin vui lòng đăng nhập');
        //     return view('layouts.main.Cart.updatecart',compact('cart'));
        // }
        // else{
        //     if($request->ajax()){
        //         Cart::update($rowid, $qty );
        //         return view('layouts.main.Cart.updatecart',compact('cart'));
        //     }
        // }


//        $item = Cart::get($rowid);
//        if ($item->qty > 10){
//            if(Auth::check()){
//                Cart::update($rowid, $item->qty + $request->quantity );
//                if ($item->qty > 100){
//                    Session::flash('error','Bạn đang mua số lượng sản phẩm lớn. Vui lòng liên hệ với chúng tôi để được ưu đải!');
//                }
//            }
//            else{
//                Session::flash('error','Xin vui lòng đăng nhập');
//                return view('auth.login');
//            }
//        }
//        else{
//            Cart::update($rowid, $item->qty + 1);
//        }
//        return redirect()->route('shopping');
    }
    // public function updateQtyMinus($id)
    // {
    //     $rowid = $id;
    //     $item = Cart::get($rowid);
    //     if ($item->qty < 1){
    //         Cart::remove($id);
    //     }
    //     else{
    //         Cart::update($rowid, $item->qty - 1);
    //     }
    //     return redirect()->route('shopping');
    // }
    public function delete_cart($id) {
        Cart::remove($id);
        Session::flash('success','Thành Công');
        return redirect()->back();
    }
    public function shopping() {
        $cart = Cart::content();
        return view('layouts.main.Cart.shoppingcart',compact('cart'));
    }
}