<div class="container block-contact margin-content mt-md-5">
    <div class="row">
       <div class="col-lg-8 col-12 offset-lg-2 offset-0">
           @if(!empty($contact->name_th))
           <h2 class="text-center">{{ $contact->name_th }}</h2>
           @endif
           @if(!empty($contact->name_en))
           <h3 class="text-center">{{ $contact->name_en }}</h3>
           @endif
           @if(!empty($contact->address))
           <p class="address text-center p-4 bg-light">
           {{ $contact->address }}
           </p>
           @endif
           <div class="row contact-data">
                @if(!empty($contact->telephone))
               <div class="col-lg col-sm-12 text-center">
                    <a href="tel:{{$contact->telephone66}}">
                        <img class="mx-auto img-fluid" src="{{ asset('images/contact/icon-tel.png') }}" />
                        <p class="mt-4 text-center">{{$contact->telephone}}</p>
                    </a>
               </div>
               @endif
               @if(!empty($contact->fax))
               <div class="col-lg col-sm-12 text-center">
                    <a href="tel:{{$contact->fax66}}">
                        <img class="mx-auto img-fluid" src="{{ asset('images/contact/icon-fax.png') }}" />
                        <p class="mt-4 text-center">{{$contact->fax}}</p>
                    </a>
               </div>
               @endif
               @if(!empty($contact->email))
               <div class="col-lg col-sm-12 text-center">
                    <a href="mailto:{{$contact->email}}">
                        <img class="mx-auto img-fluid" src="{{ asset('images/contact/icon-letter.png') }}" />
                        <p class="mt-4 text-center">{{$contact->email}}</p>
                    </a>
               </div>
               @endif
           </div>
       </div>
    </div>
</div>
