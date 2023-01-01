<div class="faq-area-wrapper" data-padding-top="{{$data['padding_top']}}"
     data-padding-bottom="{{$data['padding_bottom']}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-wrapper style-01 v-03">
                    <h1 class="section-title-main">{{$data['title']}}</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <!-- faq accordion start -->
                <div class="faq-accordion">
                    <div class="accordion" id="accordionExample">
                        @foreach($data['faqs'] as $key => $faq)
                            <div class="card">
                                <div class="card-header" id="headingOne_{{$key}}">
                                    <h5 class="mb-0">
                                        <a href="#" class="accordion-btn btn-link collapsed" data-toggle="collapse"
                                           data-target="#collapseOne_{{$key}}" aria-expanded="false"
                                           aria-controls="collapseOne">
                                            {{$faq->title}}
                                            <span class="color-1">
                                                <i class="las la-plus open"></i>
                                                <i class="las la-minus close"></i>
                                            </span>
                                        </a>
                                    </h5>
                                </div>

                                <div id="collapseOne_{{$key}}" class="collapse" aria-labelledby="headingOne_{{$key}}"
                                     data-parent="#accordionExample" style="">
                                    <div class="card-body">
                                        {!! $faq->description !!}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    @if($data['pagination_status'] == 'on')
                        <div class="mt-4">
                            {{$data['faqs']->links()}}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>