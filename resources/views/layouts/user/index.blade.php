@extends('layouts.app')

@section('mainSection')
@include('layouts.banner')
<section class="section pb-0">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 mb-5">
        <h2 class="h5 section-title">Editors Pick</h2>
        <article class="card">
          <div class="post-slider slider-sm">
            <img src="{{asset('user_assets/images/post/post-1.jpg')}}" class="card-img-top" alt="post-thumb">
          </div>

          <div class="card-body">
            <h3 class="h4 mb-3"><a class="post-title" href="post-details.html">Use apples to give your bakes caramel and a moist texture</a></h3>
            <ul class="card-meta list-inline">
              <li class="list-inline-item">
                <a href="author-single.html" class="card-meta-author">
                  <img src="{{asset('user_assets/images/john-doe.jpg')}}">
                  <span>Charls Xaviar</span>
                </a>
              </li>
              <li class="list-inline-item">
                <i class="ti-timer"></i>2 Min To Read
              </li>
              <li class="list-inline-item">
                <i class="ti-calendar"></i>14 jan, 2020
              </li>
              <li class="list-inline-item">
                <ul class="card-meta-tag list-inline">
                  <li class="list-inline-item"><a href="tags.html">Color</a></li>
                  <li class="list-inline-item"><a href="tags.html">Recipe</a></li>
                  <li class="list-inline-item"><a href="tags.html">Fish</a></li>
                </ul>
              </li>
            </ul>
            <p>It’s no secret that the digital industry is booming. From exciting startups to …</p>
            <a href="post-details.html" class="btn btn-outline-primary">Read More</a>
          </div>
        </article>
      </div>
      <div class="col-lg-4 mb-5">
        <h2 class="h5 section-title">Trending Post</h2>

        <article class="card mb-4">
          <div class="card-body d-flex">
            <img class="card-img-sm" src="{{asset('user_assets/images/post/post-3.jpg')}}">
            <div class="ml-3">
              <h4><a href="post-details.html" class="post-title">Advice From a Twenty Something</a></h4>
              <ul class="card-meta list-inline mb-0">
                <li class="list-inline-item mb-0">
                  <i class="ti-calendar"></i>14 jan, 2020
                </li>
                <li class="list-inline-item mb-0">
                  <i class="ti-timer"></i>2 Min To Read
                </li>
              </ul>
            </div>
          </div>
        </article>

        <article class="card mb-4">
          <div class="card-body d-flex">
            <img class="card-img-sm" src="{{asset('user_assets/images/post/post-2.jpg')}}">
            <div class="ml-3">
              <h4><a href="post-details.html" class="post-title">The Design Files - Homes Minimalist</a></h4>
              <ul class="card-meta list-inline mb-0">
                <li class="list-inline-item mb-0">
                  <i class="ti-calendar"></i>14 jan, 2020
                </li>
                <li class="list-inline-item mb-0">
                  <i class="ti-timer"></i>2 Min To Read
                </li>
              </ul>
            </div>
          </div>
        </article>

        <article class="card mb-4">
          <div class="card-body d-flex">
            <img class="card-img-sm" src="{{asset('user_assets/images/post/post-4.jpg')}}">
            <div class="ml-3">
              <h4><a href="post-details.html" class="post-title">The Skinny Confidential</a></h4>
              <ul class="card-meta list-inline mb-0">
                <li class="list-inline-item mb-0">
                  <i class="ti-calendar"></i>14 jan, 2020
                </li>
                <li class="list-inline-item mb-0">
                  <i class="ti-timer"></i>2 Min To Read
                </li>
              </ul>
            </div>
          </div>
        </article>
      </div>

      <div class="col-lg-4 mb-5">
        <h2 class="h5 section-title">Popular Post</h2>

        <article class="card">
          <div class="post-slider slider-sm">
            <img src="{{asset('user_assets/images/post/post-5.jpg')}}" class="card-img-top" alt="post-thumb">
          </div>
          <div class="card-body">
            <h3 class="h4 mb-3"><a class="post-title" href="post-details.html">How To Make Cupcakes and Cashmere Recipe At Home</a></h3>
            <ul class="card-meta list-inline">
              <li class="list-inline-item">
                <a href="author-single.html" class="card-meta-author">
                  <img src="{{asset('user_assets/images/kate-stone.jpg')}}" alt="Kate Stone">
                  <span>Kate Stone</span>
                </a>
              </li>
              <li class="list-inline-item">
                <i class="ti-timer"></i>2 Min To Read
              </li>
              <li class="list-inline-item">
                <i class="ti-calendar"></i>14 jan, 2020
              </li>
              <li class="list-inline-item">
                <ul class="card-meta-tag list-inline">
                  <li class="list-inline-item"><a href="tags.html">City</a></li>
                  <li class="list-inline-item"><a href="tags.html">Food</a></li>
                  <li class="list-inline-item"><a href="tags.html">Taste</a></li>
                </ul>
              </li>
            </ul>
            <p>It’s no secret that the digital industry is booming. From exciting startups to …</p>
            <a href="post-details.html" class="btn btn-outline-primary">Read More</a>
          </div>
        </article>
      </div>
      <div class="col-12">
        <div class="border-bottom border-default"></div>
      </div>
    </div>
  </div>
