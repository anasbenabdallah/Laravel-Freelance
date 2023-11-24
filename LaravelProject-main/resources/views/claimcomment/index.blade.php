@include('partials.header')

<!DOCTYPE html>
<html lang="zxx" class="no-js">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="img/fav.png">
    <meta name="author" content="codepixer">
    <meta charset="UTF-8">

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/linearicons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nice-select.css') }}">					
    <link rel="stylesheet" href="{{ asset('css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
<br><br><br>
    <title>Claim List</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .center-text {
            text-align: center;
        }
    </style>
</head>
<body class="bg-grey">
    <div class="container">
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <br>
                <h1 class="center-text">Claim List</h1>
                <p class="center-text">Hey, {{ auth()->user()->name}}, you can check your claims and add comments</p>
            </div>
        </div>
    </div>
    <br>

    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Details</th>
                                <th>Rating</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($claims as $claim)
                                @if(auth()->user()->email == $claim->claim_mail)
                                    <tr>
                                        <td>{{ $claim->id ?? '' }}</td>
                                        <td>{{ $claim->claim_title ?? '' }}</td>
                                        <td>{{ $claim->claim_details ?? '' }}</td>
                                        <td>⭐{{ $claim->claim_rating ?? '' }}</td>
                                        <td>
                                            @php
                                                $buttonText = $claim->claim_status == 0 ? 'Unprocessed' : 'Processed';
                                                $buttonColor = $claim->claim_status == 0 ? 'btn-secondary' : 'btn-success';
                                            @endphp
                                            <button class="btn {{ $buttonColor }}">{{ $buttonText }}</button>
                                            <button class="btn btn-primary comment-button" data-toggle="comment-table-{{ $claim->id }}" data-claim-id="{{ $claim->id }}">
                                                Comment
                                            </button>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <br> <br>
    <div class="container">
        @foreach($claims as $claim)
            <div class="card" style="display: none;" id="comment-table-{{ $claim->id }}">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    
                                    <th>Comments</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($comments as $comment)
    @if($comment->claim_id == $claim->id)
        <tr>
        <td>
                                @if ($comment->comment_role == 1)
                                    <span style="color: red;">[Admin]: {{ $comment->comment_text }}</span>
                                @else
                                    [{{ auth()->user()->name }}]: {{ $comment->comment_text }}
                                @endif
                            </td>
        </tr>
    @endif
@endforeach


    <tr>
    <td>
    <form action="{{ route('claimcomment.store') }}" method="post">
    @csrf
    <div class="form-group">
        <input type="text" name="comment_text" id="comment_text" class="form-control" placeholder="Add Comment" required>
    </div>

    @if ($errors->has('comment_text'))
        <span class="text-danger">{{ $errors->first('comment_text') }}</span>
    @endif

    <div class="input-group-append">
        <button class="btn btn-primary" type="submit">Submit</button>
        <input type="hidden" name="comment_role" value="0">
        <input type="hidden" name="claim_id" value="{{ $claim->id }}">
    </div>
</form>

</td>

    </tr>
</tbody>

                        </table>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.comment-button').on('click', function() {
                var claimId = $(this).data('claim-id'); // Récupérer le claim_id depuis l'attribut data-claim-id
                var targetId = $(this).data('toggle');
                $('#' + targetId).toggle();
            });
        });
    </script>



<script src="{{ asset('js/vendor/jquery-2.2.4.min.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="{{ asset('js/vendor/bootstrap.min.js') }}"></script>			
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
        <script src="{{ asset('js/easing.min.js') }}"></script>			
        <script src="{{ asset('js/hoverIntent.js') }}"></script>
        <script src="{{ asset('js/superfish.min.js') }}"></script>	
        <script src="{{ asset('js/jquery.ajaxchimp.min.js') }}"></script>
        <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>	
        <script src="{{ asset('js/owl.carousel.min.js') }}"></script>			
        <script src="{{ asset('js/jquery.sticky.js') }}"></script>
        <script src="{{ asset('js/jquery.nice-select.min.js') }}"></script>			
        <script src="{{ asset('js/parallax.min.js') }}"></script>		
        <script src="{{ asset('js/mail-script.js') }}"></script>	
        <script src="{{ asset('js/app.js') }}"></script>	















</body>
</html>