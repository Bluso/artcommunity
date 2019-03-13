<div class="container block-contact">
    <div class="row">
       <div class="col-8 offset-2">
           <h2 class="text-center">{{ $contact->name_th }}</h2>
           <h3 class="text-center">{{ $contact->name_en }}</h3>
           <p class="address text-center p-4 bg-light">
           {{ $contact->address }}
           </p>
           <div class="row contact-data">
                @if(count($contact->telephone) != 0)
               <div class="col text-center">
                    <a href="">
                        <img class="mx-auto img-fluid" src="{{ asset('images/contact/icon-tel.png') }}" />
                        <p class="mt-4 text-center">{{$contact->telephone}}</p>
                    </a>
               </div>
               @endif
               @if(count($contact->fax) != 0)
               <div class="col text-center">
                    <a href="">
                        <img class="mx-auto img-fluid" src="{{ asset('images/contact/icon-fax.png') }}" />
                        <p class="mt-4 text-center">{{$contact->fax}}</p>
                    </a>
               </div>
               @endif
               @if(count($contact->email) != 0)
               <div class="col text-center">
                    <a href="">
                        <img class="mx-auto img-fluid" src="{{ asset('images/contact/icon-letter.png') }}" />
                        <p class="mt-4 text-center">{{$contact->email}}</p>
                    </a>
               </div>
               @endif
           </div>
       </div>
    </div>
</div>