</section>

<section class="section-sm">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8  mb-5 mb-lg-0">
                <h2 class="h5 section-title">Recent Post</h2>
                <article class="card mb-4">
                    <div class="post-slider">
                        <img src="{{ asset('user_assets/images/post/post-10.jpg')}}" class="card-img-top" alt="post-thumb">
                        <img src="{{ asset('user_assets/images/post/post-1.jpg')}}" class="card-img-top" alt="post-thumb">
                    </div>
                    <div class="card-body">
                        <h3 class="mb-3"><a class="post-title" href="post-elements.html">Elements That You Can Use In This Template.</a></h3>
                        <ul class="card-meta list-inline">
                            <li class="list-inline-item">
                                <a href="author-single.html" class="card-meta-author">
                                    <img src="{{ asset('user_assets/images/john-doe.jpg')}}" alt="John Doe">
                                    <span>John Doe</span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <i class="ti-timer"></i>3 Min To Read
                            </li>
                            <li class="list-inline-item">
                                <i class="ti-calendar"></i>15 jan, 2020
                            </li>
                            <li class="list-inline-item">
                                <ul class="card-meta-tag list-inline">
                                    <li class="list-inline-item"><a href="tags.html">Demo</a></li>
                                    <li class="list-inline-item"><a href="tags.html">Elements</a></li>
                                </ul>
                            </li>
                        </ul>
                        <p>Heading example Here is example of hedings. You can use this heading by following markdownify rules. For example: use # for heading 1 and use ###### for heading 6.</p>
                        <a href="post-elements.html" class="btn btn-outline-primary">Read More</a>
                    </div>
                </article>

                <article class="card mb-4">
                    <div class="post-slider">
                        <img src="{{ asset('user_assets/images/post/post-3.jpg')}}" class="card-img-top" alt="post-thumb">
                    </div>
                    <div class="card-body">
                        <h3 class="mb-3"><a class="post-title" href="post-details.html">Advice From a Twenty Something</a></h3>
                        <ul class="card-meta list-inline">
                            <li class="list-inline-item">
                                <a href="author-single.html" class="card-meta-author">
                                    <img src="{{ asset('user_assets/images/john-doe.jpg')}}">
                                    <span>Mark Dinn</span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <i class="ti-timer"></i>2 Min To Read
                            </li>
                            <li class="list-inline-item">
                                <i class="ti-calendar"></i>14 jan, 2020
                            </li>
                            <li class="list-inline-item">
                                <ul class="card-meta-tag list-inline">
                                    <li class="list-inline-item"><a href="tags.html">Decorate</a></li>
                                    <li class="list-inline-item"><a href="tags.html">Creative</a></li>
                                </ul>
                            </li>
                        </ul>
                        <p>It’s no secret that the digital industry is booming. From exciting startups to global brands, companies are reaching out to digital agencies, responding to the new possibilities available.</p>
                        <a href="post-details.html" class="btn btn-outline-primary">Read More</a>
                    </div>
                </article>

                <article class="card mb-4">
                    <div class="post-slider">
                        <img src="{{ asset('user_assets/images/post/post-7.jpg')}}" class="card-img-top" alt="post-thumb">
                    </div>

                    <div class="card-body">
                        <h3 class="mb-3"><a class="post-title" href="post-details.html">Advice From a Twenty Something</a></h3>
                        <ul class="card-meta list-inline">
                            <li class="list-inline-item">
                                <a href="author-single.html" class="card-meta-author">
                                    <img src="{{ asset('user_assets/images/john-doe.jpg')}}">
                                    <span>Charls Xaviar</span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <i class="ti-timer"></i>2 Min To Read
                            </li>
                            <li class="list-inline-item">
                                <i class="ti-calendar"></i>14 jan, 2020
                            </li>
                            <li class="list-inline-item">
                                <ul class="card-meta-tag list-inline">
                                    <li class="list-inline-item"><a href="tags.html">Color</a></li>
                                    <li class="list-inline-item"><a href="tags.html">Recipe</a></li>
                                    <li class="list-inline-item"><a href="tags.html">Fish</a></li>
                                </ul>
                            </li>
                        </ul>
                        <p>It’s no secret that the digital industry is booming. From exciting startups to global brands, companies are reaching out to digital agencies, responding to the new possibilities available.</p>
                        <a href="post-details.html" class="btn btn-outline-primary">Read More</a>
                    </div>
                </article>

                <article class="card mb-4">
                    <div class="card-body">
                        <h3 class="mb-3"><a class="post-title" href="post-details.html">Cheerful Loving Couple Bakers Drinking Coffee</a></h3>
                        <ul class="card-meta list-inline">
                            <li class="list-inline-item">
                                <a href="author-single.html" class="card-meta-author">
                                    <img src="{{ asset('user_assets/images/kate-stone.jpg')}}" alt="Kate Stone">
                                    <span>Kate Stone</span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <i class="ti-timer"></i>2 Min To Read
                            </li>
                            <li class="list-inline-item">
                                <i class="ti-calendar"></i>14 jan, 2020
                            </li>
                            <li class="list-inline-item">
                                <ul class="card-meta-tag list-inline">
                                    <li class="list-inline-item"><a href="tags.html">Wow</a></li>
                                    <li class="list-inline-item"><a href="tags.html">Tasty</a></li>
                                </ul>
                            </li>
                        </ul>
                        <p>It’s no secret that the digital industry is booming. From exciting startups to global brands, companies are reaching out to digital agencies, responding to the new possibilities available.</p>
                        <a href="post-details.html" class="btn btn-outline-primary">Read More</a>
                    </div>
                </article>

                <article class="card mb-4">
                    <div class="post-slider">
                        <img src="images/post/post-5.jpg" class="card-img-top" alt="post-thumb">
                    </div>
                    <div class="card-body">
                        <h3 class="mb-3"><a class="post-title" href="post-details.html">How To Make Cupcakes and Cashmere Recipe At Home</a></h3>
                        <ul class="card-meta list-inline">
                            <li class="list-inline-item">
                                <a href="author-single.html" class="card-meta-author">
                                    <img src="{{ asset('user_assets/images/kate-stone.jpg')}}" alt="Kate Stone">
                                    <span>Kate Stone</span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <i class="ti-timer"></i>2 Min To Read
                            </li>
                            <li class="list-inline-item">
                                <i class="ti-calendar"></i>14 jan, 2020
                            </li>
                            <li class="list-inline-item">
                                <ul class="card-meta-tag list-inline">
                                    <li class="list-inline-item"><a href="tags.html">City</a></li>
                                    <li class="list-inline-item"><a href="tags.html">Food</a></li>
                                    <li class="list-inline-item"><a href="tags.html">Taste</a></li>
                                </ul>
                            </li>
                        </ul>
                        <p>It’s no secret that the digital industry is booming. From exciting startups to global brands, companies are reaching out to digital agencies, responding to the new possibilities available.</p>
                        <a href="post-details.html" class="btn btn-outline-primary">Read More</a>
                    </div>
                </article>

                <article class="card mb-4">
                    <div class="post-slider">
                        <img src="images/post/post-8.jpg" class="card-img-top" alt="post-thumb">
                        <img src="images/post/post-9.jpg" class="card-img-top" alt="post-thumb">
                    </div>
                    <div class="card-body">
                        <h3 class="mb-3"><a class="post-title" href="post-details.html">How To Make Cupcakes and Cashmere Recipe At Home</a></h3>
                        <ul class="card-meta list-inline">
                            <li class="list-inline-item">
                                <a href="author-single.html" class="card-meta-author">
                                    <img src="{{ asset('user_assets/images/john-doe.jpg')}}" alt="John Doe">
                                    <span>John Doe</span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <i class="ti-timer"></i>2 Min To Read
                            </li>
                            <li class="list-inline-item">
                                <i class="ti-calendar"></i>14 jan, 2020
                            </li>
                            <li class="list-inline-item">
                                <ul class="card-meta-tag list-inline">
                                    <li class="list-inline-item"><a href="tags.html">Color</a></li>
                                    <li class="list-inline-item"><a href="tags.html">Recipe</a></li>
                                    <li class="list-inline-item"><a href="tags.html">Fish</a></li>
                                </ul>
                            </li>
                        </ul>
                        <p>It’s no secret that the digital industry is booming. From exciting startups to global brands, companies are reaching out to digital agencies, responding to the new possibilities available.</p>
                        <a href="post-details.html" class="btn btn-outline-primary">Read More</a>
                    </div>
                </article>

                <ul class="pagination justify-content-center">
                    <li class="page-item page-item active ">
                        <a href="#!" class="page-link">1</a>
                    </li>
                    <li class="page-item">
                        <a href="#!" class="page-link">2</a>
                    </li>
                    <li class="page-item">
                        <a href="#!" class="page-link">&raquo;</a>
                    </li>
                </ul>
            </div>
            {{-- Rightbar --}}
            @include('layouts.rightbar')
        </div>
    </div>
</section>

@endsection
