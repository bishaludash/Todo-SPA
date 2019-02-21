<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet" >
        <link href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" >
       

        <!-- Styles -->
       @if (session()->has('message'))
            <div class="alert alert-primary">
                {{session('message')}}
            </div>
       @endif
    </head>
    <body>
        <div class="container-fluid">
            <div class="col-lg-12">
                <div class="content">
                <h1><u>{{$survey->survey_name}}</u></h1>
                

                <button class="btn btn-sm btn-primary ajax-modal-lg" data-url="{{ route('survey.questions.create', $survey->id) }}" data-title="Add Question">Big Add</button>
                
               <div class="load-section">
                 @foreach ($survey->questions as $question)
                 <ul>
                   <li>{{$question->question_name}}</li>
                   <div class="ml-5">
                      @foreach ($question->options as $option)
                      <li>{{$option->option_name}}</li>
                      @endforeach
                   </div>
                    
                   <hr>
                  </ul> 
                 @endforeach
               </div>
            </div>
            </div>
        </div>
        

        

        <!-- Large Modal -->
       <div class="modal fade ajax-form-model-lg" >
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" >Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                 {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
              </div>
            </div>
          </div>
        </div>     

        <!-- Modal -->
        <div class="modal fade ajax-form-model" >
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" >Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                 {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
              </div>
            </div>
          </div>
        </div>      
        
        <div class="ajax-success">
             <div class="card alert-success">
                <div class="card-body ajax-success-text text-center">
                   Success
                </div>
            </div>
        </div>
       
        <style type="text/css">
            .ajax-success{
                width:20%;
                position: absolute;
                top: 2%;
                right: 20px; 
                display: none;
            }
        </style>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.2.1/js/bootstrap.js"></script>
        <script src="{{ url('js/script.js') }}" type="text/javascript"></script>
    </body>
</html>
