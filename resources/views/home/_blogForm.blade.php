{!! Form::open(['route'=>['createBlog'], 'method'=>'put', 'class'=>'form-horizontal']) !!}

    <div class="form-group">
        <label class="col-sm-2">Heading: </label>
        <div class="col-sm-10 {{ $errors->has('heading') ? 'has-error': '' }}">
            {!! Form::text('heading', null, ['class'=>'form-control']) !!}
            {!! $errors->first('heading', '<span class="help-block">:message</span> ') !!}
        </div>
    </div>


    <div class="form-group">
        <label class="col-sm-2">Content: </label>
        <div class="col-sm-10 {{ $errors->has('heading') ? 'has-error': '' }}">
            {!! Form::textarea('content', null, ['class'=>'form-control text-editor', 'id'=>'text_editor']) !!}
            {!! $errors->first('content', '<span class="help-block">:message</span> ') !!}
        </div>
    </div>

    <div class="form-group">
            <label class="col-sm-2"> </label>
            <div class="col-sm-10">
                {!! Form::submit('Post', ['class'=>'btn btn-danger btn-lg', 'onclick'=>'parseTextFromIFrameAndSetTextInTextArea()']) !!}
            </div>
        </div>

    {!! Form::close() !!}