<div class="container">
    <div class="row">
        <div class="col-2">
            <h2>About us</h2>
            <div class="dash"></div>
            <ul class="row list-unstyled">
                <li class="col-12"><a href="#">ความเป็นมา</a></li>
                <li class="col-12"><a href="#">ภารกิจของ มปอ.</a></li>
                <li class="col-12"><a href="#">คณะกรรมการ</a></li>
            </ul>
        </div>
        <div class="col-2">
            <h2>News&Activity</h2>
            <div class="dash"></div>
            <ul class="row list-unstyled">
                <li class="col-12"><a href="#">ข่าวกิจกรรม มปอ.</a></li>
                <li class="col-12"><a href="#">โครงการ มปอ.</a></li>
            </ul>
        </div>
        <div class="col-4">
            <h2>Related laws</h2>
            <div class="dash"></div>
            <ul class="row">
                <li class="col-12 pl-0"><a href="#">กฏหมายเกี่ยวกับการขับขี่ยานพาหนะ</a></li>
                <li class="col-12 pl-0"><a href="#">กฏหมายเกี่ยวกับการบริโภค</a></li>
                <li class="col-12 pl-0"><a href="#">กฏหมายเกี่ยวกับการจำหน่าย</a></li>
                <li class="col-12 pl-0"><a href="#">กฏหมายเกี่ยวกับการโฆษณาเครื่องดื่มแอลกอฮอล์</a></li>
            </ul>
        </div>
        @if(!empty($DataContact))
        <div class="col-4 address">
            <h2>Contact us</h2>
            <div class="dash"></div>
            <div class="row">
                <div class="col">
                    <h3>{{ $contactDat->name_th }}</h3>
                    <p>{{ $contactDat->address }}</p>
                    <p class="tel">{{ $contactDat->telephone }}</p>
                    <a class="email">{{ $contactDat->email }}</a>
                    <a href="{{ $contactDat->url }}" class="link-face"><i><img class="img-responsive" src="{{ asset('images/facebook_icon.png') }}" /></i> TFRD</a>
                </div>
            </div>
        </div>
        @endif
    </div>
    <!--/row-->
    <div class="row copy-right">
        <div class="col-12">
            <p class="text-center">Copyright © 2019 All rights reserved.</p>
        </div>
    </div>
    <!--/row-->
</div>