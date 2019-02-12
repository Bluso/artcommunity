@extends('layouts.app')

@section('title', 'Home')

@section('content')
    @include('home.banner')
    <div class="container">
        <div class="row">
            <div class="col-4">
                <a class="row" href="#about">
                    <div class="col-12">
                        <img>
                    </div>
                    <div class="col-12">
                        <h2 class="text-left">เกี่ยวกับเรา</h2>
                        <p class="text-left">มูลนิธิแก้ไขปัญหาการดื่มแอลกอฮอล์ เป็นองค์กรไม่แสวงหากำไรมีเป้าหมายในการส่งเสริมให้ผู้บริโภคมีความรู้ที่ถูกต้องเกี่ยวกับเครื่องดื่มแอลกอฮอล์</p>
                    </div>
                </a>
            </div>
            <div class="col-4">
                <a class="row" href="#mission">
                    <div class="col-12">
                        <img>
                    </div>
                    <div class="col-12">
                        <h2 class="text-left">ภารกิจของ [มปอ]</h2>
                        <p class="text-left">หน้าที่ของเรา คือ การสร้างความร่วมมือกัน ระหว่างหน่วยงานภาครัฐ ภาคเอกชนและภาคประชาสังคมเพื่อสร้างความรู้ ความเข้าใจเกี่ยวกับเครื่องดื่มแอลกอฮอล์</p>
                    </div>
                </a>
            </div>
            <div class="col-4">
                <a class="row" href="#raw">
                    <div class="col-12">
                        <img>
                    </div>
                    <div class="col-12">
                        <h2 class="text-left">กฏหมายที่เกี่ยวข้อง</h2>
                        <p class="text-left">กฏหมายและระเบียบที่เกี่ยวข้องกับการขับขี่พาหนะการบริโภค การจำหน่าย และการโฆษณาเกี่ยวกับเครื่องดื่มแอลกอฮอล์</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
    @include('home.relate_news')
    @include('home.relate_knowledge')
@stop