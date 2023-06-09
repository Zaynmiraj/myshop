<div class="review-form-wrapper">
    <style>
        .star{
  border:none;
  background-color: unset;
  color:goldenrod;
  font-size: 2rem;
  position: relative;
}
input[type="radio"]{
    opacity: 1;
    position: absolute;
    top: 0px;
    bottom: 0px;
    width:40px;
    left: 0px;
    z-index:;
}

p{
  text-align: left;
}
</style>
    <div id="review-form">
        <div class="comment-respond" id="respond">
            <div class="comment-form ">
                @if(session()->has('success'))
                <span class="alert alert-success"> {{session()->get('success')}}</span>
                @endif
                <h4 class="mb-15">Add a review</h4>
                 <img src="{{asset('assets/imgs/shop/product-')}}{{$orderItems->product->id}}-2.jpg" width="200px" height="200px" alt=""/>
                <p class="">{{$orderItems->product->name}}</p>
                <div class="row">
                    <div class="col-lg-8 col-md-12">
                        <form class="form-contact comment_form" wire:submit.prevent="Rating" action="#" id="commentForm">
                            <div class="row">
                                <div class="col-12">
                                    <span> Leave your rating </span>
                                    <div class="comment-form-rating">
                                        <div class="rate">
                                            
                                                <input type="radio" class="star" name="rate" wire:model="rating" value="1" />
                                        
                                            <label class="star"> &#9734;
                                                <input type="radio" name="rate" wire:model="rating" value="2" />
                                            </label>
                                            <label class="star"> &#9734;
                                                <input type="radio" name="rate" wire:model="rating" value="3" />
                                            </label>
                                            <label class="star"> &#9734;
                                                <input type="radio" name="rate" wire:model="rating" value="4" />
                                            </label>
                                            <label class="star"> &#9734;
                                                <input type="radio" name="rate" wire:model="rating" value="5" chacked="chacked" />
                                            </label>
                                            <p> {{$rating}}</p>
                                            <p class="current-rating">0 of 5</p>
                                            @error('rating')
                                            <span class="waring-error"> {{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control w-100" wire:model="comment" name="comment" id="comment" cols="30" rows="9" placeholder="Write Comment"></textarea>
                                        @error('comment')
                                            <span class="waring-error"> {{ $message }}</span>
                                            @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="button button-contactForm">Submit
                                    Review</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    const stars=document.querySelectorAll('.star');
const current_rating=document.querySelector('.current-rating');

stars.forEach((star,index)=>{
  star.addEventListener('click',()=>{

    let current_star=index+1;
    current_rating.innerText=`${current_star} of 5`;

    stars.forEach((star,i)=>{
        if(current_star>=i+1){
          star.innerHTML='&#9733;';
        }else{
          star.innerHTML='&#9734;';
        }
    });

  });
});

 </script>
 @endpush
