@extends('layouts.exams-layout')
@section('content')
<link href="{{ asset('assets/css/county.css') }}" rel="stylesheet"/>
<style>
	.pagination{
		text-align: center;
		margin: 30px 30px 60px;
		user-select: none;

	}
	.pagination li{
		display: inline-block;
		margin: 5px;
		box-shadow: 0 5px 25px rgb(1 1 1 / 10%);
	}
	.pagination li a{
		color: #fff;
		text-decoration: none;
		font-size: 1.2em;
		line-height: 45px;
	}
	.previous-page, .next-page{
		background:#38b2d3;
		width: 80px;
		border-radius: 45px;
		cursor: pointer;

	}
	.previous-page:hover{
		transform: translateX(-5px);
	}
    .next-page:hover{
		transform: translateX(5px);
	}
	.current-page, .dots{
		background: #ccc;
		width: 45px;
		border-radius: 50%;
		cursor: pointer
	}
    .active{
        background:#38b2d3;
    }
    .end{
        float: right;
        width: 100px;
        height: 100px;
        background: -webkit-linear-gradient(top,  #248AB2 0%,#248AB2 40%,#50BCE6 100%);
        cursor: pointer;
        border: none;
        border-radius: 5px;
        font-family: Arial;
        font-weight: bold;
        color:white;
        font-size: 1.2em

    }
    .end:hover{
        background: linear-gradient( #38b2d3,rgb(172, 173, 189));
    }
</style>
<div class="pagetitle">
    <h1>{{ $test_title->exam_title }}</h1>
    <nav>
      <ol class="breadcrumb">

      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section>
       <div style="justify-content-center">
        <button class="end" onclick="confirm('Are you sure you want to submit?', submits(), 'return false')">End Exam</button>
        <h3><small>Time</small></h3>
        <input name="due" type="hidden" id="due" value="{{ $test_title->duration }}"/>
	    <div id="counter"></div>

    </div>
    <div class="col-sm-10 p-4 card-content" style="display: none" >
        @php($i=1)
        <form class="submit" id="endExam" action="{{ url('/start') }}" method="post" >
            <input type="hidden" value="{{ $instance_id }}" name="instance"/>
            @csrf
            @foreach ($tests as $item )
                {{-- {{ dd($item) }} --}}
                <article class="card">
                    <aside class="card-body">
                            <span style="float: left; margin-right: 5px">{{ $i }}.</span>
                        <input type="hidden" value="{{ $item['q_id'] }}" name="q_id[]"/>
                        <div class="row">{{ $item['question'] }}</div>
                        <div class="form-check">
                            <input type="radio" class="btn-check" id="btn-check-a{{ $i }}" name="option**{{ $item['q_id'] }}" value="{{ $item['options']['A'] }}"/>
                            <label class="btn btn-outline-primary" for="btn-check-a{{ $i }}">{{ $item['options']['A'] }}</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="btn-check" id="btn-check-b{{ $i }}" name="option**{{ $item['q_id'] }}" value="{{ $item['options']['B'] }}"/>
                            <label class="btn btn-outline-primary" for="btn-check-b{{ $i }}">{{ $item['options']['B'] }}</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="btn-check" id="btn-check-c{{ $i }}" name="option**{{ $item['q_id'] }}" value="{{ $item['options']['C'] }}"/>
                            <label class="btn btn-outline-primary" for="btn-check-c{{ $i }}">{{ $item['options']['C'] }}</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="btn-check" id="btn-check-d{{ $i }}" name="option**{{ $item['q_id'] }}" value="{{ $item['options']['D'] }}"/>
                            <label class="btn btn-outline-primary" for="btn-check-d{{ $i++ }}">{{ $item['options']['D'] }}</label>
                        </div>
                    </aside>
                </article>
            @endforeach
        </form>
    </div>
    <div class="pagination justify-content-center"></div>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{ asset('assets/js/county.js') }}"></script>
    <script>
        var minutesToAdd= $('#due').val();
        var currentDate = new Date();
        var duedate = new Date(currentDate.getTime() + minutesToAdd*60000);
        //console.log(new Date(duedate))
		$('#counter').county({ endDateTime: new Date(duedate), reflection: false, animation: 'scroll', theme: 'blue' });

        setTimeout( function(){
            submits();
        }, minutesToAdd*60000);
        function submits(){
            $('#endExam').submit();
        }

        function getPageList(totalPages, page, maxLength){
			function range(start, end){
				return Array.from(Array(end - start + 1), (_, i) => i + start);
			}

			var sideWidth = maxLength < 9 ? 1 : 2;
			var leftWidth = (maxLength - sideWidth * 2 - 3) >> 1;
			var rightWidth = (maxLength - sideWidth * 2 - 3) >> 1;

			if(page <= maxLength - sideWidth - 1 - rightWidth){
				return range(1, maxLength - sideWidth - 1).concat(0, range(totalPages - sideWidth + 1, totalPages));
			}

			if(page >= totalPages - sideWidth - 1 - rightWidth){
				return range(1, sideWidth).concat(0, range(totalPages - sideWidth - 1 - rightWidth - leftWidth, totalPages));
			}
			 return range(1, sideWidth).concat(0, range(page - leftWidth, page + rightWidth), 0, range(totalPages - sideWidth + 1, totalPages));

		}

		$(function(){
			var numberOfItems = $(".card-content .card").length;
			var limitPerPage = 1; //How many card items visible per page
			var totalPages = Math.ceil(numberOfItems/limitPerPage);
			var paginationSize = 10; //How many page elements visible in the pagination
			var currentPage;

			function showPage(whichPage){
				if(whichPage < 1 || whichPage > totalPages) return false;

				currentPage = whichPage;

				$(".card-content .card").hide().slice((currentPage -1) * limitPerPage, currentPage * limitPerPage, currentPage * limitPerPage).show();

				$(".pagination li").slice(1, -1).remove();

				getPageList(totalPages, currentPage, paginationSize).forEach(item => {
					$("<li>").addClass("page-item").addClass(item ? "current-page" : "dots")
					.toggleClass("active", item === currentPage).append($("<a>").addClass("page-link")
					.attr({href:"javascript:void(0)"}).text(item || "...")).insertBefore(".next-page");
				});

				$(".previous-page").toggleClass("disable", currentPage === 1);
				$(".next-page").toggleClass("disable", currentPage === totalPages);
				return true;

			}
			$(".pagination").append(
					$("<li>").addClass("page-item").addClass("previous-page").append($("<a>").addClass("page-link").attr({href:"javascript:void(0)"}).text("Prev")),
					$("<li>").addClass("page-item").addClass("next-page").append($("<a>").addClass("page-link").attr({href:"javascript:void(0)"}).text("Next"))
				);

			$(".card-content").show();

			showPage(1);

			$(document).on("click", ".pagination li.current-page:not(.active)", function(){
				return showPage(+$(this).text());
			});

			$(".next-page").on("click", function(){
				return showPage(currentPage + 1);
			});

			$(".previous-page").on("click", function(){
				return showPage(currentPage - 1);
			});

		});
    </script>
  </section>
@endsection
