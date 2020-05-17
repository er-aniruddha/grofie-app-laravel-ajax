@extends('apps.layouts.main_layouts')
@section('menuTitle','Products')
@section('apps_main_content')
<!-- Head Start -->
<div class="container-fluid">
  <div class="row header2 cart-header">
    <div class="container">
        <div class="back">
          <a href="{{url()->previous()}}"><svg class="header-icon menu-icon" viewBox="0 0 24 24"><path fill="#3E4152" fillrule="evenodd" d="M20.25 11.25H5.555l6.977-6.976a.748.748 0 000-1.056.749.749 0 00-1.056 0L3.262 11.43A.745.745 0 003 12a.745.745 0 00.262.57l8.214 8.212a.75.75 0 001.056 0 .748.748 0 000-1.056L5.555 12.75H20.25a.75.75 0 000-1.5"></path></svg></a>
        </div>
        <h3 id="title"></h3>
        <div class="cart-item lara-shown">
          <div class="cart-btn">
          @if($i>0)
            <a href="{{ url('/apps/show-cart')}}" class="btn btn-link border-none"><i class="mdi mdi-cart"></i> <small class="cart-value">{{$i}}</small></a>
          @else 
            <a href="{{ url('/apps/show-cart')}}" class="btn btn-link border-none"><i class="mdi mdi-cart"></i></a>
          @endif
          </div>
        </div>
        <div class="cart-item ajax_shown" style="display: none;">
          <div class="cart-btn">         
            <a href="{{ url('/apps/show-cart')}}" class="btn btn-link border-none"><i class="mdi mdi-cart"></i> <small class="cart-value" id="_cart_item" value=""></small></a>         
          </div>
        </div>
    </div>
  </div>
</div>
<!-- Header2 End -->
<!-- Sub-Category Start --> 
<!-- <section class="top-category">  
  <div class="container">
    <div id="_sub_cat">
      <div class="text-center">
      <div class="spinner-border text-success load-spin" role="status">
      </div>
    </div>
      
    </div>
    <div class="clearfix"></div>
  </div> 
</section> -->
<!-- Sub-Category End --> 
<!-- All Product Show Start -->
<section class="shop-list">
  <div class="container">
    <div class="row" id="product-list"> 
    
    </div>  
    <div class="load-more"></div>
    <div class="text-center" >
      <div class="spinner-border text-success load-spin" role="status" style="display: none;">
      </div>
    </div>
    <p style="display: none; text-align: center;" id="_enpx">That's all</p>
  </div>
</section>
<!-- All Product Show End --> 
@include('apps.category.product_list_script')
@endsection
