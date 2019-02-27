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
            <ul class="row list-unstyled">
                <li class="col-12"><a href="#">กฏหมายเกี่ยวข้อง</a></li>
            </ul>
        </div>
        @if(!empty($DataContact))
        <div class="col-4 address">
            <h2>Contact us</h2>
            <div class="dash"></div>
            <div class="row">
                <div class="col">
                    <h3>{{ $DataContact->name_th }}</h3>
                    <p>{{ $DataContact->address }}</p>
                    <p class="tel">{{ $DataContact->telephone }}</p>
                    <a class="email">{{ $DataContact->email }}</a>
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
