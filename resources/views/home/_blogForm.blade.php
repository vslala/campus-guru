{!! Form::open(['route'=>['createBlog'], 'method'=>'put', 'class'=>'form-horizontal']) !!}

    <div class="form-group">
        <label class="col-sm-2">Heading: </label>
        <div class="col-sm-10">
            {!! Form::text('heading', null, ['class'=>'form-control']) !!}
        </div>
    </div>


    <div class="form-group">
        <label class="col-sm-2">Content: </label>
        <div class="col-sm-10">
            {!! Form::textarea('content', null, ['class'=>'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
            <label class="col-sm-2"> </label>
            <div class="col-sm-10">
                {!! Form::submit('Post', ['class'=>'btn btn-danger btn-lg']) !!}
            </div>
        </div>

    {!! Form::close() !!}