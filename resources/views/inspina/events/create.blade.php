@extends('inspina.layouts.main')

@section('content')
    <div class="wrapper wrapper-content">
        <form action="{{ url($group->username.'/events/create/') }}" method="post" >
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="row">
                                        <div class="form-group">
                                            <label class="font-noraml">&nbsp; &nbsp;&nbsp; <i class="fa fa-calendar"></i> Select the Date of the Event</label>
                                            <br>
                                            <div class="col-sm-10">
                                                <input type="text" name="date" class="form-control" data-mask="99/99/9999" placeholder="">
                                                <span class="help-block text-muted">(dd/mm/yyyy)</span>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
            <div>
                <div class="row form-group">
                    <div class="col-md-6">
                        <input name="title" type="text" class="form-control" placeholder="Event Title" required = "required">
                    </div>
                    <div class="col-md-6">
                        <input name="sponsor" type="text" class="form-control" placeholder="Event Sponsor" required = "required">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-md-12">
                        <div class="chat-message-form">
                            <div class="form-group">
                                <textarea class="form-control message-input" name="description" placeholder="Brief Description" required = "required"></textarea>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <a href="{{url('/')}}" class="btn btn-default">Close</a>
                <button type="submit" class="btn btn-info">Create</button>
            </div>
        </form>
    </div>
@endsection