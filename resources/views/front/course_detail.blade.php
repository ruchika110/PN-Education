@extends("front.master")
@section("title",'Home | PN Education')

@section("content")

<!-- page-banner-section 
			================================================== -->
		<section class="page-banner-section">
			<div class="container">

				<h1>{{$show->name}}</h1>
				<ul class="page-depth">
					<li><a href="index.html">PN Infosys</a></li>
					<li><a href="courses.html">Courses</a></li>
					<li><a href="single-course.html">{{$show->name}}</a></li>
				</ul>

			</div>
		</section>
		<!-- End page-banner-section -->

		<!-- single-course-section 
			================================================== -->
		<section class="single-course-section">
			<div class="container">
				<div class="row">
					<div class="col-lg-8">

						<div class="single-course-box">

							<!-- single top part -->
							<div class="product-single-top-part">
								<div class="product-info-before-gallery">
									<div class="course-author before-gallery-unit">
										<div class="icon">
											<i class="material-icons">account_box</i>
										</div>
										<div class="info">
											<span class="label">Teacher</span>
											<div class="value">
												<a href="single-teacher.html">Michael Arnett</a>
											</div>
										</div>
									</div>
									<div class="course-category before-gallery-unit">
										<div class="icon">
											<i class="material-icons">bookmark_border</i>
										</div>
										<div class="info">
											<span class="label">Category</span>
											<div class="value">
												<a href="#">Design <span>/</span></a>
												<a href="#">Web Design</a>
											</div>
										</div>
									</div>
									<div class="course-rating before-gallery-unit">
										<div class="star-rating has-ratings">
											<span class="rating">4.50</span>
											<span class="votes-number">2 Votes</span>

										</div>
									</div>
								</div>
								<div class="course-single-gallery">
									<img src="upload/courses/4.jpg" alt="">
								</div>

							</div>

							<!-- single course content -->
							<div class="single-course-content">
								<img src="{{ url('/upload/'.$show->image) }}" alt="">
								<br>
								<br>
								<h2>Course Detail</h2>
								<p>{{$show->detail}}</h2>
								
								<h2>Course Description</h2>
								<p>{{$show->description}}</p>

								<h2>Course Content</h2>
								<p>{{$show->course_content}}</p>

							</div>
							<!-- end single course content -->

							<!-- course reviews -->
							<div class="course-reviews">
								<div class="course-review-title">
									<h3>
										<i class="material-icons">chat_bubble_outline</i>
										Student Reviews
									</h3>
								</div>
								<div class="course-reviews-inner">
									<div class="ratings-box">
										<div class="rating-average">
											<p>Average rating</p>
											<div class="average-box">
												<span class="num">4.5</span>
												<span class="ratings">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star-half-o"></i>
												</span>
												<span class="txt">2 Ratings</span>
											</div>
										</div>
										<div class="detailed-rating">
											<p>Detailed Rating</p>
											<div class="detailed-box">
												<ul class="detailed-lines">
													<li>
														<span>5 Stars</span>
														<div class="outer">
															<span class="inner-fill" style="width: 50%"></span>
														</div>
														<span>1</span>
													</li>
													<li>
														<span>4 Stars</span>
														<div class="outer">
															<span class="inner-fill" style="width: 50%"></span>
														</div>
														<span>1</span>
													</li>
													<li>
														<span>3 Stars</span>
														<div class="outer">
															<span class="inner-fill"></span>
														</div>
														<span>0</span>
													</li>
													<li>
														<span>2 Stars</span>
														<div class="outer">
															<span class="inner-fill"></span>
														</div>
														<span>0</span>
													</li>
													<li>
														<span>1 Stars</span>
														<div class="outer">
															<span class="inner-fill"></span>
														</div>
														<span>0</span>
													</li>
												</ul>
											</div>
										</div>
									</div>
									<ul class="comments">
										<li>
											<div class="image-holder">
												<img src="upload/blog/avatar4.jpg" alt="">
											</div>
											<div class="comment-content">
												<h2>
													Steven Smith
													<span class="rating">
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star-o"></i>
													</span>
												</h2>
												<p>top design</p>
											</div>
										</li>
										<li>
											<div class="image-holder">
												<img src="upload/blog/avatar4.jpg" alt="">
											</div>
											<div class="comment-content">
												<h2>
													Margaret
													<span class="rating">
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
													</span>
												</h2>
												<p>Easy to install, reasonable price!</p>
											</div>
										</li>
									</ul>
									<form class="add-review">
										<h1>Add a Review</h1>
										<label>Your rating</label>
										<select>
											<option>Rate...</option>
											<option>Perfect</option>
											<option>Good</option>
											<option>Average</option>
											<option>Not that bad</option>
											<option>Very Poor</option>
										</select>
										<label>Your Review</label>
										<textarea></textarea>
										<button type="submit">Submit</button>
									</form>
								</div>
							</div>
							<!-- end course reviews -->

						</div>

					</div>



					<div class="col-lg-4">

						<!-----Add to cart----->

					<form method="post" action="{{url('add_cart')}}">
						@csrf
						<input type="hidden" name="course_id" value="{{$show->id}}">

						<input type="hidden" name="course_name" value="{{$show->name}}">

						<input type="hidden" name="course_image" value="{{$show->image}}">

						<input type="hidden" name="course_price" value="{{$show->price}}">
					
						<div class="sidebar">
							<div class="widget course-widget">
								<p class="price">
									<span class="price-label">Price</span>
									<span class="amount">{{$show->price}}</span>
								</p>
								
								<center>
									<input style="width: 300px; height: 43px; border-radius: 20px;" class="btn btn-danger" type="submit" name="submit" value="Add to Cart"></a></center><br>

								<center>
									<input style="width: 300px; height: 43px; border-radius: 20px;" class="btn btn-outline-info" type="submit" name="submit" value="Buy Now"></a></center><br>

								<div class="product-meta-info-list">
									<h3>Course Features</h3>
									<div class="meta-info-unit">
										<div class="icon">
											<i class="material-icons">language</i>
										</div>
										<div class="value">Language: English</div>
									</div>
									<div class="meta-info-unit">
										<div class="icon">
											<i class="material-icons">access_time</i>
										</div>
										<div class="value">7 hours on-demand video</div>
									</div>
									<div class="meta-info-unit">
										<div class="icon">
											<i class="material-icons">playlist_add_check</i>
										</div>
										<div class="value">11 Lessons</div>
									</div>
									<div class="meta-info-unit">
										<div class="icon">
											<i class="material-icons">spellcheck</i>
										</div>
										<div class="value">Study Level: Intermediate</div>
									</div>
									<div class="meta-info-unit">
										<div class="icon">
											<i class="material-icons">terrain</i>
										</div>
										<div class="value">Certificate of Completion</div>
									</div>
								</div>
								<ul class="share-list">
									<li><span>Share:</span></li>
									<li><a href="#" class="facebook"><i class="fa fa-facebook-f"></i></a></li>
									<li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
									<li><a href="#" class="google"><i class="fa fa-google-plus"></i></a></li>
									<li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
								</ul>
							</div>
							<div class="widget profile-widget">
								<div class="top-part">
									<img src="upload/teachers/teacher4-thumb.jpg" alt="Leslie Williams">
									<div class="name">
										<h3>Leslie Williams</h3>
										<span class="job-title">Math</span>
									</div>
								</div>
								<div class="content">
									<p>Donec tortor massa, dapibus sit amet massa ut, tincidunt dapibus neque. Morbi ac mauris lorem.</p>
									<a href="single-teacher.html" class="text-link">View full profile</a>
								</div>
							</div>
						</div>
						</form>

				<!----end add to cart----->
					</div>

				</div>
						
			</div>
		</section>
		<!-- End single-course section -->


@endsection