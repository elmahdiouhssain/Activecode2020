@extends('layout')
@section('content')
        <div class="container">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="ticket-info">

                            <div class="card">
                              <div class="card-header">
                                <h3>#{{ $ticket->ticket_id }} - {{ $ticket->title }}.</h3>
                              </div>
                              <div class="card-body">
                                <p class="card-text"><i class="fa fa-comments" aria-hidden="true"></i> <x style="color:orange;">Message</x> : {{ $ticket->message }}.</p>
                                <p class="card-text"><i class="fa fa-sliders" aria-hidden="true"></i> <x style="color:orange;">Category</x> : <f style="color:green;">{{ $category->name }}.</f></p>
                            
                                @if ($ticket->status === 'Open')
                                <i class="fa fa-certificate" aria-hidden="true"></i> <x style="color:orange;">Status</x> : <b style="color:green;">{{ $ticket->status }}</b>
                                @else
                                <i class="fa fa-certificate" aria-hidden="true"></i> <x style="color:orange;">Status</x> : <b style="color:red;">{{ $ticket->status }}</b>
                                @endif
                                <br><p class="card-text"><i class="fa fa-calendar" aria-hidden="true"></i>
                                <x style="color:orange;">Created On</x> : {{ $ticket->created_at->diffForHumans() }}.</p>

                              </div>
                            </div>
                            </div>
                        <hr>
                    <h5>Conversation : </h5>
                    <hr>



                    <div class="container">
                        <div class="row">
                            @foreach ($comments as $comment)
                            <div class="col-md-8">
                                <div class="media g-mb-30 media-comment">
                              
                                    <div class="media-body u-shadow-v18 g-bg-secondary g-pa-30">
                                      <div class="g-mb-15">
                                        <h5 class="h5 g-color-gray-dark-v1 mb-0"><i class="fa fa-user-circle" aria-hidden="true"  style="color: orange;"></i> {{ $comment->user->fullname }}</h5>
                                        <span class="g-color-gray-dark-v4 g-font-size-12">At : {{ $comment->created_at->format('Y-m-d') }}</span>
                                      </div>
                                
                                      <p>Comment : {{ $comment->comment }}.</p><hr><hr>

                                
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <hr>
                        </div>
                        </div>


                    <hr>
                    <h5>Replay : </h5>
                    <hr>

                    <div class="comment-form">
                        <form action="{{ url('comment') }}" method="POST" class="form">
                            {!! csrf_field() !!}

                            <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">

                            <div class="form-group{{ $errors->has('comment') ? ' has-error' : '' }}">
                                <textarea rows="10" id="comment" class="form-control" name="comment"></textarea>

                                @if ($errors->has('comment'))
                                    <span class="help-block" style="color: red;">{{ $errors->first('comment') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
@endsection