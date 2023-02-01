<div class="top-menu">
    <div class="container">
        <div class="row">
            <div class="col-sm-7 col-md-9">
                <div id="colorlib-logo"><a href="{{route('index')}}">Footwear</a></div>
            </div>
            <div class="col-sm-5 col-md-3">
            <form action="#" class="search-wrap">
               <div class="form-group">
                  <input type="search" class="form-control search" placeholder="Search">
                  <button class="btn btn-primary submit-search text-center" type="submit"><i class="icon-search"></i></button>
               </div>
            </form>
         </div>
     </div>
        <div class="row">
            <div class="col-sm-12 text-left menu-1">
                <ul>
                    <li class="active"><a href="{{route('index')}}">Home</a></li>
                    <li class="has-dropdown">
                        <a href="{{route('men')}}">Men</a>
                        <ul class="dropdown">
                            @foreach (submenus('men') as $item)
                                <li><a href="{{route('defult',$item->name)}}">{{$item->name}}</a></li> 
                            @endforeach
                        </ul>
                    </li>
                    <li class="has-dropdown">
                        <a href="{{route('women')}}">Women</a>
                        <ul class="dropdown">
                            @foreach (submenus('women') as $item)
                                <li><a href="{{route('defult',$item->name)}}">{{$item->name}}</a></li> 
                            @endforeach
                        </ul>
                    </li>
                    <li><a href="{{route('about')}}">About</a></li>
                    <li><a href="{{route('contact')}}">Contact</a></li>
                    <li class="cart"><a href="{{route('cart')}}"><i class="icon-shopping-cart"></i> Cart [0]</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>