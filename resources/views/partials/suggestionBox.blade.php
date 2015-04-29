<!-- Suggestion box for user suggestions to the website -->

<div style="" id="suggestion_box_div">
    <p>You feel like something is missing, just put your suggestion in the suggestion box.
       I will try my best to get it done.
    </p>
    {!! Form::open(["route"=>["addSuggestion"], "method"=>"put", "class"=>"form-horizontal", "id"=>"suggestion_form"]) !!}
        <input type="hidden" name="username" value="{{ $users[0]->username }}" />
        <div class="form-group">
            {!! Form::textarea("content", null, ["rows"=>"6", "class"=>"form-control"]) !!}
        </div>
        <div class="form-group">
            {!! Form::submit("Add Suggestion", ["class"=>"btn btn-success", "id"=>"suggestionBtn"]) !!}
        </div>
    {!! Form::close() !!}
</div>
